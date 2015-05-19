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

class Test_Google_Service extends Google_Service
{
  public function __construct(Google_Client $client)
  {
    parent::__construct($client);
    $this->rootUrl = "";
    $this->servicePath = "";
    $this->version = "v1beta1";
    $this->serviceName = "test";
  }
}

class ResourceTest extends PHPUnit_Framework_TestCase
{
  private $client;
  private $service;
  private $logger;

  public function setUp()
  {
    $this->client = $this->getMockBuilder("Google_Client")
          ->disableOriginalConstructor()
          ->getMock();
    $this->logger = $this->getMockBuilder("Google_Logger_Null")
          ->disableOriginalConstructor()
          ->getMock();
    $this->client->expects($this->any())
          ->method("getClassConfig")
          ->will($this->returnCallback(function($class, $type) {
            if (!is_string($class)) {
              $class = get_class($class);
            }
            $configMap = array(
              "Google_Auth_Simple" => array(
                "developer_key" => "testKey"
              ),
            );
            return isset($configMap[$class][$type]) ? $configMap[$class][$type] : null;
          }));
    $this->client->expects($this->any())
          ->method("getLogger")
          ->will($this->returnValue($this->logger));
    $this->client->expects($this->any())
          ->method("shouldDefer")
          ->will($this->returnValue(true));
    $this->client->expects($this->any())
          ->method("getBasePath")
          ->will($this->returnValue("https://test.example.com"));
    $this->client->expects($this->any())
          ->method("getAuth")
          ->will($this->returnValue(new Google_Auth_Simple($this->client)));
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

  public function testCallSimple()
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
    $this->assertEquals("https://test.example.com/method/path?key=testKey", $request->getUrl());
    $this->assertEquals("POST", $request->getRequestMethod());
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
    $this->assertEquals("https://sample.example.com/method/path?key=testKey", $request->getUrl());
    $this->assertEquals("POST", $request->getRequestMethod());
  }
}
