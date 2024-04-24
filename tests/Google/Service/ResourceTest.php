<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

namespace Google\Tests\Service;

use Google\Client;
use Google\Tests\BaseTest;
use Google\Service as GoogleService;
use Google\Service\Exception as ServiceException;
use Google\Service\Resource as GoogleResource;
use Google\Exception as GoogleException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Prophecy\Argument;

class TestService extends \Google\Service
{
    public function __construct(Client $client, $rootUrl = null)
    {
        parent::__construct($client);
        $this->rootUrl = $rootUrl ?: "https://test.example.com";
        $this->rootUrlTemplate = $rootUrl ?: "https://test.UNIVERSE_DOMAIN";
        $this->servicePath = "";
        $this->version = "v1beta1";
        $this->serviceName = "test";
    }
}

class ResourceTest extends BaseTest
{
    private $client;
    private $service;

    public function setUp(): void
    {
        $this->client = $this->prophesize(Client::class);

        $logger = $this->prophesize("Monolog\Logger");

        $this->client->getLogger()->willReturn($logger->reveal());
        $this->client->shouldDefer()->willReturn(true);
        $this->client->getHttpClient()->willReturn(new GuzzleClient());
        $this->client->getUniverseDomain()->willReturn('example.com');

        $this->service = new TestService($this->client->reveal());
    }

    public function testCallFailure()
    {
        $this->expectException(GoogleException::class);
        $this->expectExceptionMessage('Unknown function: test->testResource->someothermethod()');
        $resource = new GoogleResource(
            $this->service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );
        $resource->call("someothermethod", []);
    }

    public function testCall()
    {
        $resource = new GoogleResource(
            $this->service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );
        $request = $resource->call("testMethod", [[]]);
        $this->assertEquals("https://test.example.com/method/path", (string) $request->getUri());
        $this->assertEquals("POST", $request->getMethod());
        $this->assertFalse($request->hasHeader('Content-Type'));
    }

    public function testCallWithUniverseDomainTemplate()
    {
        $client = $this->prophesize(Client::class);
        $logger = $this->prophesize("Monolog\Logger");
        $this->client->getLogger()->willReturn($logger->reveal());
        $this->client->shouldDefer()->willReturn(true);
        $this->client->getHttpClient()->willReturn(new GuzzleClient());
        $this->client->getUniverseDomain()->willReturn('example-universe-domain.com');

        $this->service = new TestService($this->client->reveal());

        $resource = new GoogleResource(
            $this->service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );
        $request = $resource->call("testMethod", [[]]);
        $this->assertEquals("https://test.example-universe-domain.com/method/path", (string) $request->getUri());
        $this->assertEquals("POST", $request->getMethod());
        $this->assertFalse($request->hasHeader('Content-Type'));
    }

    public function testCallWithPostBody()
    {
        $resource = new GoogleResource(
            $this->service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );
        $request = $resource->call("testMethod", [['postBody' => ['foo' => 'bar']]]);
        $this->assertEquals("https://test.example.com/method/path", (string) $request->getUri());
        $this->assertEquals("POST", $request->getMethod());
        $this->assertTrue($request->hasHeader('Content-Type'));
    }

    public function testCallServiceDefinedRoot()
    {
        $service = new TestService($this->client->reveal(), "https://sample.example.com");
        $resource = new GoogleResource(
            $service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );
        $request = $resource->call("testMethod", [[]]);
        $this->assertEquals("https://sample.example.com/method/path", (string) $request->getUri());
        $this->assertEquals("POST", $request->getMethod());
    }

    /**
     * Some Google Service (Google\Service\Directory\Resource\Channels and
     * Google\Service\Reports\Resource\Channels) use a different servicePath value
     * that should override the default servicePath value, it's represented by a /
     * before the resource path. All other Services have no / before the path
     */
    public function testCreateRequestUriForASelfDefinedServicePath()
    {
        $this->service->servicePath = '/admin/directory/v1/';
        $resource = new GoogleResource(
            $this->service,
            'test',
            'testResource',
            [
                "methods" => [
                    'testMethod' => [
                        'parameters' => [],
                        'path' => '/admin/directory_v1/watch/stop',
                        'httpMethod' => 'POST',
                    ]
                ]
            ]
        );
        $request = $resource->call('testMethod', [[]]);
        $this->assertEquals('https://test.example.com/admin/directory_v1/watch/stop', (string) $request->getUri());
    }

    public function testCreateRequestUri()
    {
        $restPath = "plus/{u}";
        $service = new GoogleService($this->client->reveal());
        $service->servicePath = "http://localhost/";
        $resource = new GoogleResource($service, 'test', 'testResource', []);

        // Test Path
        $params = [];
        $params['u']['type'] = 'string';
        $params['u']['location'] = 'path';
        $params['u']['value'] = 'me';
        $value = $resource->createRequestUri($restPath, $params);
        $this->assertEquals("http://localhost/plus/me", $value);

        // Test Query
        $params = [];
        $params['u']['type'] = 'string';
        $params['u']['location'] = 'query';
        $params['u']['value'] = 'me';
        $value = $resource->createRequestUri('plus', $params);
        $this->assertEquals("http://localhost/plus?u=me", $value);

        // Test Booleans
        $params = [];
        $params['u']['type'] = 'boolean';
        $params['u']['location'] = 'path';
        $params['u']['value'] = '1';
        $value = $resource->createRequestUri($restPath, $params);
        $this->assertEquals("http://localhost/plus/true", $value);

        $params['u']['location'] = 'query';
        $value = $resource->createRequestUri('plus', $params);
        $this->assertEquals("http://localhost/plus?u=true", $value);

        // Test encoding
        $params = [];
        $params['u']['type'] = 'string';
        $params['u']['location'] = 'query';
        $params['u']['value'] = '@me/';
        $value = $resource->createRequestUri('plus', $params);
        $this->assertEquals("http://localhost/plus?u=%40me%2F", $value);
    }

