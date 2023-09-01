<?php
/*
 * Copyright 2011 Google Inc.
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

namespace Google\Tests\Http;

use Google\Http\REST;
use Google\Service\Exception as ServiceException;
use Google\Tests\BaseTest;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class RESTTest extends BaseTest
{
    /**
     * @var REST $rest
     */
    private $rest;

    public function setUp(): void
    {
        $this->rest = new REST();
        $this->request = new Request('GET', '/');
    }

    public function testDecodeResponse()
    {
        $client = $this->getClient();
        $response = new Response(204);
        $decoded = $this->rest->decodeHttpResponse($response, $this->request);
        $this->assertEquals($response, $decoded);

        foreach ([200, 201] as $code) {
            $headers = ['foo', 'bar'];
            $stream = Psr7\Utils::streamFor('{"a": 1}');
            $response = new Response($code, $headers, $stream);

            $decoded = $this->rest->decodeHttpResponse($response, $this->request);
            $this->assertEquals('{"a": 1}', (string) $decoded->getBody());
        }
    }

    public function testDecodeMediaResponse()
    {
        $client = $this->getClient();

        $request =  new Request('GET', 'http://www.example.com?alt=media');
        $headers = [];
        $stream = Psr7\Utils::streamFor('thisisnotvalidjson');
        $response = new Response(200, $headers, $stream);

        $decoded = $this->rest->decodeHttpResponse($response, $request);
        $this->assertEquals('thisisnotvalidjson', (string) $decoded->getBody());
    }


    public function testDecode500ResponseThrowsException()
    {
        $this->expectException(ServiceException::class);
        $response = new Response(500);
        $this->rest->decodeHttpResponse($response, $this->request);
    }

    public function testExceptionResponse()
    {
        $this->expectException(ServiceException::class);
        $http = new GuzzleClient();

        $request = new Request('GET', 'http://httpbin.org/status/500');
        $response = $this->rest->doExecute($http, $request);
    }

    public function testDecodeEmptyResponse()
    {
        $stream = Psr7\Utils::streamFor('{}');
        $response = new Response(200, [], $stream);
        $decoded = $this->rest->decodeHttpResponse($response, $this->request);
        $this->assertEquals('{}', (string) $decoded->getBody());
    }

    public function testBadErrorFormatting()
    {
        $this->expectException(ServiceException::class);
        $stream = Psr7\Utils::streamFor(
            '{
                "error": {
                    "code": 500,
                    "message": null
                }
            }'
        );
        $response = new Response(500, [], $stream);
        $this->rest->decodeHttpResponse($response, $this->request);
    }

    public function tesProperErrorFormatting()
    {
        $this->expectException(ServiceException::class);
        $stream = Psr7\Utils::streamFor(
            '{
                error: {
                    errors: [
                        {
                            "domain": "global",
                            "reason": "authError",
                            "message": "Invalid Credentials",
                            "locationType": "header",
                            "location": "Authorization",
                        }
                    ],
                    "code": 401,
                    "message": "Invalid Credentials"
                }
            }'
        );
        $response = new Response(401, [], $stream);
        $this->rest->decodeHttpResponse($response, $this->request);
    }

    public function testNotJson404Error()
    {
        $this->expectException(ServiceException::class);
        $stream = Psr7\Utils::streamFor('Not Found');
        $response = new Response(404, [], $stream);
        $this->rest->decodeHttpResponse($response, $this->request);
    }
}
