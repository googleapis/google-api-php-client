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

class ApiOAuth2Test extends BaseTest
{

  public function testSign()
  {
    $client = $this->getClient();
    $oauth = new Google_Auth_OAuth2($client);

    $client->setClientId('clientId1');
    $client->setClientSecret('clientSecret1');
    $client->setRedirectUri('http://localhost');
    $client->setDeveloperKey('devKey');
    $client->setAccessType('offline');
    $client->setApprovalPrompt('force');
    $client->setRequestVisibleActions('http://foo');

    $req = new Google_Http_Request('http://localhost');
    $req = $oauth->sign($req);

    $this->assertEquals('http://localhost?key=devKey', $req->getUrl());

    // test accessToken
    $oauth->setAccessToken(
        json_encode(
            array(
              'access_token' => 'ACCESS_TOKEN',
              'created' => time(),
              'expires_in' => '3600'
            )
        )
    );

    $req = $oauth->sign($req);
    $auth = $req->getRequestHeader('authorization');
    $this->assertEquals('Bearer ACCESS_TOKEN', $auth);
  }

  public function testRevokeAccess()
  {
    $accessToken = "ACCESS_TOKEN";
    $refreshToken = "REFRESH_TOKEN";
    $accessToken2 = "ACCESS_TOKEN_2";
    $token = "";

    $client = $this->getClient();
    $response = $this->getMock("Google_Http_Request", array(), array(''));
    $response->expects($this->any())
            ->method('getResponseHttpCode')
            ->will($this->returnValue(200));
    $io = $this->getMock("Google_IO_Stream", array(), array($client));
    $io->expects($this->any())
        ->method('makeRequest')
        ->will(
            $this->returnCallback(
                function ($request) use (&$token, $response) {
                  $elements = array();
                  parse_str($request->getPostBody(), $elements);
                  $token = isset($elements['token']) ? $elements['token'] : null;
                  return $response;
                }
            )
        );
    $client->setIo($io);

    // Test with access token.
    $oauth  = new Google_Auth_OAuth2($client);
    $oauth->setAccessToken(
        json_encode(
            array(
              'access_token' => $accessToken,
              'created' => time(),
              'expires_in' => '3600'
            )
        )
    );
    $this->assertTrue($oauth->revokeToken());
    $this->assertEquals($accessToken, $token);

    // Test with refresh token.
    $oauth  = new Google_Auth_OAuth2($client);
    $oauth->setAccessToken(
        json_encode(
            array(
              'access_token' => $accessToken,
              'refresh_token' => $refreshToken,
              'created' => time(),
              'expires_in' => '3600'
            )
        )
    );
    $this->assertTrue($oauth->revokeToken());
    $this->assertEquals($refreshToken, $token);

    // Test with passed in token.
    $this->assertTrue($oauth->revokeToken($accessToken2));
    $this->assertEquals($accessToken2, $token);
  }

  public function testCreateAuthUrl()
  {
    $client = $this->getClient();
    $oauth = new Google_Auth_OAuth2($client);

    $client->setClientId('clientId1');
    $client->setClientSecret('clientSecret1');
    $client->setRedirectUri('http://localhost');
    $client->setDeveloperKey('devKey');
    $client->setAccessType('offline');
    $client->setApprovalPrompt('force');
    $client->setRequestVisibleActions(array('http://foo'));
    $client->setLoginHint("bob@example.org");

    $authUrl = $oauth->createAuthUrl("http://googleapis.com/scope/foo");
    $expected = "https://accounts.google.com/o/oauth2/auth"
        . "?response_type=code"
        . "&redirect_uri=http%3A%2F%2Flocalhost"
        . "&client_id=clientId1"
        . "&scope=http%3A%2F%2Fgoogleapis.com%2Fscope%2Ffoo"
        . "&access_type=offline"
        . "&approval_prompt=force"
        . "&login_hint=bob%40example.org";
    $this->assertEquals($expected, $authUrl);

    // Again with a blank login hint (should remove all traces from authUrl)
    $client->setLoginHint("");
    $client->setHostedDomain("example.com");
    $client->setOpenidRealm("example.com");
    $client->setPrompt("select_account");
    $client->setIncludeGrantedScopes(true);
    $authUrl = $oauth->createAuthUrl("http://googleapis.com/scope/foo");
    $expected = "https://accounts.google.com/o/oauth2/auth"
        . "?response_type=code"
        . "&redirect_uri=http%3A%2F%2Flocalhost"
        . "&client_id=clientId1"
        . "&scope=http%3A%2F%2Fgoogleapis.com%2Fscope%2Ffoo"
        . "&access_type=offline"
        . "&prompt=select_account"
        . "&hd=example.com"
        . "&openid.realm=example.com"
        . "&include_granted_scopes=true";
    $this->assertEquals($expected, $authUrl);
  }

