<?php

/*
 * Copyright 2008 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Wrapper around Google Access Tokens which provides convenience functions
 *
 */
class Google_AccessToken_Revoke
{
  /**
   * @var GuzzleHttp\ClientInterface The http client
   */
  private $http;

  /**
   * Instantiates the class, but does not initiate the login flow, leaving it
   * to the discretion of the caller.
   */
  public function __construct(ClientInterface $http = null)
  {
    if (is_null($http)) {
      $http = new Client();
    }

    $this->http = $http;
  }

  /**
   * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
   * token, if a token isn't provided.
   *
   * @param string|null $token The token (access token or a refresh token) that should be revoked.
   * @return boolean Returns True if the revocation was successful, otherwise False.
   */
  public function revokeToken(array $token)
  {
    if (isset($token['refresh_token'])) {
        $tokenString = $token['refresh_token'];
    } else {
        $tokenString = $token['access_token'];
    }

    $request = $this->http->createRequest('POST', Google_Client::OAUTH2_REVOKE_URI);
    $request->addHeader('Cache-Control', 'no-store');
    $request->addHeader('Content-Type', 'application/x-www-form-urlencoded');
    $request->getBody()->replaceFields(array('token' => $tokenString));

    $response = $this->http->send($request);
    if ($response->getStatusCode() == 200) {
      return true;
    }

    return false;
  }
}
