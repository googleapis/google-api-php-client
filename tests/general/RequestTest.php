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

class RequestTest extends BaseTest
{
  public function testRequestParameters()
  {
    $url = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my';
    $url2 = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my&hi=there';
    $request = new Google_Http_Request($url);
    $request->setExpectedClass("Google_Client");
    $this->assertEquals(2, count($request->getQueryParams()));
    $request->setQueryParam("hi", "there");
    $this->assertEquals($url2, $request->getUrl());
    $this->assertEquals("Google_Client", $request->getExpectedClass());

    $urlPath = "/foo/bar";
    $request = new Google_Http_Request($urlPath);
    $this->assertEquals($urlPath, $request->getUrl());
    $request->setBaseComponent("http://example.com");
    $this->assertEquals("http://example.com" . $urlPath, $request->getUrl());

    $url3a = 'http://localhost:8080/foo/bar';
    $url3b = 'foo=a&foo=b&wowee=oh+my';
    $url3c = 'foo=a&foo=b&wowee=oh+my&hi=there';
    $request = new Google_Http_Request($url3a."?".$url3b, "POST");
    $request->setQueryParam("hi", "there");
    $request->maybeMoveParametersToBody();
    $this->assertEquals($url3a, $request->getUrl());
    $this->assertEquals($url3c, $request->getPostBody());

    $url4 = 'http://localhost:8080/upload/foo/bar?foo=a&foo=b&wowee=oh+my&hi=there';
    $request = new Google_Http_Request($url);
    $this->assertEquals(2, count($request->getQueryParams()));
    $request->setQueryParam("hi", "there");
    $base = $request->getBaseComponent();
    $request->setBaseComponent($base . '/upload');
    $this->assertEquals($url4, $request->getUrl());
  }

  public function testGzipSupport()
  {
    $url = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my';
    $request = new Google_Http_Request($url);
    $request->enableGzip();
    $this->assertStringEndsWith(Google_Http_Request::GZIP_UA, $request->getUserAgent());
    $this->assertArrayHasKey('accept-encoding', $request->getRequestHeaders());
    $this->assertTrue($request->canGzip());
    $request->disableGzip();
    $this->assertStringEndsNotWith(Google_Http_Request::GZIP_UA, $request->getUserAgent());
    $this->assertArrayNotHasKey('accept-encoding', $request->getRequestHeaders());
    $this->assertFalse($request->canGzip());
  }
}