    public function testNoExpectedClassForAltMediaWithHttpSuccess()
    {
        // set the "alt" parameter to "media"
        $arguments = [['alt' => 'media']];
        $request = new Request('GET', '/?alt=media');

        $http = $this->prophesize("GuzzleHttp\Client");

        $body = Psr7\Utils::streamFor('thisisnotvalidjson');
        $response = new Response(200, [], $body);

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response);

        $client = new Client();
        $client->setHttpClient($http->reveal());
        $service = new TestService($client);

        // set up mock objects
        $resource = new GoogleResource(
            $service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );

        $expectedClass = 'ThisShouldBeIgnored';
        $response = $resource->call('testMethod', $arguments, $expectedClass);
        $this->assertInstanceOf('Psr\Http\Message\ResponseInterface', $response);
        $this->assertEquals('thisisnotvalidjson', (string) $response->getBody());
    }

    public function testNoExpectedClassForAltMediaWithHttpFail()
    {
        // set the "alt" parameter to "media"
        $arguments = [['alt' => 'media']];
        $request = new Request('GET', '/?alt=media');

        $http = $this->prophesize("GuzzleHttp\Client");

        $body = Psr7\Utils::streamFor('thisisnotvalidjson');
        $response = new Response(400, [], $body);

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response);

        $client = new Client();
        $client->setHttpClient($http->reveal());
        $service = new TestService($client);

        // set up mock objects
        $resource = new GoogleResource(
            $service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );

        try {
            $expectedClass = 'ThisShouldBeIgnored';
            $decoded = $resource->call('testMethod', $arguments, $expectedClass);
            $this->fail('should have thrown exception');
        } catch (ServiceException $e) {
            // Alt Media on error should return a safe error
            $this->assertEquals('thisisnotvalidjson', $e->getMessage());
        }
    }

    public function testErrorResponseWithVeryLongBody()
    {
        // set the "alt" parameter to "media"
        $arguments = [['alt' => 'media']];
        $request = new Request('GET', '/?alt=media');

        $http = $this->prophesize("GuzzleHttp\Client");

        $body = Psr7\Utils::streamFor('this will be pulled into memory');
        $response = new Response(400, [], $body);

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response);

        $client = new Client();
        $client->setHttpClient($http->reveal());
        $service = new TestService($client);

        // set up mock objects
        $resource = new GoogleResource(
            $service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );

        try {
            $expectedClass = 'ThisShouldBeIgnored';
            $decoded = $resource->call('testMethod', $arguments, $expectedClass);
            $this->fail('should have thrown exception');
        } catch (ServiceException $e) {
            // empty message - alt=media means no message
            $this->assertEquals('this will be pulled into memory', $e->getMessage());
        }
    }

    public function testSuccessResponseWithVeryLongBody()
    {
        // set the "alt" parameter to "media"
        $arguments = [['alt' => 'media']];
        $stream = $this->prophesize(Stream::class);
        $stream->__toString()
            ->shouldNotBeCalled();
        $response = new Response(200, [], $stream->reveal());

        $http = $this->prophesize("GuzzleHttp\Client");
        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response);

        $client = new Client();
        $client->setHttpClient($http->reveal());
        $service = new TestService($client);

        // set up mock objects
        $resource = new GoogleResource(
            $service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );

        $expectedClass = 'ThisShouldBeIgnored';
        $response = $resource->call('testMethod', $arguments, $expectedClass);

        $this->assertEquals(200, $response->getStatusCode());
        // $this->assertFalse($stream->toStringCalled);
    }

    public function testExceptionMessage()
    {
        // set the "alt" parameter to "media"
        $request = new Request('GET', '/');
        $errors = [ ["domain" => "foo"] ];
        $content = json_encode([
            'error' => [
                'errors' => $errors
            ]
        ]);

        $http = $this->prophesize("GuzzleHttp\Client");

        $body = Psr7\Utils::streamFor($content);
        $response = new Response(400, [], $body);

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response);

        $client = new Client();
        $client->setHttpClient($http->reveal());
        $service = new TestService($client);

        // set up mock objects
        $resource = new GoogleResource(
            $service,
            "test",
            "testResource",
            [
                "methods" => [
                    "testMethod" => [
                        "parameters" => [],
                        "path" => "method/path",
                        "httpMethod" => "POST",
                    ]
                ]
            ]
        );

        try {

            $decoded = $resource->call('testMethod', [[]]);
            $this->fail('should have thrown exception');
        } catch (ServiceException $e) {
            $this->assertEquals($errors, $e->getErrors());
        }
    }
}
