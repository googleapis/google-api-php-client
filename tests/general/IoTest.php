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

require_once 'BaseTest.php';
require_once realpath(dirname(__FILE__) . '/../../autoload.php');

class IoTest extends BaseTest
{

  public function testExecutorSelection()
  {
    $default = function_exists('curl_version') ? 'Google_IO_Curl' : 'Google_IO_Stream';
    $client = $this->getClient();
    $this->assertInstanceOf($default, $client->getIo());
    $config = new Google_Config();
    $config->setIoClass('Google_IO_Stream');
    $client = new Google_Client($config);
    $this->assertInstanceOf('Google_IO_Stream', $client->getIo());
  }

  public function testStreamSetTimeout()
  {
    $io = new Google_IO_Stream($this->getClient());
    $this->timeoutChecker($io);
  }

  public function testStreamParseHttpResponseBody()
  {
    $io = new Google_IO_Stream($this->getClient());
    $this->responseChecker($io);
  }

  public function testStreamProcessEntityRequest()
  {
    $client = $this->getClient();
    $io = new Google_IO_Stream($client);
    $this->processEntityRequest($io, $client);
  }

  public function testStreamCacheHit()
  {
    $client = $this->getClient();
    $io = new Google_IO_Stream($client);
    $this->cacheHit($io, $client);
  }

  public function testStreamAuthCache()
  {
    $client = $this->getClient();
    $io = new Google_IO_Stream($client);
    $this->authCache($io, $client);
  }

  /**
   * @expectedException Google_IO_Exception
   */
  public function testStreamInvalidRequest()
  {
    $io = new Google_IO_Stream($this->getClient());
    $this->invalidRequest($io);
  }

  public function testCurlSetTimeout()
  {
    if (!function_exists('curl_version')) {
      $this->markTestSkipped('cURL not present');
    }
    $io = new Google_IO_Curl($this->getClient());
    $this->timeoutChecker($io);
  }

  public function testCurlParseHttpResponseBody()
  {
    if (!function_exists('curl_version')) {
      $this->markTestSkipped('cURL not present');
    }
    $io = new Google_IO_Curl($this->getClient());
    $this->responseChecker($io);
  }

  public function testCurlProcessEntityRequest()
  {
    if (!function_exists('curl_version')) {
      $this->markTestSkipped('cURL not present');
    }
    $client = $this->getClient();
    $io = new Google_IO_Curl($client);
    $this->processEntityRequest($io, $client);
  }

  public function testCurlCacheHit()
  {
    if (!function_exists('curl_version')) {
      $this->markTestSkipped('cURL not present');
    }
    $client = $this->getClient();
    $io = new Google_IO_Curl($client);
    $this->cacheHit($io, $client);
  }

  public function testCurlAuthCache()
  {
    if (!function_exists('curl_version')) {
      $this->markTestSkipped('cURL not present');
    }
    $client = $this->getClient();
    $io = new Google_IO_Curl($client);
    $this->authCache($io, $client);
  }

  /**
   * @expectedException Google_IO_Exception
   */
  public function testCurlInvalidRequest()
  {
    if (!function_exists('curl_version')) {
      $this->markTestSkipped('cURL not present');
    }
    $io = new Google_IO_Curl($this->getClient());
    $this->invalidRequest($io);
  }

  // Asserting Functions

  public function timeoutChecker($io)
  {
    $this->assertEquals(100, $io->getTimeout());
    $io->setTimeout(120);
    $this->assertEquals(120, $io->getTimeout());
  }

  public function invalidRequest($io)
  {
    $url = "http://localhost:1";
    $req = new Google_Http_Request($url, "GET");
    $io->makeRequest($req);
  }

  public function cacheHit($io, $client)
  {
    $url = "http://www.googleapis.com";
    // Create a cacheable request/response.
    // Should not be revalidated.
    $cacheReq = new Google_Http_Request($url, "GET");
    $cacheReq->setRequestHeaders(
        array("Accept" => "*/*",)
    );
    $cacheReq->setResponseBody("{\"a\": \"foo\"}");
    $cacheReq->setResponseHttpCode(200);
    $cacheReq->setResponseHeaders(
        array(
            "Cache-Control" => "private",
            "ETag" => "\"this-is-an-etag\"",
            "Expires" => "Sun, 22 Jan 2022 09:00:56 GMT",
            "Date" => "Sun, 1 Jan 2012 09:00:56 GMT",
            "Content-Type" => "application/json; charset=UTF-8",
        )
    );

    // Populate the cache.
    $io->setCachedRequest($cacheReq);

    // Execute the same mock request, and expect a cache hit.
    $res = $io->makeRequest(new Google_Http_Request($url, "GET"));
    $this->assertEquals("{\"a\": \"foo\"}", $res->getResponseBody());
    $this->assertEquals(200, $res->getResponseHttpCode());
  }

