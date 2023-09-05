<?php
/**
 * Copyright 2022 Google LLC
 *
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

namespace Google\Tests\AuthHandler;

use Google\AuthHandler\AuthHandlerFactory;
use Google\Auth\Cache\MemoryCacheItemPool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Google\Tests\BaseTest;

class AuthHandlerTest extends BaseTest
{
    public function testSetAccessTokenResultsInAuthCacheMiss()
    {
        $client = new Client();
        $cache = new MemoryCacheItemPool();
        $authHandler = AuthHandlerFactory::build($cache);
        $scopes = ['scope1', 'scope2'];

        // Attach the first token to the HTTP client
        $http1 = $authHandler->attachToken(
            $client,
            ['access_token' => '1234'],
            $scopes
        );

        // Call our middleware and verify the token is set
        $scopedMiddleware = $this->getGoogleAuthMiddleware($http1);
        $request = $scopedMiddleware(new Request('GET', '/'), ['auth' => 'scoped']);
        $this->assertEquals(['Bearer 1234'], $request->getHeader('Authorization'));

        // Attach a new token to the HTTP client
        $http2 = $authHandler->attachToken(
            $client,
            ['access_token' => '5678'],
            $scopes
        );

        // Call our middleware and verify the NEW token is set
        $scopedMiddleware = $this->getGoogleAuthMiddleware($http2);
        $request = $scopedMiddleware(new Request('GET', '/'), ['auth' => 'scoped']);
        $this->assertEquals(['Bearer 5678'], $request->getHeader('Authorization'));
    }

    private function getGoogleAuthMiddleware(Client $http)
    {
        // All sorts of horrible reflection to get at our middleware
        $handler = $http->getConfig()['handler'];
        $reflectionMethod = new \ReflectionMethod($handler, 'findByName');
        $reflectionMethod->setAccessible(true);
        $authMiddlewareIdx = $reflectionMethod->invoke($handler, 'google_auth');

        $reflectionProperty = new \ReflectionProperty($handler, 'stack');
        $reflectionProperty->setAccessible(true);
        $stack = $reflectionProperty->getValue($handler);

        $callable = $stack[$authMiddlewareIdx][0];
        return $callable(function ($request) {
            return $request;
        });
    }
}
