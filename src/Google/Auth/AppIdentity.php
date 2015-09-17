<?php
/*
 * Copyright 2014 Google Inc.
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

/*
 * WARNING - this class depends on the Google App Engine PHP library
 * which is 5.3 and above only, so if you include this in a PHP 5.2
 * setup or one without 5.3 things will blow up.
 */

use google\appengine\api\app_identity\AppIdentityService;

/**
 * Authentication via the Google App Engine App Identity service.
 */
class Google_Auth_AppIdentity implements Google_Auth_Interface
{
  const CACHE_PREFIX = "Google_Auth_AppIdentity::";
  private $client;
  private $token = false;
  private $tokenScopes = false;

  public function __construct(Google_Client $client, $config = null)
  {
    $this->client = $client;
  }

  /**
   * Retrieve an access token for the scopes supplied.
   */
  public function authenticateForScope($scopes)
  {
    if ($this->token && $this->tokenScopes == $scopes) {
      return $this->token;
    }

    $cacheKey = self::CACHE_PREFIX;
    if (is_string($scopes)) {
      $cacheKey .= $scopes;
    } else if (is_array($scopes)) {
      $cacheKey .= implode(":", $scopes);
    }

    $this->token = $this->client->getCache()->get($cacheKey);
    if (!$this->token) {
      $this->retrieveToken($scopes, $cacheKey);
    } else if ($this->token['expiration_time'] < time()) {
      $this->client->getCache()->delete($cacheKey);
      $this->retrieveToken($scopes, $cacheKey);
    }

    $this->tokenScopes = $scopes;
    return $this->token;
  }

  /**
   * Retrieve a new access token and store it in cache
   * @param mixed $scopes
   * @param string $cacheKey
   */
  private function retrieveToken($scopes, $cacheKey)
  {
    $this->token = AppIdentityService::getAccessToken($scopes);
    if ($this->token) {
      $this->client->getCache()->set(
          $cacheKey,
          $this->token
      );
    }
  }

  /**
   * Perform an authenticated / signed apiHttpRequest.
   * This function takes the apiHttpRequest, calls apiAuth->sign on it
   * (which can modify the request in what ever way fits the auth mechanism)
   * and then sends the request using the http client
   *
   * @param GuzzleHttp\Message\Request $request
   * @return GuzzleHttp\Message\Response The resulting HTTP response
   */
  public function authenticatedRequest($request)
  {
    $request = $this->sign($request);

    return $this->client->getHttpClient()->send($request);
  }

  public function sign($request)
  {
    if (!$this->token) {
      // No token, so nothing to do.
      return $request;
    }

    $this->client->getLogger()->debug('App Identity authentication');

    // Add the OAuth2 header to the request
    $request->setHeader('Authorization', 'Bearer ' . $this->token['access_token']);

    return $request;
  }
}
