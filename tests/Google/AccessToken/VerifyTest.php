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

use Firebase\JWT\JWT;
use Google\AccessToken\Verify;
use Google\Tests\BaseTest;

class VerifyTest extends BaseTest
{
    /**
     * Most of the logic for ID token validation is in AuthTest -
     * this is just a general check to ensure we verify a valid
     * id token if one exists.
     */
    public function testValidateIdToken()
    {
        $this->checkToken();

        $jwt = new JWT();
        $client = $this->getClient();
        $http = $client->getHttpClient();
        $token = $client->getAccessToken();
        if ($client->isAccessTokenExpired()) {
            $token = $client->fetchAccessTokenWithRefreshToken();
        }
        $segments = explode('.', $token['id_token']);
        $this->assertCount(3, $segments);
        // Extract the client ID in this case as it wont be set on the test client.
        $data = json_decode($jwt->urlSafeB64Decode($segments[1]));
        $verify = new Verify($http);
        $payload = $verify->verifyIdToken($token['id_token'], $data->aud);
        $this->assertIsArray($payload);
        $this->assertArrayHasKey('sub', $payload);
        $this->assertGreaterThan(0, strlen($payload['sub']));

        // TODO: Need to be smart about testing/disabling the
        // caching for this test to make sense. Not sure how to do that
        // at the moment.
        $client = $this->getClient();
        $http = $client->getHttpClient();
        $data = json_decode($jwt->urlSafeB64Decode($segments[1]));
        $verify = new Verify($http);
        $payload = $verify->verifyIdToken($token['id_token'], $data->aud);
        $this->assertArrayHasKey('sub', $payload);
        $this->assertGreaterThan(0, strlen($payload['sub']));
    }

    /**
     * Most of the logic for ID token validation is in AuthTest -
     * this is just a general check to ensure we verify a valid
     * id token if one exists.
     */
    public function testLeewayIsUnchangedWhenPassingInJwt()
    {
        $this->checkToken();

        $jwt = new JWT();
        // set arbitrary leeway so we can check this later
        $jwt::$leeway = $leeway = 1.5;
        $client = $this->getClient();
        $token = $client->getAccessToken();

        if ($client->isAccessTokenExpired()) {
            $token = $client->fetchAccessTokenWithRefreshToken();
        }
        $segments = explode('.', $token['id_token']);
        $this->assertCount(3, $segments);
        // Extract the client ID in this case as it wont be set on the test client.
        $data = json_decode($jwt->urlSafeB64Decode($segments[1]));
        $verify = new Verify($client->getHttpClient(), null, $jwt);
        $payload = $verify->verifyIdToken($token['id_token'], $data->aud);
        // verify the leeway is set as it was
        $this->assertEquals($leeway, $jwt::$leeway);
    }

    public function getClient()
    {
        if (!$this->client) {
            $this->client = $this->createClient(['profile']);
        }
        return $this->client;
    }
}