  /**
   * Most of the logic for ID token validation is in AuthTest -
   * this is just a general check to ensure we verify a valid
   * id token if one exists.
   */
  public function testValidateIdToken()
  {
    if (!$this->checkToken()) {
      return;
    }

    $client = $this->getClient();
    $token = json_decode($client->getAccessToken());
    $segments = explode(".", $token->id_token);
    $this->assertEquals(3, count($segments));
    // Extract the client ID in this case as it wont be set on the test client.
    $data = json_decode(Google_Utils::urlSafeB64Decode($segments[1]));
    $oauth = new Google_Auth_OAuth2($client);
    $ticket = $oauth->verifyIdToken($token->id_token, $data->aud);
    $this->assertInstanceOf(
        "Google_Auth_LoginTicket",
        $ticket
    );
    $this->assertTrue(strlen($ticket->getUserId()) > 0);

    // TODO(ianbarber): Need to be smart about testing/disabling the
    // caching for this test to make sense. Not sure how to do that
    // at the moment.
    $client = $this->getClient();
    $client->setIo(new Google_IO_Stream($client));
    $data = json_decode(Google_Utils::urlSafeB64Decode($segments[1]));
    $oauth = new Google_Auth_OAuth2($client);
    $this->assertInstanceOf(
        "Google_Auth_LoginTicket",
        $oauth->verifyIdToken($token->id_token, $data->aud)
    );
  }

  /**
   * Test for revoking token when none is opened
   */
  public function testRevokeWhenNoTokenExists()
  {
    $client = new Google_Client();
    $this->assertFalse($client->revokeToken());
  }

  /**
   * Test that the ID token is properly refreshed.
   */
  public function testRefreshTokenSetsValues()
  {
    $client = new Google_Client();
    $response_data = json_encode(
        array(
          'access_token' => "ACCESS_TOKEN",
          'id_token' => "ID_TOKEN",
          'expires_in' => "12345",
        )
    );
    $response = $this->getMock("Google_Http_Request", array(), array(''));
    $response->expects($this->any())
            ->method('getResponseHttpCode')
            ->will($this->returnValue(200));
    $response->expects($this->any())
            ->method('getResponseBody')
            ->will($this->returnValue($response_data));
    $io = $this->getMock("Google_IO_Stream", array(), array($client));
    $io->expects($this->any())
        ->method('makeRequest')
        ->will(
            $this->returnCallback(
                function ($request) use (&$token, $response) {
                  $elements = $request->getPostBody();
                  PHPUnit_Framework_TestCase::assertEquals(
                      $elements['grant_type'],
                      "refresh_token"
                  );
                  PHPUnit_Framework_TestCase::assertEquals(
                      $elements['refresh_token'],
                      "REFRESH_TOKEN"
                  );
                  return $response;
                }
            )
        );
    $client->setIo($io);
    $oauth = new Google_Auth_OAuth2($client);
    $oauth->refreshToken("REFRESH_TOKEN");
    $token = json_decode($oauth->getAccessToken(), true);
    $this->assertEquals($token['id_token'], "ID_TOKEN");
  }
}
