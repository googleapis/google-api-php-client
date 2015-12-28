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

use Google\Auth\HttpHandler\HttpHandlerFactory;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * This class implements the RESTful transport of apiServiceRequest()'s
 */
class Google_Http_REST
{
  /**
   * Executes a Psr\Http\Message\RequestInterface and (if applicable) automatically retries
   * when errors occur.
   *
   * @param Google_Client $client
   * @param Psr\Http\Message\RequestInterface $req
   * @return array decoded result
   * @throws Google_Service_Exception on server side error (ie: not authenticated,
   *  invalid or malformed post body, invalid url)
   */
  public static function execute(
      ClientInterface $client,
      RequestInterface $request,
      $expectedClass = null,
      $config = array(),
      $retryMap = null
  ) {
    $runner = new Google_Task_Runner(
        $config,
        sprintf('%s %s', $request->getMethod(), (string) $request->getUri()),
        array(get_class(), 'doExecute'),
        array($client, $request, $expectedClass)
    );

    if (!is_null($retryMap)) {
      $runner->setRetryMap($retryMap);
    }

    return $runner->run();
  }

  /**
   * Executes a Psr\Http\Message\RequestInterface
   *
   * @param Google_Client $client
   * @param Psr\Http\Message\RequestInterface $request
   * @return array decoded result
   * @throws Google_Service_Exception on server side error (ie: not authenticated,
   *  invalid or malformed post body, invalid url)
   */
  public static function doExecute(ClientInterface $client, RequestInterface $request, $expectedClass = null)
  {
    try {
      $httpHandler = HttpHandlerFactory::build($client);
      $response = $httpHandler($request);
    } catch (RequestException $e) {
      // if Guzzle throws an exception, catch it and handle the response
      if (!$e->hasResponse()) {
        throw $e;
      }
      $response = $e->getResponse();
    }

    return self::decodeHttpResponse($response, $request, $expectedClass);
  }

  /**
   * Decode an HTTP Response.
   * @static
   * @throws Google_Service_Exception
   * @param Psr\Http\Message\RequestInterface $response The http response to be decoded.
   * @param Psr\Http\Message\ResponseInterface $response
   * @return mixed|null
   */
  public static function decodeHttpResponse(
      ResponseInterface $response,
      RequestInterface $request = null,
      $expectedClass = null
  ) {
    $body = (string) $response->getBody();
    $code = $response->getStatusCode();
    $result = null;

    // return raw response when "alt" is "media"
    $isJson = !($request && 'media' == $request->getUri()->getQuery('alt'));

    // set the result to the body if it's not set to anything else
    if ($isJson) {
      $result = json_decode($body, true);
      if (null === $result && 0 !== json_last_error()) {
        // in the event of a parse error, return the raw string
        $result = $body;
      }
    } else {
      $result = $body;
    }

    // retry strategy
    if ((intVal($code)) >= 400) {
      $errors = null;
      // Specific check for APIs which don't return error details, such as Blogger.
      if (isset($result['error']['errors'])) {
        $errors = $result['error']['errors'];
      }
      throw new Google_Service_Exception($body, $code, null, $errors);
    }

    // use "is_null" because "false" is used to explicitly
    // prevent an expected class from being returned
    if (is_null($expectedClass) && $request) {
      $expectedClass = $request->getHeaderLine('X-Php-Expected-Class');
    }

    if (!empty($expectedClass)) {
      return new $expectedClass($result);
    }

    return $response;
  }
}
