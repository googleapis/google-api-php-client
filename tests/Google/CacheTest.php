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

namespace Google\Tests;

use Google\Client;
use Google\Auth\Cache\MemoryCacheItemPool;
use Google\Service\Drive;
use DateTime;

class CacheTest extends BaseTest
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

        /* Make a service call */
        $service = new Drive($client);
        $files = $service->files->listFiles();
        $this->assertInstanceOf('Google_Service_Drive_FileList', $files);
    }

    public function testFileCache()
    {
        $this->checkServiceAccountCredentials();

        $client = new Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.readonly']);
        // filecache with new cache dir
        $cache = $this->getCache(sys_get_temp_dir() . '/cloud-samples-tests-php-cache-test/');
        $client->setCache($cache);

        $token1 = null;
        $client->setTokenCallback(function ($cacheKey, $accessToken) use ($cache, &$token1) {
            $token1 = $accessToken;
            $cacheItem = $cache->getItem($cacheKey);
            // expire the item
            $cacheItem->expiresAt(new DateTime('now -1 second'));
            $cache->save($cacheItem);

            $cacheItem2 = $cache->getItem($cacheKey);
        });

        /* Refresh token when expired */
        if ($client->isAccessTokenExpired()) {
            $client->refreshTokenWithAssertion();
        }

        /* Make a service call */
        $service = new Drive($client);
        $files = $service->files->listFiles();
        $this->assertInstanceOf(Drive\FileList::class, $files);

        sleep(2);

        // make sure the token expires
        $client = new Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.readonly']);
        $client->setCache($cache);
        $token2 = null;
        $client->setTokenCallback(function ($cacheKey, $accessToken) use (&$token2) {
            $token2 = $accessToken;
        });

        /* Make another service call */
        $service = new Drive($client);
        $files = $service->files->listFiles();
        $this->assertInstanceOf(Drive\FileList::class, $files);

        $this->assertNotEquals($token1, $token2);
    }
}