  public function authCache($io, $client)
  {
    $url = "http://www.googleapis.com/protected/resource";

    // Create a cacheable request/response, but it should not be cached.
    $cacheReq = new Google_Http_Request($url, "GET");
    $cacheReq->setRequestHeaders(
        array(
            "Accept" => "*/*",
            "Authorization" => "Bearer Foo"
        )
    );
    $cacheReq->setResponseBody("{\"a\": \"foo\"}");
    $cacheReq->setResponseHttpCode(200);
    $cacheReq->setResponseHeaders(
        array(
            "Cache-Control" => "private",
            "ETag" => "\"this-is-an-etag\"",
            "Expires" => "Sun, 22 Jan 2022 09:00:56 GMT",
            "Date: Sun, 1 Jan 2012 09:00:56 GMT",
            "Content-Type" => "application/json; charset=UTF-8",
        )
    );

    $result = $io->setCachedRequest($cacheReq);
    $this->assertFalse($result);
  }

  public function responseChecker($io)
  {
    $hasQuirk = false;
    if (function_exists('curl_version')) {
      $curlVer = curl_version();
      $hasQuirk = $curlVer['version_number'] < Google_IO_Curl::NO_QUIRK_VERSION;
    }

    $rawHeaders = "HTTP/1.1 200 OK\r\n"
        . "Expires: Sun, 22 Jan 2012 09:00:56 GMT\r\n"
        . "Date: Sun, 22 Jan 2012 09:00:56 GMT\r\n"
        . "Content-Type: application/json; charset=UTF-8\r\n";
    $size = strlen($rawHeaders);
    $rawBody = "{}";

    $rawResponse = "$rawHeaders\r\n$rawBody";
    list($headers, $body) = $io->parseHttpResponse($rawResponse, $size);
    $this->assertEquals(3, sizeof($headers));
    $this->assertEquals(array(), json_decode($body, true));

    // Test empty bodies.
    $rawResponse = $rawHeaders . "\r\n";
    list($headers, $body) = $io->parseHttpResponse($rawResponse, $size);
    $this->assertEquals(3, sizeof($headers));
    $this->assertEquals(null, json_decode($body, true));

    // Test no content.
    $rawerHeaders = "HTTP/1.1 204 No Content\r\n"
      . "Date: Fri, 19 Sep 2014 15:52:14 GMT";
    list($headers, $body) = $io->parseHttpResponse($rawerHeaders, 0);
    $this->assertEquals(1, sizeof($headers));
    $this->assertEquals(null, json_decode($body, true));

    // Test transforms from proxies.
    $connection_established_headers = array(
      "HTTP/1.0 200 Connection established\r\n\r\n",
      "HTTP/1.1 200 Connection established\r\n\r\n",
    );
    foreach ($connection_established_headers as $established_header) {
        $rawHeaders = "{$established_header}HTTP/1.1 200 OK\r\nContent-Type: application/json\r\n";
        $headersSize = strlen($rawHeaders);
        // If we have a broken cURL version we have to simulate it to get the
        // correct test result.
        if ($hasQuirk && get_class($io) === 'Google_IO_Curl') {
            $headersSize -= strlen($established_header);
        }
        $rawBody = "{}";

        $rawResponse = "$rawHeaders\r\n$rawBody";
        list($headers, $body) = $io->parseHttpResponse($rawResponse, $headersSize);
        $this->assertEquals(1, sizeof($headers));
        $this->assertEquals(array(), json_decode($body, true));
    }
  }

  public function processEntityRequest($io, $client)
  {
    $req = new Google_Http_Request("http://localhost.com");
    $req->setRequestMethod("POST");

    // Verify that the content-length is calculated.
    $req->setPostBody("{}");
    $io->processEntityRequest($req);
    $this->assertEquals(2, $req->getRequestHeader("content-length"));

    // Test an empty post body.
    $req->setPostBody("");
    $io->processEntityRequest($req);
    $this->assertEquals(0, $req->getRequestHeader("content-length"));

    // Test a null post body.
    $req->setPostBody(null);
    $io->processEntityRequest($req);
    $this->assertEquals(0, $req->getRequestHeader("content-length"));

    // Set an array in the postbody, and verify that it is url-encoded.
    $req->setPostBody(array("a" => "1", "b" => 2));
    $io->processEntityRequest($req);
    $this->assertEquals(7, $req->getRequestHeader("content-length"));
    $this->assertEquals(
        Google_IO_Abstract::FORM_URLENCODED,
        $req->getRequestHeader("content-type")
    );
    $this->assertEquals("a=1&b=2", $req->getPostBody());

    // Verify that the content-type isn't reset.
    $payload = array("a" => "1", "b" => 2);
    $req->setPostBody($payload);
    $req->setRequestHeaders(array("content-type" => "multipart/form-data"));
    $io->processEntityRequest($req);
    $this->assertEquals(
        "multipart/form-data",
        $req->getRequestHeader("content-type")
    );
    $this->assertEquals($payload, $req->getPostBody());
  }
}
