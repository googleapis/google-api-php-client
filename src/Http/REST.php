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

namespace Google\Http;

use Google\Auth\HttpHandler\HttpHandlerFactory;
use Google\Service\Exception as GoogleServiceException;
use Google\Task\Runner;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * This class implements the RESTful transport of apiServiceRequest()'s
 */
class REST
{
    /**
     * Executes a Psr\Http\Message\RequestInterface and (if applicable) automatically retries
     * when errors occur.
     *
     * @template T
     * @param ClientInterface $client
     * @param RequestInterface $request
     * @param class-string<T>|false|null $expectedClass
     * @param array $config
     * @param array $retryMap
     * @return mixed|T|null
     * @throws \Google\Service\Exception on server side error (ie: not authenticated,
     *  invalid or malformed post body, invalid url)
     */
    public static function execute(
        ClientInterface $client,
        RequestInterface $request,
        $expectedClass = null,
        $config = [],
        $retryMap = null
    ) {
        $runner = new Runner(
            $config,
            sprintf('%s %s', $request->getMethod(), (string) $request->getUri()),
            [self::class, 'doExecute'],
            [$client, $request, $expectedClass]
        );

        if (null !== $retryMap) {
            $runner->setRetryMap($retryMap);
        }

        return $runner->run();
    }

    /**
     * Executes a Psr\Http\Message\RequestInterface
     *
     * @template T
     * @param ClientInterface $client
     * @param RequestInterface $request
     * @param class-string<T>|false|null $expectedClass
     * @return mixed|T|null
     * @throws \Google\Service\Exception on server side error (ie: not authenticated,
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
            // specific checking for Guzzle 5: convert to PSR7 response
            if (
                interface_exists('\GuzzleHttp\Message\ResponseInterface')
                && $response instanceof \GuzzleHttp\Message\ResponseInterface
            ) {
                $response = new Response(
                    $response->getStatusCode(),
                    $response->getHeaders() ?: [],
                    $response->getBody(),
                    $response->getProtocolVersion(),
                    $response->getReasonPhrase()
                );
            }
        }

        return self::decodeHttpResponse($response, $request, $expectedClass);
    }

    /**
     * Decode an HTTP Response.
     * @static
     *
     * @template T
     * @param RequestInterface $response The http response to be decoded.
     * @param ResponseInterface $response
     * @param class-string<T>|false|null $expectedClass
     * @return mixed|T|null
     * @throws \Google\Service\Exception
     */
    public static function decodeHttpResponse(
        ResponseInterface $response,
        RequestInterface $request = null,
        $expectedClass = null
    ) {
        $code = $response->getStatusCode();

        // retry strategy
        if (intVal($code) >= 400) {
            // if we errored out, it should be safe to grab the response body
            $body = (string) $response->getBody();

            // Check if we received errors, and add those to the Exception for convenience
            throw new GoogleServiceException($body, $code, null, self::getResponseErrors($body));
        }

        // Ensure we only pull the entire body into memory if the request is not
        // of media type
        $body = self::decodeBody($response, $request);

        if ($expectedClass = self::determineExpectedClass($expectedClass, $request)) {
            $json = json_decode($body, true);

            return new $expectedClass($json);
        }

        return $response;
    }

    private static function decodeBody(ResponseInterface $response, RequestInterface $request = null)
    {
        if (self::isAltMedia($request)) {
            // don't decode the body, it's probably a really long string
            return '';
        }

        return (string) $response->getBody();
    }

    private static function determineExpectedClass($expectedClass, RequestInterface $request = null)
    {
        // "false" is used to explicitly prevent an expected class from being returned
        if (false === $expectedClass) {
            return null;
        }

        // if we don't have a request, we just use what's passed in
        if (null === $request) {
            return $expectedClass;
        }

        // return what we have in the request header if one was not supplied
        return $expectedClass ?: $request->getHeaderLine('X-Php-Expected-Class');
    }

    private static function getResponseErrors($body)
    {
        $json = json_decode($body, true);

        if (isset($json['error']['errors'])) {
            return $json['error']['errors'];
        }

        return null;
    }

    private static function isAltMedia(RequestInterface $request = null)
    {
        if ($request && $qs = $request->getUri()->getQuery()) {
            parse_str($qs, $query);
            if (isset($query['alt']) && $query['alt'] == 'media') {
                return true;
            }
        }

        return false;
    }
}
