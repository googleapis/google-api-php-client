<?php

use GuzzleHttp\Message\Request;
use GuzzleHttp\Client;

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
  public function testRevokeAccess()
  {
    $accessToken = 'ACCESS_TOKEN';
    $refreshToken = 'REFRESH_TOKEN';
    $token = '';

    $postBody = $this->getMock('GuzzleHttp\Post\PostBodyInterface');
    $postBody->expects($this->exactly(2))
      ->method('replaceFields')
      ->will($this->returnCallback(
            function ($fields) use (&$token) {
              $token = isset($fields['token']) ? $fields['token'] : null;
            }
        ));
    $request = $this->getMock('GuzzleHttp\Message\RequestInterface');
    $request->expects($this->exactly(2))
      ->method('getBody')
      ->will($this->returnValue($postBody));
    $response = $this->getMock('GuzzleHttp\Message\ResponseInterface');
    $response->expects($this->exactly(2))
      ->method('getStatusCode')
      ->will($this->returnValue(200));
    $http = $this->getMock('GuzzleHttp\ClientInterface');
    $http->expects($this->exactly(2))
      ->method('send')
      ->will($this->returnValue($response));
    $http->expects($this->exactly(2))
      ->method('createRequest')
      ->will($this->returnValue($request));

    $t = array(
      'access_token' => $accessToken,
      'created' => time(),
      'expires_in' => '3600'
    );

    // Test with access token.
    $revoke = new Google_AccessToken_Revoke($http);
    $this->assertTrue($revoke->revokeToken($t));
    $this->assertEquals($accessToken, $token);

    // Test with refresh token.
    $revoke = new Google_AccessToken_Revoke($http);
    $t = array(
      'access_token' => $accessToken,
      'refresh_token' => $refreshToken,
      'created' => time(),
      'expires_in' => '3600'
    );
    $this->assertTrue($revoke->revokeToken($t));
    $this->assertEquals($refreshToken, $token);
  }

  /** @expectedException PHPUnit_Framework_Error */
  public function testInvalidStringToken()
  {
    // Test with string token
    $revoke = new Google_AccessToken_Revoke();
    $revoke->revokeToken('ACCESS_TOKEN');
  }
}
