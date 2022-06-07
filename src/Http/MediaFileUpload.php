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

namespace Google\Http;

use Google\Client;
use Google\Exception as GoogleException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * Manage large file uploads, which may be media but can be any type
 * of sizable data.
 */
class MediaFileUpload
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

    /** @var Client */
    private $client;

    /** @var RequestInterface */
    private $request;

    /** @var string */
    private $boundary; // @phpstan-ignore-line

    /**
   * Result code from last HTTP call
   * @var int
   */
    private $httpResultCode;

    /**
     * @param Client $client
     * @param RequestInterface $request
     * @param string $mimeType
     * @param string $data The bytes you want to upload.
     * @param bool $resumable
     * @param int $chunkSize File will be uploaded in chunks of this many bytes.
     * only used if resumable=True
     */
    public function __construct(
        Client $client,
        RequestInterface $request,
        $mimeType,
        $data,
        $resumable = false,
        $chunkSize = 0
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
     * @param int $size - int file size in bytes
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
     * @param string|bool $chunk Optional. The next set of bytes to send. If false will
     * use $data passed at construct time.
     */
    public function nextChunk($chunk = false)
    {
        $resumeUri = $this->getResumeUri();

        if (false == $chunk) {
            $chunk = substr($this->data, $this->progress, $this->chunkSize);
        }

        $lastBytePos = $this->progress + strlen($chunk) - 1;
        $headers = [
            'content-range' => "bytes $this->progress-$lastBytePos/$this->size",
            'content-length' => (string) strlen($chunk),
            'expect' => '',
        ];

        $request = new Request(
            'PUT',
            $resumeUri,
            $headers,
            Psr7\Utils::streamFor($chunk)
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
     * @param RequestInterface $request the Request which will be send
     *
     * @return false|mixed false when the upload is unfinished or the decoded http response
     *
     */
    private function makePutRequest(RequestInterface $request)
    {
        $response = $this->client->execute($request);
        $this->httpResultCode = $response->getStatusCode();

        if (308 == $this->httpResultCode) {
            // Track the amount uploaded.
            $range = $response->getHeaderLine('range');
            if ($range) {
                $range_array = explode('-', $range);
                $this->progress = ((int) $range_array[1]) + 1;
            }

            // Allow for changing upload URLs.
            $location = $response->getHeaderLine('location');
            if ($location) {
                $this->resumeUri = $location;
            }

            // No problems, but upload not complete.
            return false;
        }

        return REST::decodeHttpResponse($response, $this->request);
    }

    /**
     * Resume a previously unfinished upload
     * @param string $resumeUri the resume-URI of the unfinished, resumable upload.
     */
    public function resume($resumeUri)
    {
        $this->resumeUri = $resumeUri;
        $headers = [
            'content-range' => "bytes */$this->size",
            'content-length' => '0',
        ];
        $httpRequest = new Request(
            'PUT',
            $this->resumeUri,
            $headers
        );
        return $this->makePutRequest($httpRequest);
    }

    /**
     * @return RequestInterface
     * @visible for testing
     */
    private function process()
    {
        $this->transformToUploadUrl();
        $request = $this->request;

        $postBody = '';
        $contentType = false;

        $meta = json_decode((string) $request->getBody(), true);

        $uploadType = $this->getUploadType($meta);
        $request = $request->withUri(
            Uri::withQueryValue($request->getUri(), 'uploadType', $uploadType)
        );

        $mimeType = $this->mimeType ?: $request->getHeaderLine('content-type');

        if (self::UPLOAD_RESUMABLE_TYPE == $uploadType) {
            $contentType = $mimeType;
            $postBody = is_string($meta) ? $meta : json_encode($meta);
        } elseif (self::UPLOAD_MEDIA_TYPE == $uploadType) {
            $contentType = $mimeType;
            $postBody = $this->data;
        } elseif (self::UPLOAD_MULTIPART_TYPE == $uploadType) {
            // This is a multipart/related upload.
            $boundary = $this->boundary ?: mt_rand();
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

        $request = $request->withBody(Psr7\Utils::streamFor($postBody));

        if ($contentType) {
            $request = $request->withHeader('content-type', $contentType);
        }

        return $this->request = $request;
    }

    /**
     * Valid upload types:
     * - resumable (UPLOAD_RESUMABLE_TYPE)
     * - media (UPLOAD_MEDIA_TYPE)
     * - multipart (UPLOAD_MULTIPART_TYPE)
     * @param string|false $meta
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
        if (null === $this->resumeUri) {
            $this->resumeUri = $this->fetchResumeUri();
        }

        return $this->resumeUri;
    }

    private function fetchResumeUri()
    {
        $body = $this->request->getBody();
        $headers = [
            'content-type' => 'application/json; charset=UTF-8',
            'content-length' => $body->getSize(),
            'x-upload-content-type' => $this->mimeType,
            'x-upload-content-length' => $this->size,
            'expect' => '',
        ];
        foreach ($headers as $key => $value) {
            $this->request = $this->request->withHeader($key, $value);
        }

        $response = $this->client->execute($this->request, false);
        $location = $response->getHeaderLine('location');
        $code = $response->getStatusCode();

        if (200 == $code && true == $location) {
            return $location;
        }

        $message = $code;
        $body = json_decode((string) $this->request->getBody(), true);
        if (isset($body['error']['errors'])) {
            $message .= ': ';
            foreach ($body['error']['errors'] as $error) {
                $message .= "{$error['domain']}, {$error['message']};";
            }
            $message = rtrim($message, ';');
        }

        $error = "Failed to start the resumable upload (HTTP {$message})";
        $this->client->getLogger()->error($error);

        throw new GoogleException($error);
    }

    private function transformToUploadUrl()
    {
        $parts = parse_url((string) $this->request->getUri());
        if (!isset($parts['path'])) {
            $parts['path'] = '';
        }
        $parts['path'] = '/upload' . $parts['path'];
        $uri = Uri::fromParts($parts);
        $this->request = $this->request->withUri($uri);
    }

    public function setChunkSize($chunkSize)
    {
        $this->chunkSize = $chunkSize;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
