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
require_once 'Google/Http/CacheParser.php';
require_once 'Google/Http/Request.php';

class ApiCacheParserTest extends BaseTest {
  public function testIsResponseCacheable() {
    $client = $this->getClient();
    $resp = new Google_Http_Request('http://localhost', 'POST');
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);

    // The response has expired, and we don't have an etag for
    // revalidation.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' => 'Fri, 30 Oct 1998 14:19:41 GMT',
      'Date' => 'Mon, 29 Jun 1998 02:28:12 GMT',
      'Last-Modified' => 'Mon, 29 Jun 1998 02:28:12 GMT',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);

    // Verify cacheable responses.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' => 'Fri, 30 Oct 2013 14:19:41 GMT',
      'Date' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'Last-Modified' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertTrue($result);

    // Verify that responses to HEAD requests are cacheable.
    $resp = new Google_Http_Request('http://localhost', 'HEAD');
    $resp->setResponseHttpCode('200');
    $resp->setResponseBody(null);
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' => 'Fri, 30 Oct 2013 14:19:41 GMT',
      'Date' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'Last-Modified' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertTrue($result);

    // Verify that Vary: * cannot get cached.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' => 'Fri, 30 Oct 2013 14:19:41 GMT',
      'Date' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'Last-Modified' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'Vary' => 'foo',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);

    // Verify 201s cannot get cached.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('201');
    $resp->setResponseBody(null);
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' => 'Fri, 30 Oct 2013 14:19:41 GMT',
      'Last-Modified' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);

    // Verify pragma: no-cache.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  'Wed, 11 Jan 2012 04:03:37 GMT',
      'Date' => 'Wed, 11 Jan 2012 04:03:37 GMT',
      'Pragma' => 'no-cache',
      'Cache-Control' => 'private, max-age=0, must-revalidate, no-transform',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);

    // Verify Cache-Control: no-store.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  'Wed, 11 Jan 2012 04:03:37 GMT',
      'Date' => 'Wed, 11 Jan 2012 04:03:37 GMT',
      'Cache-Control' => 'no-store',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);

    // Verify that authorized responses are not cacheable.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setRequestHeaders(array('Authorization' => 'Bearer Token'));
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' => 'Fri, 30 Oct 2013 14:19:41 GMT',
      'Last-Modified' => 'Mon, 29 Jun 2011 02:28:12 GMT',
      'ETag' => '3e86-410-3596fbbc',
    ));
    $result = Google_Http_CacheParser::isResponseCacheable($resp);
    $this->assertFalse($result);
  }

  public function testIsExpired() {
    $now = time();
    $future = $now + (365 * 24 * 60 * 60);
    $client = $this->getClient();

    // Expires 1 year in the future. Response is fresh.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  gmdate('D, d M Y H:i:s', $future) . ' GMT',
      'Date' => gmdate('D, d M Y H:i:s', $now) . ' GMT',
    ));
    $this->assertFalse(Google_Http_CacheParser::isExpired($resp));

    // The response expires soon. Response is fresh.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  gmdate('D, d M Y H:i:s', $now + 2) . ' GMT',
      'Date' => gmdate('D, d M Y H:i:s', $now) . ' GMT',
    ));
    $this->assertFalse(Google_Http_CacheParser::isExpired($resp));

    // Expired 1 year ago. Response is stale.
    $past = $now - (365 * 24 * 60 * 60);
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  gmdate('D, d M Y H:i:s', $past) . ' GMT',
      'Date' => gmdate('D, d M Y H:i:s', $now) . ' GMT',
    ));
    $this->assertTrue(Google_Http_CacheParser::isExpired($resp));

    // Invalid expires header. Response is stale.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  '-1',
      'Date' => gmdate('D, d M Y H:i:s', $now) . ' GMT',
    ));
    $this->assertTrue(Google_Http_CacheParser::isExpired($resp));

    // The response expires immediately. G+ APIs do this. Response is stale.
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Expires' =>  gmdate('D, d M Y H:i:s', $now) . ' GMT',
      'Date' =>     gmdate('D, d M Y H:i:s', $now) . ' GMT',
    ));
    $this->assertTrue(Google_Http_CacheParser::isExpired($resp));
  }

  public function testMustRevalidate() {
    $now = time();
    $client = $this->getClient();

    // Expires 1 year in the future, and contains the must-revalidate directive.
    // Don't revalidate. must-revalidate only applies to expired entries.
    $future = $now + (365 * 24 * 60 * 60);
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600, must-revalidate',
      'Expires' =>  gmdate('D, d M Y H:i:s', $future) . ' GMT',
      'Date' => gmdate('D, d M Y H:i:s', $now) . ' GMT',
    ));
    $this->assertFalse(Google_Http_CacheParser::mustRevalidate($resp));

    // Contains the max-age=3600 directive, but was created 2 hours ago.
    // Must revalidate.
    $past = $now - (2 * 60 * 60);
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600',
      'Expires' =>  gmdate('D, d M Y H:i:s', $future) . ' GMT',
      'Date' => gmdate('D, d M Y H:i:s', $past) . ' GMT',
    ));
    $this->assertTrue(Google_Http_CacheParser::mustRevalidate($resp));

    // Contains the max-age=3600 directive, and was created 600 seconds ago.
    // No need to revalidate, regardless of the expires header.
    $past = $now - (600);
    $resp = new Google_Http_Request('http://localhost', 'GET');
    $resp->setResponseHttpCode('200');
    $resp->setResponseHeaders(array(
      'Cache-Control' => 'max-age=3600',
      'Expires' =>  gmdate('D, d M Y H:i:s', $past) . ' GMT',
      'Date' => gmdate('D, d M Y H:i:s', $past) . ' GMT',
    ));
    $this->assertFalse(Google_Http_CacheParser::mustRevalidate($resp));
  }
}
