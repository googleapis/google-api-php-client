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
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Google\Tests\BaseTest;

class AuthHandlerTest extends BaseTest
{
    public function testSetAccessTokenResultsInAuthCacheMiss()
    {
        $this->onlyGuzzle6Or7();

        $cache = new MemoryCacheItemPool();
        $authHandler = AuthHandlerFactory::build($cache);
        $scopes = ['scope1', 'scope2'];
        $token1 = ['access_token' => '1234'];
        $token2 = ['access_token' => '5678'];

        $http1 = $authHandler->attachToken(
            new Client(),
            $token1,
            $scopes
        );

        // Call our middleware
        $scopedMiddleware = $this->getGoogleAuthMiddleware($http1);
        $callable = $scopedMiddleware(function ($request) { return $request; });
        $request = $callable(new Request('GET', '/'), ['auth' => 'scoped']);
        $this->assertEquals(['Bearer 1234'], $request->getHeader('Authorization'));

        // try with a new token
        $http2 = $authHandler->attachToken(
            new Client(),
            $token2,
            $scopes
        );

        // Call our middleware
        $scopedMiddleware = $this->getGoogleAuthMiddleware($http2);
        $callable = $scopedMiddleware(function ($request) { return $request; });
        $request = $callable(new Request('GET', '/'), ['auth' => 'scoped']);
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
        return $stack[$authMiddlewareIdx][0];
    }
}