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

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

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

class Google_Service_ResourceTest extends BaseTest
{
  private $client;
  private $service;
  private $logger;

  public function setUp()
  {
    $this->client = $this->getMockBuilder("Google_Client")
          ->disableOriginalConstructor()
          ->getMock();
    $this->logger = $this->getMockBuilder("Monolog\Logger")
          ->disableOriginalConstructor()
          ->getMock();
    $this->client->expects($this->any())
          ->method("getLogger")
          ->will($this->returnValue($this->logger));
    $this->client->expects($this->any())
          ->method("shouldDefer")
          ->will($this->returnValue(true));
    $this->client->expects($this->any())
          ->method("getHttpClient")
          ->will($this->returnValue(new GuzzleHttp\Client()));
    $this->service = new Test_Google_Service($this->client);
  }

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
    $this->setExpectedException(
        "Google_Exception",
        "Unknown function: test->testResource->someothermethod()"
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

  public function testCreateRequestUri()
  {
    $restPath = "/plus/{u}";
    $service = new Google_Service($this->client);
    $service->servicePath = "http://localhost";
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
    $value = $resource->createRequestUri('/plus', $params);
    $this->assertEquals("http://localhost/plus?u=me", $value);

    // Test Booleans
    $params = array();
    $params['u']['type'] = 'boolean';
    $params['u']['location'] = 'path';
    $params['u']['value'] = '1';
    $value = $resource->createRequestUri($restPath, $params);
    $this->assertEquals("http://localhost/plus/true", $value);

    $params['u']['location'] = 'query';
    $value = $resource->createRequestUri('/plus', $params);
    $this->assertEquals("http://localhost/plus?u=true", $value);

    // Test encoding
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'query';
    $params['u']['value'] = '@me/';
    $value = $resource->createRequestUri('/plus', $params);
    $this->assertEquals("http://localhost/plus?u=%40me%2F", $value);
  }

  public function testNoExpectedClassForAltMediaWithHttpSuccess()
  {
    // set the "alt" parameter to "media"
    $arguments = [['alt' => 'media']];
    $request = new Request('GET', '/?alt=media');
    $body = Psr7\stream_for('thisisnotvalidjson');
    $response = new Response(200, [], $body);

    $http = $this->getMockBuilder("GuzzleHttp\Client")
        ->disableOriginalConstructor()
        ->getMock();
    $http->expects($this->once())
        ->method('send')
        ->will($this->returnValue($response));

    if ($this->isGuzzle5()) {
      $http->expects($this->once())
        ->method('createRequest')
        ->will($this->returnValue(new GuzzleHttp\Message\Request('GET', '/?alt=media')));
    }

    $client = new Google_Client();
    $client->setHttpClient($http);
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
    $body = Psr7\stream_for('thisisnotvalidjson');
    $response = new Response(400, [], $body);

    $http = $this->getMockBuilder("GuzzleHttp\Client")
        ->disableOriginalConstructor()
        ->getMock();
    $http->expects($this->once())
        ->method('send')
        ->will($this->returnValue($response));

    if ($this->isGuzzle5()) {
      $http->expects($this->once())
        ->method('createRequest')
        ->will($this->returnValue(new GuzzleHttp\Message\Request('GET', '/?alt=media')));
    }

    $client = new Google_Client();
    $client->setHttpClient($http);
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
      $this->assertEquals('thisisnotvalidjson', $e->getMessage());
    }
  }
}
