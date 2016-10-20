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

use GuzzleHttp\Client;
use Google\Auth\Cache\MemoryCacheItemPool;

class Google_CacheTest extends BaseTest
{
  public function testInMemoryCache()
  {
    $this->checkServiceAccountCredentials();

    $client = $this->getClient();
    $client->useApplicationDefaultCredentials();
    $client->setAccessType('offline');
    $client->setScopes(['https://www.googleapis.com/auth/drive.readonly']);
    $client->setCache(new MemoryCacheItemPool);

    /* Refresh token when expired */
    if ($client->isAccessTokenExpired()) {
      $client->refreshTokenWithAssertion();
    }

    /* Creating the actual service */
    $service = new Google_Service_Drive($client);
    $files = $service->files->listFiles();
    $this->assertInstanceOf('Google_Service_Drive_FileList', $files);
  }
}
