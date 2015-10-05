<?php
/*
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
use GuzzleHttp\Message\Response;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Stream\Stream;

/**
 * Class to handle batched requests to the Google API service.
 */
class Google_Http_Batch
{
  const BATCH_PATH = 'batch';

  private static $CONNECTION_ESTABLISHED_HEADERS = array(
    "HTTP/1.0 200 Connection established\r\n\r\n",
    "HTTP/1.1 200 Connection established\r\n\r\n",
  );

  /** @var string Multipart Boundary. */
  private $boundary;

  /** @var array service requests to be executed. */
  private $requests = array();

  /** @var Google_Client */
  private $client;

  public function __construct(Google_Client $client)
  {
    $this->client = $client;
    $this->boundary = mt_rand();
  }

  public function add(RequestInterface $request, $key = false)
  {
    if (false == $key) {
      $key = mt_rand();
    }

    $this->requests[$key] = $request;
  }

  public function execute()
  {
    $body = '';
    $classes = array();

    /** @var Google_Http_Request $req */
    foreach ($this->requests as $key => $request) {
      $request->addHeaders(
          [
            'Content-Type' => 'application/http',
            'Content-Transfer-Encoding' => 'binary',
            'MIME-Version' => '1.0',
            'Content-ID' => $key,
          ]
      );
      $body .= "--{$this->boundary}";
      $body .= Request::getHeadersAsString($request) . "\n\n";
      $body .= sprintf(
          '%s %s HTTP/%s',
          $request->getMethod(),
          $request->getResource(),
          $request->getProtocolVersion()
      );
      $body .= "\n\n";

      $classes['response-' . $key] = $request->getHeader('X-Php-Expected-Class');
    }

    $body .= "--{$this->boundary}--";
    $body = trim($body);
    $url = Google_Client::API_BASE_PATH . '/' . self::BATCH_PATH;
    $headers = array(
      'Content-Type' => sprintf('multipart/mixed; boundary=%s', $this->boundary),
      'Content-Length' => strlen($body),
    );
    $request = $this->client->getHttpClient()->createRequest(
        'POST',
        $url,
        [
        'headers' => $headers,
        'body' => Stream::factory($body),
        ]
    );

    $response = $this->client->getHttpClient()->send($request);

    return $this->parseResponse($response, $classes);
  }

  public function parseResponse(ResponseInterface $response, $classes = array())
  {
    $contentType = $response->getHeader('content-type');
    $contentType = explode(';', $contentType);
    $boundary = false;
    foreach ($contentType as $part) {
      $part = (explode('=', $part, 2));
      if (isset($part[0]) && 'boundary' == trim($part[0])) {
        $boundary = $part[1];
      }
    }

    $body = (string) $response->getBody();
    if (!empty($body)) {
      $body = str_replace("--$boundary--", "--$boundary", $body);
      $parts = explode("--$boundary", $body);
      $responses = array();

      foreach ($parts as $i => $part) {
        $part = trim($part);
        if (!empty($part)) {
          list($rawHeaders, $part) = explode("\r\n\r\n", $part, 2);
          $headers = $this->parseRawHeaders($rawHeaders);

          $status = substr($part, 0, strpos($part, "\n"));
          $status = explode(" ", $status);
          $status = $status[1];

          list($partHeaders, $partBody) = $this->parseHttpResponse($part, false);
          $response = new Response(
              $status,
              $partHeaders,
              Stream::factory($partBody)
          );

          // Need content id.
          $key = $headers['content-id'];
          $class = '';
          if (!empty($this->expected_classes[$key])) {
            $class = $this->expected_classes[$key];
          }

          try {
            $response = Google_Http_REST::decodeHttpResponse($response);
            if (isset($classes[$key])) {
              $response = new $classes[$key]($response);
            }
          } catch (Google_Service_Exception $e) {
            // Store the exception as the response, so successful responses
            // can be processed.
            $response = $e;
          }

          $responses[$key] = $response;
        }
      }

      return $responses;
    }

    return null;
  }

  private function parseRawHeaders($rawHeaders)
  {
    $headers = array();
    $responseHeaderLines = explode("\r\n", $rawHeaders);
    foreach ($responseHeaderLines as $headerLine) {
      if ($headerLine && strpos($headerLine, ':') !== false) {
        list($header, $value) = explode(': ', $headerLine, 2);
        $header = strtolower($header);
        if (isset($headers[$header])) {
          $headers[$header] .= "\n" . $value;
        } else {
          $headers[$header] = $value;
        }
      }
    }
    return $headers;
  }

  /**
   * Used by the IO lib and also the batch processing.
   *
   * @param $respData
   * @param $headerSize
   * @return array
   */
  private function parseHttpResponse($respData, $headerSize)
  {
    // check proxy header
    foreach (self::$CONNECTION_ESTABLISHED_HEADERS as $established_header) {
      if (stripos($respData, $established_header) !== false) {
        // existed, remove it
        $respData = str_ireplace($established_header, '', $respData);
        // Subtract the proxy header size unless the cURL bug prior to 7.30.0
        // is present which prevented the proxy header size from being taken into
        // account.
        // @TODO look into this
        // if (!$this->needsQuirk()) {
        //   $headerSize -= strlen($established_header);
        // }
        break;
      }
    }

    if ($headerSize) {
      $responseBody = substr($respData, $headerSize);
      $responseHeaders = substr($respData, 0, $headerSize);
    } else {
      $responseSegments = explode("\r\n\r\n", $respData, 2);
      $responseHeaders = $responseSegments[0];
      $responseBody = isset($responseSegments[1]) ? $responseSegments[1] :
                                                    null;
    }

    $responseHeaders = $this->parseRawHeaders($responseHeaders);

    return array($responseHeaders, $responseBody);
  }
}
