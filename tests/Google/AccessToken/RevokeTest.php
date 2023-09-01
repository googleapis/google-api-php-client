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

namespace Google\Tests\AccessToken;

use Google\AccessToken\Revoke;
use Google\Tests\BaseTest;
use Prophecy\Argument;

class RevokeTest extends BaseTest
{
    public function testRevokeAccess()
    {
        $accessToken = 'ACCESS_TOKEN';
        $refreshToken = 'REFRESH_TOKEN';
        $token = '';

        $response = $this->prophesize('Psr\Http\Message\ResponseInterface');
        $response->getStatusCode()
            ->shouldBeCalledTimes(3)
            ->willReturn(200);

        $http = $this->prophesize('GuzzleHttp\ClientInterface');
        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(3)
            ->will(function ($args) use (&$token, $response) {
                parse_str((string) $args[0]->getBody(), $fields);
                $token = isset($fields['token']) ? $fields['token'] : null;

                return $response->reveal();
            });

        $t = [
            'access_token' => $accessToken,
            'created' => time(),
            'expires_in' => '3600'
        ];

        // Test with access token.
        $revoke = new Revoke($http->reveal());
        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($accessToken, $token);

        // Test with refresh token.
        $revoke = new Revoke($http->reveal());
        $t = [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'created' => time(),
            'expires_in' => '3600'
        ];

        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($refreshToken, $token);

        // Test with token string.
        $revoke = new Revoke($http->reveal());
        $t = $accessToken;
        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($accessToken, $token);
    }
}
