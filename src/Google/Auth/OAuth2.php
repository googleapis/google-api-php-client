<?php

use Google\Auth\OAuth2;

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

if (!class_exists('Google_Client')) {
  require_once dirname(__FILE__) . '/../autoload.php';
}

/**
 * Authentication class that deals with the OAuth 2 web-server authentication flow
 *
 */
class Google_Auth_OAuth2 implements Google_Auth_Interface
{
  const OAUTH2_REVOKE_URI = 'https://accounts.google.com/o/oauth2/revoke';
  const OAUTH2_TOKEN_URI = 'https://www.googleapis.com/oauth2/v3/token';
  const OAUTH2_AUTH_URL = 'https://accounts.google.com/o/oauth2/auth';
  const CLOCK_SKEW_SECS = 300; // five minutes in seconds
  const AUTH_TOKEN_LIFETIME_SECS = 300; // five minutes in seconds
  const MAX_TOKEN_LIFETIME_SECS = 86400; // one day in seconds
  const OAUTH2_ISSUER = 'accounts.google.com';
  const OAUTH2_ISSUER_HTTPS = 'https://accounts.google.com';

  /**
   * @var GuzzleHttp\ClientInterface the base http client
   */
  private $http;

  /**
   * @var string The signing key when using assertion profile.
   */
  private $signingKey;

  /**
   * @var string The signing algorithm when using assertion profile.
   */
  private $signingAlgorithm;

  /**
   * @var string The state parameters for CSRF and other forgery protection.
   */
  private $state;

  /**
   * @var array The token bundle.
   */
  private $token = array();

  /**
   * @var Google_Client the base client
   */
  private $client;

  /**
   * Instantiates the class, but does not initiate the login flow, leaving it
   * to the discretion of the caller.
   */
  public function __construct(Google_Client $client)
  {
    $client->setAuth($this);
    $this->signingAlgorithm = 'RS256'; // default

    $this->client = $client;
    $this->http = $client->getHttpClient();
  }

  /**
   * @param string $code
   * @throws Google_Auth_Exception
   * @return string
   */
  public function authenticate($code, $crossClient = false)
  {
    if (strlen($code) == 0) {
      throw new Google_Auth_Exception("Invalid code");
    }

    $auth = $this->createAuthClient();
    $auth->setCode($code);
    $auth->setRedirectUri($this->client->getClassConfig($this, 'redirect_uri'));

    $creds = $auth->fetchAuthToken($this->http);

    return $this->handleAuthTokenResponse($creds);
  }

  /**
   * Create a URL to obtain user authorization.
   * The authorization endpoint allows the user to first
   * authenticate, and then grant/deny the access request.
   * @param string $scope The scope is expressed as a list of space-delimited strings.
   * @return string
   */
  public function createAuthUrl($scope)
  {
    $auth = $this->createAuthClient();
    $params = array(
        'response_type' => 'code',
        'access_type' => $this->client->getClassConfig($this, 'access_type'),
        'scope' => $scope,
    );

    // Prefer prompt to approval prompt.
    if ($this->client->getClassConfig($this, 'prompt')) {
      $params = $this->maybeAddParam($params, 'prompt');
    } else {
      $params = $this->maybeAddParam($params, 'approval_prompt');
    }
    $params = $this->maybeAddParam($params, 'login_hint');
    $params = $this->maybeAddParam($params, 'hd');
    $params = $this->maybeAddParam($params, 'openid.realm');
    $params = $this->maybeAddParam($params, 'include_granted_scopes');

    // If the list of scopes contains plus.login, add request_visible_actions
    // to auth URL.
    $rva = $this->client->getClassConfig($this, 'request_visible_actions');
    if (strpos($scope, 'plus.login') && strlen($rva) > 0) {
        $params['request_visible_actions'] = $rva;
    }

    if (isset($this->state)) {
      $params['state'] = $this->state;
    }

    $url = $auth->buildFullAuthorizationUri($params);

    return (string) $url;
  }

  /**
   * @param string $token
   * @throws Google_Auth_Exception
   */
  public function setAccessToken($token)
  {
    $token = json_decode($token, true);
    if ($token == null) {
      throw new Google_Auth_Exception('Could not json decode the token');
    }
    if (! isset($token['access_token'])) {
      throw new Google_Auth_Exception("Invalid token format");
    }
    $this->token = $token;
  }

  public function getAccessToken()
  {
    return json_encode($this->token);
  }

  public function setState($state)
  {
    $this->state = $state;
  }

  public function setSigningKey($signingKey)
  {
    $this->signingKey = $signingKey;
  }

  public function setSigningAlgorithm($signingAlgorithm)
  {
    $this->signingAlgorithm = $signingAlgorithm;
  }

  public function sign($request)
  {
    // add the developer key to the request before signing it
    if ($this->client->getClassConfig($this, 'developer_key')) {
      $request->getQuery()->set('key', $this->client->getClassConfig($this, 'developer_key'));
    }

    // Cannot sign the request without an OAuth access token.
    if (empty($this->token) && empty($this->signingKey)) {
      return $request;
    }

    // Check if the token is set to expire in the next 30 seconds
    // (or has already expired).
    if ($this->isAccessTokenExpired()) {
      if ($this->signingKey) {
        $this->refreshTokenWithAssertion();
      } else {
        $this->client->getLogger()->debug('OAuth2 access token expired');
        if (! array_key_exists('refresh_token', $this->token)) {
          $error = "The OAuth 2.0 access token has expired,"
                  ." and a refresh token is not available. Refresh tokens"
                  ." are not returned for responses that were auto-approved.";

          $this->client->getLogger()->error($error);
          throw new Google_Auth_Exception($error);
        }
        $this->refreshToken($this->token['refresh_token']);
      }
    }

    $this->client->getLogger()->debug('OAuth2 authentication');

    // Add the OAuth2 header to the request
    $request->setHeader('Authorization', 'Bearer ' . $this->token['access_token']);

    return $request;
  }

