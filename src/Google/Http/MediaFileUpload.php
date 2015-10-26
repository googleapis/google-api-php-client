<?php
/**
 * Copyright 2012 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use GuzzleHttp\Message\Request;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Url;

/**
 * Manage large file uploads, which may be media but can be any type
 * of sizable data.
 */
class Google_Http_MediaFileUpload
{
  const UPLOAD_MEDIA_TYPE = 'media';
  const UPLOAD_MULTIPART_TYPE = 'multipart';
  const UPLOAD_RESUMABLE_TYPE = 'resumable';

  /** @var string $mimeType */
  private $mimeType;

  /** @var string $data */
  private $data;

  /** @var bool $resumable */
  private $resumable;

  /** @var int $chunkSize */
  private $chunkSize;

  /** @var int $size */
  private $size;

  /** @var string $resumeUri */
  private $resumeUri;

  /** @var int $progress */
  private $progress;

  /** @var Google_Client */
  private $client;

  /** @var Google_Http_Request */
  private $request;

  /** @var string */
  private $boundary;

  /**
   * Result code from last HTTP call
   * @var int
   */
  private $httpResultCode;

  /**
   * @param $mimeType string
   * @param $data string The bytes you want to upload.
   * @param $resumable bool
   * @param bool $chunkSize File will be uploaded in chunks of this many bytes.
   * only used if resumable=True
   */
  public function __construct(
      Google_Client $client,
      $request,
      $mimeType,
      $data,
      $resumable = false,
      $chunkSize = false
  ) {
    $this->client = $client;
    $this->request = $request;
    $this->mimeType = $mimeType;
    $this->data = $data;
    $this->resumable = $resumable;
    $this->chunkSize = $chunkSize;
    $this->progress = 0;

    $this->process();
  }

  /**
   * Set the size of the file that is being uploaded.
   * @param $size - int file size in bytes
   */
  public function setFileSize($size)
  {
    $this->size = $size;
  }

  /**
   * Return the progress on the upload
   * @return int progress in bytes uploaded.
   */
  public function getProgress()
  {
    return $this->progress;
  }

  /**
   * Send the next part of the file to upload.
   * @param [$chunk] the next set of bytes to send. If false will used $data passed
   * at construct time.
   */
  public function nextChunk($chunk = false)
  {
    $resumeUri = $this->getResumeUri();

    if (false == $chunk) {
      $chunk = substr($this->data, $this->progress, $this->chunkSize);
    }

    $lastBytePos = $this->progress + strlen($chunk) - 1;
    $headers = array(
      'content-range' => "bytes $this->progress-$lastBytePos/$this->size",
      'content-length' => strlen($chunk),
      'expect' => '',
    );

    $request = new Request(
        'PUT',
        $resumeUri,
        $headers,
        Stream::factory($chunk)
    );

    return $this->makePutRequest($request);
  }

  /**
   * Return the HTTP result code from the last call made.
   * @return int code
   */
  public function getHttpResultCode()
  {
    return $this->httpResultCode;
  }

  /**
  * Sends a PUT-Request to google drive and parses the response,
  * setting the appropiate variables from the response()
  *
  * @param Google_Http_Request $httpRequest the Reuqest which will be send
  *
  * @return false|mixed false when the upload is unfinished or the decoded http response
  *
  */
  private function makePutRequest(Request $request)
  {
    $http = $this->client->getHttpClient();
    $response = $http->send($request);
    $this->httpResultCode = $response->getStatusCode();

    if (308 == $this->httpResultCode) {
      // Track the amount uploaded.
      $range = explode('-', $response->getHeader('range'));
      $this->progress = $range[1] + 1;

      // Allow for changing upload URLs.
      $location = $response->getHeader('location');
      if ($location) {
        $this->resumeUri = $location;
      }

      // No problems, but upload not complete.
      return false;
    }

    $result = $response->json();
    $expectedClass = $this->request->getHeader('X-Php-Expected-Class');

    if ($expectedClass) {
      $result = new $expectedClass($result);
    }

    return $result;
  }

  /**
   * Resume a previously unfinished upload
   * @param $resumeUri the resume-URI of the unfinished, resumable upload.
   */
  public function resume($resumeUri)
  {
     $this->resumeUri = $resumeUri;
     $headers = array(
       'content-range' => "bytes */$this->size",
       'content-length' => 0,
     );
     $httpRequest = new Google_Http_Request(
         $this->resumeUri,
         'PUT',
         $headers
     );

     return $this->makePutRequest($httpRequest);
  }

