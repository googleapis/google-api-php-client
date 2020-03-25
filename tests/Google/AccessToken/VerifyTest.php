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

class Google_AccessToken_VerifyTest extends BaseTest
{
  /**
   * This test needs to run before the other verify tests,
   * to ensure the constants are not defined.
   */
  public function testPhpsecConstants()
  {
    $client = $this->getClient();
    $verify = new Google_AccessToken_Verify($client->getHttpClient());

    // set these to values that will be changed
    if (defined('MATH_BIGINTEGER_OPENSSL_ENABLED') || defined('CRYPT_RSA_MODE')) {
      $this->markTestSkipped('Cannot run test - constants already defined');
    }

    // Pretend we are on App Engine VMs
    putenv('GAE_VM=1');

    $verify->verifyIdToken('a.b.c');

    putenv('GAE_VM=0');

    $openSslEnable = constant('MATH_BIGINTEGER_OPENSSL_ENABLED');
    $rsaMode = constant('CRYPT_RSA_MODE');
    $this->assertTrue($openSslEnable);
    $this->assertEquals(constant($this->getOpenSslConstant()), $rsaMode);
  }

  /**
   * Most of the logic for ID token validation is in AuthTest -
   * this is just a general check to ensure we verify a valid
   * id token if one exists.
   */
  public function testValidateIdToken()
  {
    $this->checkToken();

    $jwt = $this->getJwtService();
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
    $verify = new Google_AccessToken_Verify($http);
    $payload = $verify->verifyIdToken($token['id_token'], $data->aud);
    $this->assertArrayHasKey('sub', $payload);
    $this->assertGreaterThan(0, strlen($payload['sub']));

    // TODO: Need to be smart about testing/disabling the
    // caching for this test to make sense. Not sure how to do that
    // at the moment.
    $client = $this->getClient();
    $http = $client->getHttpClient();
    $data = json_decode($jwt->urlSafeB64Decode($segments[1]));
    $verify = new Google_AccessToken_Verify($http);
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

    $jwt = $this->getJwtService();
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
    $verify = new Google_AccessToken_Verify($client->getHttpClient(), null, $jwt);
    $payload = $verify->verifyIdToken($token['id_token'], $data->aud);
    // verify the leeway is set as it was
    $this->assertEquals($leeway, $jwt::$leeway);
  }

  public function testRetrieveCertsFromLocation()
  {
    $client = $this->getClient();
    $verify = new Google_AccessToken_Verify($client->getHttpClient());

    // make this method public for testing purposes
    $method = new ReflectionMethod($verify, 'retrieveCertsFromLocation');
    $method->setAccessible(true);
    $certs = $method->invoke($verify, Google_AccessToken_Verify::FEDERATED_SIGNON_CERT_URL);

    $this->assertArrayHasKey('keys', $certs);
    $this->assertGreaterThan(1, count($certs['keys']));
    $this->assertArrayHasKey('alg', $certs['keys'][0]);
    $this->assertEquals('RS256', $certs['keys'][0]['alg']);
  }

  private function getJwtService()
  {
    if (class_exists('\Firebase\JWT\JWT')) {
      return new \Firebase\JWT\JWT;
    }

    return new \JWT;
  }

  private function getOpenSslConstant()
  {
    if (class_exists('phpseclib\Crypt\RSA')) {
      return 'phpseclib\Crypt\RSA::MODE_OPENSSL';
    }

    if (class_exists('Crypt_RSA')) {
      return 'CRYPT_RSA_MODE_OPENSSL';
    }
  }
}
