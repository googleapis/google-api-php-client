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
use Google\Auth\CacheInterface;

/**
 * Wrapper around Google Access Tokens which provides convenience functions
 *
 */
class Google_AccessToken
{
  const FEDERATED_SIGNON_CERT_URL = 'https://www.googleapis.com/oauth2/v1/certs';

  /**
   * @var array The access token.
   */
  private $token;

  /**
   * @var GuzzleHttp\ClientInterface The http client
   */
  private $http;

  /**
   * @var Google\Auth\CacheInterface cache class
   */
  private $cache;

  /**
   * Instantiates the class, but does not initiate the login flow, leaving it
   * to the discretion of the caller.
   */
  public function __construct($token, ClientInterface $http = null, CacheInterface $cache = null)
  {
    if (is_null($http)) {
      $http = new Client();
    }

    $this->http = $http;
    $this->cache = $cache;
    $this->setAccessToken($token);
  }

  /**
   * @param string|array $token
   * @throws InvalidArgumentException
   */
  public function setAccessToken($token)
  {
    if (is_string($token)) {
      if ($json = json_decode($token, true)) {
        $token = $json;
      } else {
        // assume $token is just the token string
        $token = [
          'access_token' => $token,
        ];
      }
    }
    if ($token == null) {
      throw new InvalidArgumentException('invalid json token');
    }
    if (!isset($token['access_token'])) {
      throw new InvalidArgumentException("Invalid token format");
    }
    $this->token = $token;
  }

  public function getAccessToken()
  {
    return $this->token;
  }

  /**
   * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
   * token, if a token isn't provided.
   * @throws Google_Auth_Exception
   * @param string|null $token The token (access token or a refresh token) that should be revoked.
   * @return boolean Returns True if the revocation was successful, otherwise False.
   */
  public function revokeToken()
  {
    if (!$this->token) {
        // Not initialized, no token to actually revoke
        return false;
    } elseif (array_key_exists('refresh_token', $this->token)) {
        $token = $this->token['refresh_token'];
    } else {
        $token = $this->token['access_token'];
    }

    $request = $this->http->createRequest('POST', Google_Client::OAUTH2_REVOKE_URI);
    $request->addHeader('Cache-Control', 'no-store');
    $request->addHeader('Content-Type', 'application/x-www-form-urlencoded');
    $request->getBody()->replaceFields(array('token' => $token));

    $response = $this->http->send($request);
    if ($response->getStatusCode() == 200) {
      $this->token = null;

      return true;
    }

    return false;
  }

  /**
   * Retrieve and cache a certificates file.
   *
   * @param $url string location
   * @throws Google_Auth_Exception
   * @return array certificates
   */
  private function retrieveCertsFromLocation($url)
  {
    // If we're retrieving a local file, just grab it.
    if ("http" != substr($url, 0, 4)) {
      $file = file_get_contents($url);
      if ($file) {
        return json_decode($file, true);
      } else {
        throw new Google_Auth_Exception(
            "Failed to retrieve verification certificates: '" .
            $url . "'."
        );
      }
    }

    $response = $this->http->get($url);

    if ($response->getStatusCode() == 200) {
      return $response->json();
    }
    throw new Google_Auth_Exception(
        "Failed to retrieve verification certificates: '" .
        $response->getBody()->getContents() . "'.",
        $response->getStatusCode()
    );
  }

  // Gets federated sign-on certificates to use for verifying identity tokens.
  // Returns certs as array structure, where keys are key ids, and values
  // are PEM encoded certificates.
  private function getFederatedSignOnCerts()
  {
    $cache = $this->getCache();

    if (!$certs = $cache->get('federated_signon_certs')) {
      $certs = $this->retrieveCertsFromLocation(
        self::FEDERATED_SIGNON_CERT_URL
      );

      $cache->set('federated_signon_certs', $certs);
    }

    return $certs;
  }

  /**
   * Verifies an id token and returns the authenticated apiLoginTicket.
   * Throws an exception if the id token is not valid.
   * The audience parameter can be used to control which id tokens are
   * accepted.  By default, the id token must have been issued to this OAuth2 client.
   *
   * @param $audience
   * @return array the token payload, if successful
   * @throws Google_Auth_Exception
   */
  public function verifyIdToken($audience = null)
  {
    if (empty($this->token['id_token'])) {
      throw new LogicException('id_token cannot be null');
    }

    // Check signature
    $certs = $this->getFederatedSignonCerts();
    foreach ($certs as $keyName => $pem) {
      $key = openssl_x509_read($pem);

      try {
        $payload = JWT::decode($this->token['id_token'], $key, array('RS256'));
        if (is_null($audience) || (property_exists($resp, 'aud') && $resp->aud == $audience)) {
          return $payload;
        }
        openssl_x509_free($key);
      } catch (ExpiredException $e) {
        return false;
        // continue
      } catch (DomainException $e) {
        // continue
      }
    }

    return false;
  }

  public function getCache()
  {
    if (!$this->cache) {
      $this->cache = $this->createDefaultCache();
    }

    return $this->cache;
  }

  protected function createDefaultCache()
  {
    return new Google_Cache_File(sys_get_temp_dir().'/google-api-php-client');
  }
}