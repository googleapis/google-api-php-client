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

class Google_Cache_CallbackTest extends BaseTest
{
  public function testCallbackCache()
  {
    $phpunit = $this;
    $called = false;
    $callback = function ($key, $value) use ($phpunit, &$called) {
      $called = true;
      $phpunit->assertEquals('foo', $key);
      $phpunit->assertEquals('bar', $value);
    };

    $cache = new Google_Cache_Callback($callback);
    $cache->set('foo', 'bar');

    $this->assertTrue($called);
  }

  public function testClientNotifiesCallbackCacheByDefault()
  {
    $this->checkToken();

    $client = $this->getClient();
    $accessToken = $client->getAccessToken();

    if (!isset($accessToken['refresh_token'])) {
      $this->markTestSkipped('Refresh Token required');
    }

    // make the client think the token is expired
    $accessToken['expires_in'] = 0;
    $client->getCache()->set('access_token', $accessToken);

    // ensure cache is expired cache
    $client->setCacheConfig([ 'lifetime' => 1 ]);
    sleep(1);

    // make a silly request to obtain a new token
    $http = $client->authorize();
    $http->get('https://www.googleapis.com/books/v1/volumes?q=Voltaire');
    $newToken = $client->getAccessToken();

    $this->assertNotEquals($accessToken['access_token'], $newToken['access_token']);
  }
}
