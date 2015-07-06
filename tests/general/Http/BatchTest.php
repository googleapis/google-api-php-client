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

class Google_Http_BatchTest extends PHPUnit_Framework_TestCase
{

  public function setUp()
  {
    $this->client = $this->getMockBuilder("Google_Client")
                         ->disableOriginalConstructor()
                         ->getMock();
  }
  
  public function testBasicFunctionality()
  {
    $this->client->expects($this->once())
            ->method("getBasePath")
            ->will($this->returnValue("base_path"));
    $batch = new Google_Http_Batch($this->client);
    $this->assertAttributeEquals("base_path", "root_url", $batch);
    $this->assertAttributeEquals("batch", "batch_path", $batch);
  }

  public function testExtractionOfRootUrlFromService()
  {
    $this->client->expects($this->never())
            ->method("getBasePath");
    $service = new Google_Service($this->client);
    $service->rootUrl = "root_url_dummy";
    $service->batchPath = "batch_path_dummy";
    $batch = $service->createBatch();
    $this->assertInstanceOf("Google_Http_Batch", $batch);
    $this->assertAttributeEquals("root_url_dummy", "root_url", $batch);
    $this->assertAttributeEquals("batch_path_dummy", "batch_path", $batch);
  }

  public function testExecuteCustomRootUrlBatchPath()
  {
    $io = $this->getMockBuilder('Google_IO_Abstract')
            ->disableOriginalConstructor()
            ->setMethods(array('makeRequest', 'needsQuirk', 'executeRequest', 'setOptions', 'setTimeout', 'getTimeout'))
            ->getMock();
    $req = null;
    $io->expects($this->once())
            ->method("makeRequest")
            ->will($this->returnCallback(function($request) use (&$req) {
                $req = $request;
                return $request;
            }));
    $this->client->expects($this->once())
            ->method("getIo")
            ->will($this->returnValue($io));
    $batch = new Google_Http_Batch($this->client, false, 'https://www.example.com/', 'bat');
    $this->assertNull($batch->execute());
    $this->assertInstanceOf("Google_Http_Request", $req);
    $this->assertEquals("https://www.example.com/bat", $req->getUrl());
  }

  public function testExecuteBodySerialization()
  {
    $io = $this->getMockBuilder('Google_IO_Abstract')
            ->disableOriginalConstructor()
            ->setMethods(array('makeRequest', 'needsQuirk', 'executeRequest', 'setOptions', 'setTimeout', 'getTimeout'))
            ->getMock();
    $req = null;
    $io->expects($this->once())
            ->method("makeRequest")
            ->will($this->returnCallback(function($request) use (&$req) {
                $req = $request;
                return $request;
            }));
    $this->client->expects($this->once())
            ->method("getIo")
            ->will($this->returnValue($io));
    $batch = new Google_Http_Batch($this->client, "BOUNDARY_TEXT", 'https://www.example.com/', 'bat');
    $req1 = new Google_Http_Request("https://www.example.com/req1");
    $req2 = new Google_Http_Request("https://www.example.com/req2", 'POST', array(), 'POSTBODY');
    $batch->add($req1, '1');
    $batch->add($req2, '2');
    $this->assertNull($batch->execute());
    $this->assertInstanceOf("Google_Http_Request", $req);
    $format = <<<'EOF'
--BOUNDARY_TEXT
Content-Type: application/http
Content-Transfer-Encoding: binary
MIME-Version: 1.0
Content-ID: 1

GET /req1? HTTP/1.1


--BOUNDARY_TEXT
Content-Type: application/http
Content-Transfer-Encoding: binary
MIME-Version: 1.0
Content-ID: 2

POST /req2? HTTP/1.1

POSTBODY

--BOUNDARY_TEXT--
EOF;
    $this->assertEquals($format, $req->getPostBody());
  }

}