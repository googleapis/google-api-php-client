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

use GuzzleHttp\Message\Response as Guzzle5Response;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Stream\Stream as Guzzle5Stream;
use Prophecy\Argument;

class Test_Google_Service extends Google_Service
{
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = "https://test.example.com";
    $this->servicePath = "";
    $this->version = "v1beta1";
    $this->serviceName = "test";
  }
}

class Test_MediaType_Stream extends Stream
{
  public $toStringCalled = false;

  public function __toString()
  {
    $this->toStringCalled = true;

    return parent::__toString();
  }
}

class Google_Service_ResourceTest extends BaseTest
{
  private $client;
  private $service;

  public function setUp()
  {
    $this->client = $this->prophesize("Google_Client");

    $logger = $this->prophesize("Monolog\Logger");

    $this->client->getLogger()->willReturn($logger->reveal());
    $this->client->shouldDefer()->willReturn(true);
    $this->client->getHttpClient()->willReturn(new GuzzleHttp\Client());

    $this->service = new Test_Google_Service($this->client->reveal());
  }

  /**
   * @expectedException Google_Exception
   * @expectedExceptionMessage Unknown function: test->testResource->someothermethod()
   */
  public function testCallFailure()
  {
    $resource = new Google_Service_Resource(
      $this->service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );
    $resource->call("someothermethod", array());
  }

  public function testCall()
  {
    $resource = new Google_Service_Resource(
      $this->service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );
    $request = $resource->call("testMethod", array(array()));
    $this->assertEquals("https://test.example.com/method/path", (string) $request->getUri());
    $this->assertEquals("POST", $request->getMethod());
  }

  public function testCallServiceDefinedRoot()
  {
    $this->service->rootUrl = "https://sample.example.com";
    $resource = new Google_Service_Resource(
      $this->service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );
    $request = $resource->call("testMethod", array(array()));
    $this->assertEquals("https://sample.example.com/method/path", (string) $request->getUri());
    $this->assertEquals("POST", $request->getMethod());
  }

 /**
  * Some Google Service (Google_Service_Directory_Resource_Channels and
  * Google_Service_Reports_Resource_Channels) use a different servicePath value
  * that should override the default servicePath value, it's represented by a /
  * before the resource path. All other Services have no / before the path
  */
  public function testCreateRequestUriForASelfDefinedServicePath()
  {
    $this->service->servicePath = '/admin/directory/v1/';
    $resource = new Google_Service_Resource(
    $this->service,
      'test',
      'testResource',
      array("methods" =>
        array(
          'testMethod' => array(
            'parameters' => array(),
            'path' => '/admin/directory_v1/watch/stop',
            'httpMethod' => 'POST',
          )
        )
      )
    );
    $request = $resource->call('testMethod', array(array()));
    $this->assertEquals('https://test.example.com/admin/directory_v1/watch/stop', (string) $request->getUri());
  }

