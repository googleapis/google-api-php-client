<?php
/*
 * Copyright 2010 Google Inc.
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

use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * This class implements the RESTful transport of apiServiceRequest()'s
 */
class Google_Http_REST
{
  /**
   * Executes a GuzzleHttp\Message\Request and (if applicable) automatically retries
   * when errors occur.
   *
   * @param Google_Client $client
   * @param GuzzleHttp\Message\Request $req
   * @return array decoded result
   * @throws Google_Service_Exception on server side error (ie: not authenticated,
   *  invalid or malformed post body, invalid url)
   */
  public static function execute(
      ClientInterface $client,
      RequestInterface $request,
      $config = array(),
      $retryMap = null
  ) {
    $runner = new Google_Task_Runner(
        $config,
        sprintf('%s %s', $request->getMethod(), $request->getUrl()),
        array(get_class(), 'doExecute'),
        array($client, $request)
    );

    if (!is_null($retryMap)) {
      $runner->setRetryMap($retryMap);
    }

    return $runner->run();
  }

  /**
   * Executes a GuzzleHttp\Message\RequestInterface
   *
   * @param Google_Client $client
   * @param GuzzleHttp\Message\RequestInterface $request
   * @return array decoded result
   * @throws Google_Service_Exception on server side error (ie: not authenticated,
   *  invalid or malformed post body, invalid url)
   */
  public static function doExecute(ClientInterface $client, RequestInterface $request)
  {
    try {
      $response = $client->send($request);
    } catch (RequestException $e) {
      // if Guzzle throws an exception, catch it and handle the response
      if (!$e->hasResponse()) {
        throw $e;
      }
      $response = $e->getResponse();
    }

    return self::decodeHttpResponse($response, $request);
  }

  /**
   * Decode an HTTP Response.
   * @static
   * @throws Google_Service_Exception
   * @param GuzzleHttp\Message\RequestInterface $response The http response to be decoded.
   * @param GuzzleHttp\Message\ResponseInterface $response
   * @return mixed|null
   */
  public static function decodeHttpResponse(
      ResponseInterface $response,
      RequestInterface $request = null
  ) {
    $result = $response->json();
    $body = (string) $response->getBody();
    $code = $response->getStatusCode();

    // retry strategy
    if ((intVal($code)) >= 300) {
      $errors = null;
      // Specific check for APIs which don't return error details, such as Blogger.
      if (isset($result['error']) && isset($result['error']['errors'])) {
        $errors = $result['error']['errors'];
      }
      throw new Google_Service_Exception($body, $code, null, $errors);
    }

    // return raw response when "alt" is "media"
    if ($request && $request->getQuery()->get('alt') == 'media') {
      return $body;
    }

    return $result;
  }
}
