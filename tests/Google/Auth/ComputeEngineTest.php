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

use GuzzleHttp\Message\Request;

class Google_Auth_ComputeEngineTest extends BaseTest
{
  public function testTokenAcquisition()
  {
    $client = new Google_Client();

    /* Mock out refresh call */
    $response_data = json_encode(
        array(
          'access_token' => "ACCESS_TOKEN",
          'expires_in' => "12345"
        )
    );
    $response = $this->getMock("GuzzleHttp\Message\ResponseInterface", array(), array(''));
    $response->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue(200));
    $response->expects($this->any())
            ->method('getBody')
            ->will($this->returnValue($response_data));
    $http = $this->getMockBuilder('GuzzleHttp\Client')
            ->disableOriginalConstructor()
            ->getMock();
    $http->expects($this->once())
            ->method('send')
            ->will($this->returnValue($response));
    $client->setHttpClient($http);

    /* Run method */
    $oauth = new Google_Auth_ComputeEngine($client);
    $oauth->acquireAccessToken();
    $token = json_decode($oauth->getAccessToken(), true);

    /* Check results */
    $this->assertEquals($token['access_token'], "ACCESS_TOKEN");
    $this->assertEquals($token['expires_in'], "12345");
    $this->assertTrue($token['created'] > 0);
  }

  public function testSign()
  {
    $client = new Google_Client();
    $oauth = new Google_Auth_ComputeEngine($client);

    /* Load mock access token */
    $oauth->setAccessToken(
        json_encode(
            array(
                'access_token' => "ACCESS_TOKEN",
                'expires_in' => "12345"
            )
        )
    );

    /* Sign a URL and verify auth header is correctly set */
    $req = new Request('GET', 'http://localhost');
    $req = $oauth->sign($req);
    $auth = $req->getHeader('authorization');
    $this->assertEquals('Bearer ACCESS_TOKEN', $auth);
  }
}