  /**
   * @return array|bool
   * @visible for testing
   */
  private function process()
  {
    $this->transformToUploadUrl();

    $postBody = '';
    $contentType = false;

    $meta = (string) $this->request->getBody();
    $meta = is_string($meta) ? json_decode($meta, true) : $meta;

    $uploadType = $this->getUploadType($meta);
    $this->request->getQuery()->set('uploadType', $uploadType);
    $mimeType = $this->mimeType ?
        $this->mimeType :
        $this->request->getHeader('content-type');

    if (self::UPLOAD_RESUMABLE_TYPE == $uploadType) {
      $contentType = $mimeType;
      $postBody = is_string($meta) ? $meta : json_encode($meta);
    } else if (self::UPLOAD_MEDIA_TYPE == $uploadType) {
      $contentType = $mimeType;
      $postBody = $this->data;
    } else if (self::UPLOAD_MULTIPART_TYPE == $uploadType) {
      // This is a multipart/related upload.
      $boundary = $this->boundary ? $this->boundary : mt_rand();
      $boundary = str_replace('"', '', $boundary);
      $contentType = 'multipart/related; boundary=' . $boundary;
      $related = "--$boundary\r\n";
      $related .= "Content-Type: application/json; charset=UTF-8\r\n";
      $related .= "\r\n" . json_encode($meta) . "\r\n";
      $related .= "--$boundary\r\n";
      $related .= "Content-Type: $mimeType\r\n";
      $related .= "Content-Transfer-Encoding: base64\r\n";
      $related .= "\r\n" . base64_encode($this->data) . "\r\n";
      $related .= "--$boundary--";
      $postBody = $related;
    }

    $this->request->setBody(Stream::factory($postBody));

    if (isset($contentType) && $contentType) {
      $this->request->setHeader('content-type', $contentType);
    }

    return $this->request;
  }

  /**
   * Valid upload types:
   * - resumable (UPLOAD_RESUMABLE_TYPE)
   * - media (UPLOAD_MEDIA_TYPE)
   * - multipart (UPLOAD_MULTIPART_TYPE)
   * @param $meta
   * @return string
   * @visible for testing
   */
  public function getUploadType($meta)
  {
    if ($this->resumable) {
      return self::UPLOAD_RESUMABLE_TYPE;
    }

    if (false == $meta && $this->data) {
      return self::UPLOAD_MEDIA_TYPE;
    }

    return self::UPLOAD_MULTIPART_TYPE;
  }

  public function getResumeUri()
  {
    if (is_null($this->resumeUri)) {
      $this->resumeUri = $this->fetchResumeUri();
    }

    return $this->resumeUri;
  }

  private function fetchResumeUri()
  {
    $result = null;
    $body = $this->request->getBody();
    if ($body) {
      $headers = array(
        'content-type' => 'application/json; charset=UTF-8',
        'content-length' => $body->getSize(),
        'x-upload-content-type' => $this->mimeType,
        'x-upload-content-length' => $this->size,
        'expect' => '',
      );
      foreach ($headers as $key => $value) {
        $this->request->setHeader($key, $value);
      }
    }

    $response = $this->client->getHttpClient()->send($this->request);
    $location = $response->getHeader('location');
    $code = $response->getStatusCode();

    if (200 == $code && true == $location) {
      return $location;
    }

    $message = $code;
    $body = $response->json();
    if (isset($body['error']['errors'])) {
      $message .= ': ';
      foreach ($body['error']['errors'] as $error) {
        $message .= "{$error[domain]}, {$error[message]};";
      }
      $message = rtrim($message, ';');
    }

    $error = "Failed to start the resumable upload (HTTP {$message})";
    $this->client->getLogger()->error($error);

    throw new Google_Exception($error);
  }

  private function transformToUploadUrl()
  {
    $parts = parse_url($this->request->getUrl());
    if (!isset($parts['path'])) {
      $parts['path'] = '';
    }
    $parts['path'] = '/upload' . $parts['path'];
    $url = Url::fromString(Url::buildUrl($parts));
    $this->request->setUrl($url);
  }

  public function setChunkSize($chunkSize)
  {
    $this->chunkSize = $chunkSize;
  }
}
