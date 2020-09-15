<?php

use Prophecy\Argument;

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

class Google_AccessToken_RevokeTest extends BaseTest
{
    public function testRevokeAccessGuzzle5()
    {
        $this->onlyGuzzle5();

        $accessToken = 'ACCESS_TOKEN';
        $refreshToken = 'REFRESH_TOKEN';
        $token = '';

        $response = $this->prophesize('GuzzleHttp\Message\ResponseInterface');
        $response->getStatusCode()
            ->shouldBeCalledTimes(3)
            ->willReturn(200);

        $response->getHeaders()->willReturn([]);
        $response->getBody()->willReturn('');
        $response->getProtocolVersion()->willReturn('');
        $response->getReasonPhrase()->willReturn('');

        $http = $this->prophesize('GuzzleHttp\ClientInterface');
        $http->send(Argument::type('GuzzleHttp\Message\RequestInterface'))
            ->shouldBeCalledTimes(3)
            ->will(function ($args) use (&$token, $response) {
                $request = $args[0];
                parse_str((string) $request->getBody(), $fields);
                $token = isset($fields['token']) ? $fields['token'] : null;

                return $response->reveal();
            });

        $requestToken = null;
        $request = $this->prophesize('GuzzleHttp\Message\RequestInterface');
        $request->getBody()
            ->shouldBeCalledTimes(3)
            ->will(function () use (&$requestToken) {
                return 'token='.$requestToken;
            });

        $http->createRequest(Argument::any(), Argument::any(), Argument::any())
            ->shouldBeCalledTimes(3)
            ->will(function ($args) use (&$requestToken, $request) {
                $params = $args[2];
                parse_str((string) $params['body'], $fields);
                $requestToken = isset($fields['token']) ? $fields['token'] : null;

                return $request;
            });

        $t = [
            'access_token' => $accessToken,
            'created' => time(),
            'expires_in' => '3600'
        ];

        // Test with access token.
        $revoke = new Google_AccessToken_Revoke($http->reveal());
        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($accessToken, $token);

        // Test with refresh token.
        $revoke = new Google_AccessToken_Revoke($http->reveal());
        $t = [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'created' => time(),
            'expires_in' => '3600'
        ];

        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($refreshToken, $token);

        // Test with token string.
        $revoke = new Google_AccessToken_Revoke($http->reveal());
        $t = $accessToken;
        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($accessToken, $token);
    }

    public function testRevokeAccessGuzzle6Or7()
    {
        $this->onlyGuzzle6Or7();

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
        $revoke = new Google_AccessToken_Revoke($http->reveal());
        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($accessToken, $token);

        // Test with refresh token.
        $revoke = new Google_AccessToken_Revoke($http->reveal());
        $t = [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken,
            'created' => time(),
            'expires_in' => '3600'
        ];

        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($refreshToken, $token);

        // Test with token string.
        $revoke = new Google_AccessToken_Revoke($http->reveal());
        $t = $accessToken;
        $this->assertTrue($revoke->revokeToken($t));
        $this->assertEquals($accessToken, $token);
    }
}
