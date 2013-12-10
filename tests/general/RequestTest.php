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
require_once 'Google/Service/Plus.php';
require_once 'Google/Http/Request.php';

class RequestTest extends BaseTest {
  public function testRequestParameters() 
  {
    $url = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my';
    $url2 = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my&hi=there';
    $request = new Google_Http_Request($this->getClient(), $url);
    $request->setExpectedClass("Google_Client");
    $this->assertEquals(2, count($request->getQueryParams()));
    $request->setQueryParam("hi", "there");
    $this->assertEquals($url2, $request->getUrl());
    $this->assertEquals("Google_Client", $request->getExpectedClass());
    
    $url3a = 'http://localhost:8080/foo/bar';
    $url3b = 'foo=a&foo=b&wowee=oh+my';
    $url3c = 'foo=a&foo=b&wowee=oh+my&hi=there';
    $request = new Google_Http_Request($this->getClient(), $url3a."?".$url3b, "POST");
    $request->setQueryParam("hi", "there");
    $request->maybeMoveParametersToBody();
    $this->assertEquals($url3a, $request->getUrl());
    $this->assertEquals($url3c, $request->getPostBody());
  }
  
  public function testRequestSerialization() {
    $url = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my';
    $url2 = 'http://localhost:8080/foo/bar?foo=a&foo=b&wowee=oh+my&hi=there';
    $request = new Google_Http_Request($this->getClient(), $url);
    $request->setExpectedClass("Not_A_Real");
    $request->setQueryParam("hi", "there");
    $s = serialize($request);
    $r = unserialize($s);
    $this->assertEquals($url2, $r->getUrl());
    $this->assertEquals("Google_Client", $r->getExpectedClass());
  }
}
