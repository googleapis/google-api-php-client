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

use GuzzleHttp\Pool;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\BatchResults;

/**
 * Class to handle batched requests to the Google API service.
 */
class Google_Http_Pool
{
  /** @var array service requests to be executed. */
  private $requests = array();

  /** @var Google_Client */
  private $client;

  public function __construct(Google_Client $client)
  {
    $this->client = $client;
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
    $responses = Pool::batch($this->client->getHttpClient(), $this->requests);

    return $this->parseResponse($responses);
  }

  protected function parseResponse(BatchResults $responses)
  {
    $batchResponses = array();
    $requestKeys = array_keys($this->requests);
    $i = 0;
    $j = 0;
    while ($i < count($responses)) {
      $key = 'response-'.$requestKeys[$j];
      if ($this->isRedirect($responses[$i])) {
        $batchResponses[$key.'-redirect'] = $responses[$i];
        $i++;
      }
      $response = $responses[$i];
      if (
        $response instanceof ResponseInterface &&
        $response->getStatusCode() < 300 &&
        $class = $this->requests[$requestKeys[$j]]->getHeader('X-Php-Expected-Class')
      ) {
        $response = new $class($response->json());
      }
      $batchResponses[$key] = $response;
      $i++;
      $j++;
    }

    return $batchResponses;
  }

  private function isRedirect($request)
  {
    // Guzzle returns exceptions instead of request objects for batch requests
    // when "exceptions" is set to "true"
    if ($request instanceof \Exception) {
      return false;
    }

    $location = $request->getHeader('Location');

    return in_array($request->getStatusCode(), array(201, 301, 302, 303, 307, 308))
      && !empty($location);
  }
}