  public function refreshToken($refreshToken)
  {
    $this->client->getLogger()->info('OAuth2 access token refresh');
    $auth = $this->createAuthClient();
    $auth->setRefreshToken($refreshToken);

    $creds = $auth->fetchAuthToken($this->http);

    return $this->handleAuthTokenResponse($creds);
  }

  /**
   * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
   * token, if a token isn't provided.
   * @throws Google_Auth_Exception
   * @param string|null $token The token (access token or a refresh token) that should be revoked.
   * @return boolean Returns True if the revocation was successful, otherwise False.
   */
  public function revokeToken($token = null)
  {
    if (!$token) {
      if (!$this->token) {
        // Not initialized, no token to actually revoke
        return false;
      } elseif (array_key_exists('refresh_token', $this->token)) {
        $token = $this->token['refresh_token'];
      } else {
        $token = $this->token['access_token'];
      }
    }

    $request = $this->http->createRequest('POST', self::OAUTH2_REVOKE_URI);
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
  public function retrieveCertsFromLocation($url)
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

    $request = $this->http->createRequest('GET', $url);
    $response = $this->http->send($request);

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
    return $this->retrieveCertsFromLocation(
        $this->client->getClassConfig($this, 'federated_signon_certs_url')
    );
  }

  /**
   * Verifies an id token and returns the authenticated apiLoginTicket.
   * Throws an exception if the id token is not valid.
   * The audience parameter can be used to control which id tokens are
   * accepted.  By default, the id token must have been issued to this OAuth2 client.
   *
   * @param $id_token
   * @param $audience
   * @return array the token payload, if successful
   * @throws Google_Auth_Exception
   */
  public function verifyIdToken($id_token = null, $audience = null)
  {
    if (is_null($id_token)) {
      if (isset($this->token['id_token'])) {
        $id_token = $this->token['id_token'];
      } else {
        throw new LogicException('id_token cannot be null');
      }
    }

    if (is_null($audience)) {
      $audience = $this->client->getClassConfig($this, 'client_id');
    }

    $auth = $this->createAuthClient();
    $auth->setIdToken($id_token);
    $auth->setAudience($audience);

    // Check signature
    $certs = $this->getFederatedSignonCerts();
    foreach ($certs as $keyName => $pem) {
      try {
        $key = openssl_x509_read($pem);
        $payload = $auth->verifyIdToken($key, array('RS256'));
      } catch (\DomainException $e) {
        // try next cert
        $this->client->getLogger()->notice('ID token validation failed: '.$e->getMessage());
      }
      openssl_x509_free($key);
      if (!empty($payload)) {
        return (array) $payload;
      }
    }

    throw new Google_Auth_Exception("Invalid token signature: $id_token");
  }

  /**
   * Fetches a fresh access token with a given assertion token.
   * @param Google_Auth_AssertionCredentials $assertionCredentials optional.
   * @return void
   */
  public function refreshTokenWithAssertion()
  {
    if (is_null($this->signingKey)) {
      throw new LogicException('Cannot refresh token with assertion without signing key');
    }

    $this->client->getLogger()->info(
        'OAuth2 access token refresh with Signed JWT assertion grants.'
    );

    $auth = $this->createAuthClient();
    $auth->setGrantType(OAuth2::JWT_URN);
    $auth->setAudience(self::OAUTH2_TOKEN_URI);
    $auth->setScope($this->client->getScopes());

    $creds = $auth->fetchAuthToken($this->http);

    return $this->handleAuthTokenResponse($creds);
  }

  /**
   * Add a parameter to the auth params if not empty string.
   */
  private function maybeAddParam($params, $name)
  {
    $param = $this->client->getClassConfig($this, $name);
    if ($param != '') {
      $params[$name] = $param;
    }
    return $params;
  }

  /**
   * create a default google auth object
   */
  private function createAuthClient()
  {
    $auth = new OAuth2(
        array(
          'clientId' => $this->client->getClassConfig($this, 'client_id'),
          'clientSecret' => $this->client->getClassConfig($this, 'client_secret'),
          'authorizationUri' => self::OAUTH2_AUTH_URL,
          'tokenCredentialUri' => self::OAUTH2_TOKEN_URI,
          'redirectUri' => $this->client->getClassConfig($this, 'redirect_uri'),
          'issuer' => $this->client->getClassConfig($this, 'client_id'),
          'signingKey' => $this->signingKey,
          'signingAlgorithm' => $this->signingAlgorithm,
        )
    );

    return $auth;
  }

  /**
   * Returns if the access_token is expired.
   * @return bool Returns True if the access_token is expired.
   */
  public function isAccessTokenExpired()
  {
    if (!$this->token || !isset($this->token['created'])) {
      return true;
    }

    // If the token is set to expire in the next 30 seconds.
    $expired = ($this->token['created']
        + ($this->token['expires_in'] - 30)) < time();

    return $expired;
  }

  /**
   * handle the http response, set the access token, and raise an error if
   * applicable
   */
  private function handleAuthTokenResponse($creds)
  {
    if ($creds != null && isset($creds['access_token'])) {
      $this->setAccessToken(json_encode($creds));
      $this->token['created'] = time();
      return $this->getAccessToken();
    } elseif ($creds != null && isset($creds['error'])) {
      $errorText = $creds['error'];
      if (isset($creds['error_description'])) {
        $errorText .= ": " . $creds['error_description'];
      }
    }
    throw new Google_Auth_Exception(
        sprintf(
            "Error fetching OAuth2 access token, message: '%s'",
            $errorText
        )
    );
  }
}