  public function testCreateRequestUri()
  {
    $restPath = "plus/{u}";
    $service = new Google_Service($this->client->reveal());
    $service->servicePath = "http://localhost/";
    $resource = new Google_Service_Resource($service, 'test', 'testResource', array());

    // Test Path
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'path';
    $params['u']['value'] = 'me';
    $value = $resource->createRequestUri($restPath, $params);
    $this->assertEquals("http://localhost/plus/me", $value);

    // Test Query
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'query';
    $params['u']['value'] = 'me';
    $value = $resource->createRequestUri('plus', $params);
    $this->assertEquals("http://localhost/plus?u=me", $value);

    // Test Booleans
    $params = array();
    $params['u']['type'] = 'boolean';
    $params['u']['location'] = 'path';
    $params['u']['value'] = '1';
    $value = $resource->createRequestUri($restPath, $params);
    $this->assertEquals("http://localhost/plus/true", $value);

    $params['u']['location'] = 'query';
    $value = $resource->createRequestUri('plus', $params);
    $this->assertEquals("http://localhost/plus?u=true", $value);

    // Test encoding
    $params = array();
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

    if ($this->isGuzzle5()) {
      $body = Guzzle5Stream::factory('thisisnotvalidjson');
      $response = new Guzzle5Response(200, [], $body);

      $http->createRequest(Argument::any(), Argument::any(), Argument::any())
          ->willReturn(new GuzzleHttp\Message\Request('GET', '/?alt=media'));

      $http->send(Argument::type('GuzzleHttp\Message\Request'))
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    } else {
      $body = Psr7\stream_for('thisisnotvalidjson');
      $response = new Response(200, [], $body);

      $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    }

    $client = new Google_Client();
    $client->setHttpClient($http->reveal());
    $service = new Test_Google_Service($client);

    // set up mock objects
    $resource = new Google_Service_Resource(
      $service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
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

    if ($this->isGuzzle5()) {
      $body = Guzzle5Stream::factory('thisisnotvalidjson');
      $response = new Guzzle5Response(400, [], $body);

      $http->createRequest(Argument::any(), Argument::any(), Argument::any())
          ->willReturn(new GuzzleHttp\Message\Request('GET', '/?alt=media'));

      $http->send(Argument::type('GuzzleHttp\Message\Request'))
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    } else {
      $body = Psr7\stream_for('thisisnotvalidjson');
      $response = new Response(400, [], $body);

      $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    }

    $client = new Google_Client();
    $client->setHttpClient($http->reveal());
    $service = new Test_Google_Service($client);

    // set up mock objects
    $resource = new Google_Service_Resource(
      $service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );

    try {
      $expectedClass = 'ThisShouldBeIgnored';
      $decoded = $resource->call('testMethod', $arguments, $expectedClass);
      $this->fail('should have thrown exception');
    } catch (Google_Service_Exception $e) {
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

    if ($this->isGuzzle5()) {
      $body = Guzzle5Stream::factory('this will be pulled into memory');
      $response = new Guzzle5Response(400, [], $body);

      $http->createRequest(Argument::any(), Argument::any(), Argument::any())
          ->willReturn(new GuzzleHttp\Message\Request('GET', '/?alt=media'));

      $http->send(Argument::type('GuzzleHttp\Message\Request'))
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    } else {
      $body = Psr7\stream_for('this will be pulled into memory');
      $response = new Response(400, [], $body);

      $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    }

    $client = new Google_Client();
    $client->setHttpClient($http->reveal());
    $service = new Test_Google_Service($client);

    // set up mock objects
    $resource = new Google_Service_Resource(
      $service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );

    try {
      $expectedClass = 'ThisShouldBeIgnored';
      $decoded = $resource->call('testMethod', $arguments, $expectedClass);
      $this->fail('should have thrown exception');
    } catch (Google_Service_Exception $e) {
      // empty message - alt=media means no message
      $this->assertEquals('this will be pulled into memory', $e->getMessage());
    }
  }

  public function testSuccessResponseWithVeryLongBody()
  {
    $this->onlyGuzzle6Or7();

    // set the "alt" parameter to "media"
    $arguments = [['alt' => 'media']];
    $request = new Request('GET', '/?alt=media');
    $resource = fopen('php://temp', 'r+');
    $stream = new Test_MediaType_Stream($resource);
    $response = new Response(200, [], $stream);

    $http = $this->prophesize("GuzzleHttp\Client");
    $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
        ->shouldBeCalledTimes(1)
        ->willReturn($response);

    $client = new Google_Client();
    $client->setHttpClient($http->reveal());
    $service = new Test_Google_Service($client);

    // set up mock objects
    $resource = new Google_Service_Resource(
      $service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );

    $expectedClass = 'ThisShouldBeIgnored';
    $response = $resource->call('testMethod', $arguments, $expectedClass);

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertFalse($stream->toStringCalled);
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

    if ($this->isGuzzle5()) {
      $body = Guzzle5Stream::factory($content);
      $response = new Guzzle5Response(400, [], $body);

      $http->createRequest(Argument::any(), Argument::any(), Argument::any())
          ->willReturn(new GuzzleHttp\Message\Request('GET', '/?alt=media'));

      $http->send(Argument::type('GuzzleHttp\Message\Request'))
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    } else {
      $body = Psr7\stream_for($content);
      $response = new Response(400, [], $body);

      $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
          ->shouldBeCalledTimes(1)
          ->willReturn($response);
    }

    $client = new Google_Client();
    $client->setHttpClient($http->reveal());
    $service = new Test_Google_Service($client);

    // set up mock objects
    $resource = new Google_Service_Resource(
      $service,
      "test",
      "testResource",
      array("methods" =>
        array(
          "testMethod" => array(
            "parameters" => array(),
            "path" => "method/path",
            "httpMethod" => "POST",
          )
        )
      )
    );

    try {

      $decoded = $resource->call('testMethod', array(array()));
      $this->fail('should have thrown exception');
    } catch (Google_Service_Exception $e) {
      $this->assertEquals($errors, $e->getErrors());
    }
  }
}
