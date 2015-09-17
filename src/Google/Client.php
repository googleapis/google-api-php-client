<?php
/*
 * Copyright 2010 Google Inc.
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

use Google\Auth\ApplicationDefaultCredentials;
use Google\Auth\CacheInterface;
use Google\Auth\OAuth2;
use Google\Auth\ScopedAccessToken;
use Google\Auth\Simple;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Collection;
use GuzzleHttp\Post\PostBodyInterface;
use GuzzleHttp\Stream\Stream;
use Psr\Log\LoggerInterface;
use Monolog\Logger;

/**
 * The Google API Client
 * http://code.google.com/p/google-api-php-client/
 */
class Google_Client
{
  const LIBVER = "2.0.0-alpha";
  const USER_AGENT_SUFFIX = "google-api-php-client/";
  const OAUTH2_REVOKE_URI = 'https://accounts.google.com/o/oauth2/revoke';
  const OAUTH2_TOKEN_URI = 'https://www.googleapis.com/oauth2/v3/token';
  const OAUTH2_AUTH_URL = 'https://accounts.google.com/o/oauth2/auth';

  /**
   * @var Google\Auth\OAuth2 $auth
   */
  private $auth;

  /**
   * @var GuzzleHttp\ClientInterface $http
   */
  private $http;

  /**
   * @var Google\Auth\CacheInterface $cache
   */
  private $cache;

  /**
   * @var array access token
   */
  private $token;

  /**
   * @var Google_Config $config
   */
  private $config;

  /**
   * @var Google_Logger_Abstract $logger
   */
  private $logger;

  /**
   * @var boolean $deferExecution
   */
  private $deferExecution = false;

  /** @var array $scopes */
  // Scopes requested by the client
  protected $requestedScopes = [];

  public static $retryConfig = [
    // Delays are specified in seconds
    'initial_delay' => 1,
    'max_delay' => 60,
    // Base number for exponential backoff
    'factor' => 2,
    // A random number between -jitter and jitter will be added to the
    // factor on each iteration to allow for better distribution of
    // retries.
    'jitter' => .5,
    // Maximum number of retries allowed
    'retries' => 0
  ];

  // Used to track authenticated state, can't discover services after doing authenticate()
  private $authenticated = false;

  /**
   * Construct the Google Client.
   *
   * @param $config Google_Config or string for the ini file to load
   */
  public function __construct($config = array())
  {
    $this->config = Collection::fromConfig($config, [
      'application_name' => '',

      // Don't change these unless you're working against a special development
      // or testing environment.
      'base_path' => 'https://www.googleapis.com',

      // https://developers.google.com/console
      'client_id' => '',
      'client_secret' => '',
      'redirect_uri' => null,
      'state' => null,

      // Simple API access key, also from the API console. Ensure you get
      // a Server key, and not a Browser key.
      'developer_key' => '',

      // Other OAuth2 parameters.
      'hd' => '',
      'prompt' => '',
      'openid.realm' => '',
      'include_granted_scopes' => null,
      'login_hint' => '',
      'request_visible_actions' => '',
      'access_type' => 'online',
      'approval_prompt' => 'auto',

      // misc configuration
      'enable_gzip_for_uploads' => false,
    ]);
  }

  /**
   * Get a string containing the version of the library.
   *
   * @return string
   */
  public function getLibraryVersion()
  {
    return self::LIBVER;
  }

  /**
   * Attempt to exchange a code for an valid authentication token.
   * If $crossClient is set to true, the request body will not include
   * the request_uri argument
   * Helper wrapped around the OAuth 2.0 implementation.
   *
   * @param $code string code from accounts.google.com
   * @param $crossClient boolean, whether this is a cross-client authentication
   * @return string token
   */
  public function authenticate($code, $crossClient = false)
  {
    if (strlen($code) == 0) {
      throw new InvalidArgumentException("Invalid code");
    }

    $auth = $this->getOAuth2Service();
    $auth->setCode($code);
    $auth->setRedirectUri($this->getConfig('redirect_uri'));

    $creds = $auth->fetchAuthToken($this->getHttpClient());
    if ($creds && isset($creds['access_token'])) {
      $this->setAccessToken($creds);
    }

    return $creds;
  }

  /**
   * Create a URL to obtain user authorization.
   * The authorization endpoint allows the user to first
   * authenticate, and then grant/deny the access request.
   * @param string|array $scope The scope is expressed as an array or list of space-delimited strings.
   * @return string
   */
  public function createAuthUrl($scope = null)
  {
    if (empty($scope)) {
      $scope = $this->prepareScopes();
    }
    if (is_array($scope)) {
      $scope = implode(' ', $scope);
    }

    $params = array_filter([
      'access_type' => $this->config->get('access_type'),
      'approval_prompt' => $this->config->get('prompt') ? null : $this->config->get('approval_prompt'),
      'hd' => $this->config->get('hosted_domain'),
      'include_granted_scopes' =>
        $this->config->get('include_granted_scopes') === null
          ? null
          : var_export($this->config->get('include_granted_scopes'), true),
      'login_hint' => $this->config->get('login_hint'),
      'openid.realm' => $this->config->get('openid.realm'),
      'prompt' => $this->config->get('prompt'),
      'response_type' => 'code',
      'scope' => $scope,
      'state' => $this->config->get('state'),
    ]);

    // If the list of scopes contains plus.login, add request_visible_actions
    // to auth URL.
    $rva = $this->config->get('request_visible_actions');
    if (strlen($rva) > 0 && false !== strpos($scope, 'plus.login')) {
        $params['request_visible_actions'] = $rva;
    }

    $auth = $this->getOAuth2Service();

    return (string) $auth->buildFullAuthorizationUri($params);
  }

  /**
   * Fetches a fresh OAuth 2.0 access token with the given refresh token.
   * @param string $refreshToken
   */
  public function refreshToken($refreshToken)
  {
    $this->getLogger()->info('OAuth2 access token refresh');
    $auth = $this->getOAuth2Service();
    $auth->setRefreshToken($refreshToken);

    $creds = $auth->fetchAuthToken($this->getHttpClient());
    if ($creds && isset($creds['access_token'])) {
      $this->setAccessToken($creds);
    }

    return $creds;
  }

  /**
   * Fetches a fresh access token with a given assertion token.
   * @param Google_Auth_AssertionCredentials $assertionCredentials optional.
   * @return void
   */
  public function refreshTokenWithAssertion()
  {
    if (is_null($this->config->get('signing_key'))) {
      throw new LogicException('config parameter "signing_key" must be set to'
        . ' refresh a token with assertion');
    }

    $this->getLogger()->log(
      'info',
      'OAuth2 access token refresh with Signed JWT assertion grants.'
    );

    $auth = $this->getOAuth2Service();
    $auth->setGrantType(OAuth2::JWT_URN);
    $auth->setAudience(self::OAUTH2_TOKEN_URI);
    $auth->setScope($this->getScopes());

    if ($creds && isset($creds['access_token'])) {
      $this->setAccessToken($creds);
    }

    return $creds;
  }

  public function attachAuthListener(ClientInterface $http)
  {
    if ($key = $this->getConfig('developer_key')) {
      // if a developer key is set, authorize using that
      $simple = new Simple(['key' => $key]);
      $http->setDefaultOption('auth', 'simple');
      $http->getEmitter()->attach($simple);
      $this->getLogger()->log('info', 'Authenticated with API key');
    } else {
      $scopes = $this->prepareScopes();
      if ($this->token) {
        // if a token has been set manually, authorize using it instead
        if ($this->isAccessTokenExpired() && isset($this->token['refresh_token'])) {
          // try to get another access token with the refresh token
          $this->refreshToken($this->token['refresh_token']);
        }
        $accessToken = $this->token['access_token'];
        $scoped = new ScopedAccessToken(
          function($scopes) use ($accessToken) {
            return $accessToken;
          },
          $scopes,
          []
        );
        $http->setDefaultOption('auth', 'scoped');
        $http->getEmitter()->attach($scoped);
        $this->getLogger()->log('info', 'Authenticated with access token');
      } else {
        try {
          // try to fetch credentials using ApplicationDefaultCredentials, if applicable
          $fetcher = ApplicationDefaultCredentials::getFetcher(
              $scopes,
              $this->getHttpClient(),
              array(),
              $this->cache
          );
          $http->setDefaultOption('auth', 'google_auth');
          $http->getEmitter()->attach($fetcher);
          $this->getLogger()->log('info', 'Authenticated with Application Default Credentials');
        } catch (DomainException $e) {
          // no auth
          $this->getLogger()->log('info', $e->getMessage());
        }
      }
    }
  }

  /**
   * @param string|array $token
   * @throws InvalidArgumentException
   */
  public function setAccessToken($token)
  {
    if (is_string($token)) {
      $token = json_decode($token, true);
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
   * Returns if the access_token is expired.
   * @return bool Returns True if the access_token is expired.
   */
  public function isAccessTokenExpired()
  {
    if (!$this->token) {
      return true;
    }

    $created = 0;
    if (isset($this->token['created'])) {
      $created = $this->token['created'];
    } elseif (isset($this->token['id_token'])) {
      $payload = $this->verifyIdToken();
      $created = $payload ? $payload->iat : 0;
    }

    // If the token is set to expire in the next 30 seconds.
    $expired = ($created
        + ($this->token['expires_in'] - 30)) < time();

    return $expired;
  }

  /**
   * Set the OAuth 2.0 Client ID.
   * @param string $clientId
   */
  public function setClientId($clientId)
  {
    $this->config->set('client_id', $clientId);
  }

  public function getClientId()
  {
    return $this->getConfig('client_id');
  }

  /**
   * Set the OAuth 2.0 Client Secret.
   * @param string $clientSecret
   */
  public function setClientSecret($clientSecret)
  {
    $this->config->set('client_secret', $clientSecret);
  }

  public function getClientSecret()
  {
    return $this->config->get('client_secret');
  }

  /**
   * Set the OAuth 2.0 Redirect URI.
   * @param string $redirectUri
   */
  public function setRedirectUri($redirectUri)
  {
    $this->config->set('redirect_uri', $redirectUri);
  }

  public function getRedirectUri()
  {
    return $this->config->get('redirect_uri');
  }

  /**
   * Set the developer key to use, these are obtained through the API Console.
   * @see http://code.google.com/apis/console-help/#generatingdevkeys
   * @param string $developerKey
   */
  public function setDeveloperKey($developerKey)
  {
    $this->config->set('developer_key', $developerKey);
  }

  /**
   * Set OAuth 2.0 "state" parameter to achieve per-request customization.
   * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-22#section-3.1.2.2
   * @param string $state
   */
  public function setState($state)
  {
    $this->config->set('state',  $state);
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
    $token = new Google_AccessToken(
      $token ?: $this->getAccessToken(),
      $this->getHttpClient()
    );

    return $token->revokeToken();
  }

  /**
   * Verify an id_token. This method will verify the current id_token, if one
   * isn't provided.
   * @throws Google_Auth_Exception
   * @param string|null $token The token (id_token) that should be verified.
   * @return Returns the token payload as an array if the verification was
   * successful.
   */
  public function verifyIdToken($token = null)
  {
    $token = new Google_AccessToken(
      $token ?: $this->getAccessToken(),
      $this->getHttpClient()
    );

    return $token->verifyIdToken();
  }

  /**
   * Set the scopes to be requested. Must be called before createAuthUrl().
   * Will remove any previously configured scopes.
   * @param array $scopes, ie: array('https://www.googleapis.com/auth/plus.login',
   * 'https://www.googleapis.com/auth/moderator')
   */
  public function setScopes($scopes)
  {
    $this->requestedScopes = array();
    $this->addScope($scopes);
  }

  /**
   * This functions adds a scope to be requested as part of the OAuth2.0 flow.
   * Will append any scopes not previously requested to the scope parameter.
   * A single string will be treated as a scope to request. An array of strings
   * will each be appended.
   * @param $scope_or_scopes string|array e.g. "profile"
   */
  public function addScope($scope_or_scopes)
  {
    if (is_string($scope_or_scopes) && !in_array($scope_or_scopes, $this->requestedScopes)) {
      $this->requestedScopes[] = $scope_or_scopes;
    } else if (is_array($scope_or_scopes)) {
      foreach ($scope_or_scopes as $scope) {
        $this->addScope($scope);
      }
    }
  }

  /**
   * Returns the list of scopes requested by the client
   * @return array the list of scopes
   *
   */
  public function getScopes()
  {
     return $this->requestedScopes;
  }

  /**
   * @throws Google_Auth_Exception
   * @return array
   * @visible For Testing
   */
  public function prepareScopes()
  {
    if (empty($this->requestedScopes)) {
      return null;
    }
    $scopes = implode(' ', $this->requestedScopes);
    return $scopes;
  }

  /**
   * Helper method to execute deferred HTTP requests.
   *
   * @param $request GuzzleHttp\Message\RequestInterface|Google_Http_Batch
   * @throws Google_Exception
   * @return object of the type of the expected class or array.
   */
  public function execute($request, $expectedClass = null)
  {
    $request->setHeader(
        'User-Agent',
        $this->getConfig('application_name')
        . " " . self::USER_AGENT_SUFFIX
        . $this->getLibraryVersion()
    );

    $http = $this->getHttpClient();

    $result = Google_Http_REST::execute($http, $request, static::$retryConfig);
    $expectedClass = $expectedClass ?: $request->getHeader('X-Php-Expected-Class');
    if ($expectedClass) {
      $result = new $expectedClass($result);
    }

    return $result;
  }

  /**
   * Declare whether batch calls should be used. This may increase throughput
   * by making multiple requests in one connection.
   *
   * @param boolean $useBatch True if the batch support should
   * be enabled. Defaults to False.
   */
  public function setUseBatch($useBatch)
  {
    // This is actually an alias for setDefer.
    $this->setDefer($useBatch);
  }

  /**
   * Are we running in Google AppEngine?
   * return bool
   */
  public function isAppEngine()
  {
    return (isset($_SERVER['SERVER_SOFTWARE']) &&
        strpos($_SERVER['SERVER_SOFTWARE'], 'Google App Engine') !== false);
  }

  public function setConfig($name, $value)
  {
    $this->config->set($name, $value);
  }

  public function getConfig($name, $default = null)
  {
    return $this->config->get($name) ?: $default;
  }

  /**
   * Set the auth config from new or deprecated JSON config.
   * This structure should match the file downloaded from
   * the "Download JSON" button on in the Google Developer
   * Console.
   * @param string|array|stdClass $json the configuration json
   * @throws Google_Exception
   */
  public function setAuthConfig($json)
  {
    if (is_string($json)) {
      $data = json_decode($json);
    } elseif (is_array($json)) {
      $data = (object) $json;
    } elseif (!$json instanceof stdClass) {
      throw new InvalidArgumentException('invalid auth config type');
    }

    $key = isset($data->installed) ? 'installed' : 'web';
    if (isset($data->$key)) {
      // old-style
      $this->setClientId($data->$key->client_id);
      $this->setClientSecret($data->$key->client_secret);
      if (isset($data->$key->redirect_uris)) {
        $this->setRedirectUri($data->$key->redirect_uris[0]);
      }
    } else {
      // new-style
      $this->setClientId($data->client_id);
      $this->setClientSecret($data->client_secret);
      if (isset($data->redirect_uris)) {
        $this->setRedirectUri($data->redirect_uris[0]);
      }
    }
  }

  /**
   * Declare whether making API calls should make the call immediately, or
   * return a request which can be called with ->execute();
   *
   * @param boolean $defer True if calls should not be executed right away.
   */
  public function setDefer($defer)
  {
    $this->deferExecution = $defer;
  }

  /**
   * Whether or not to return raw requests
   * @return boolean
   */
  public function shouldDefer()
  {
    return $this->deferExecution;
  }

  /**
   * @return Google\Auth\OAuth2 implementation
   */
  public function getOAuth2Service()
  {
    if (!isset($this->auth)) {
      $this->auth = $this->createOAuth2Service();
    }

    return $this->auth;
  }

  /**
   * create a default google auth object
   */
  public function createOAuth2Service()
  {
    $auth = new OAuth2([
      'clientId'          => $this->getClientId(),
      'clientSecret'      => $this->getClientSecret(),
      'authorizationUri'   => self::OAUTH2_AUTH_URL,
      'tokenCredentialUri' => self::OAUTH2_TOKEN_URI,
      'redirectUri'       => $this->getRedirectUri(),
      'issuer'            => $this->config->get('client_id'),
      'signingKey'        => $this->config->get('signing_key'),
      'signingAlgorithm'  => $this->config->get('signing_algorithm'),
    ]);

    return $auth;
  }

  /**
   * Set the Cache object
   * @param Google\Auth\CacheInterface $cache
   */
  public function setCache(CacheInterface $cache)
  {
    $this->cache = $cache;
  }

  /**
   * @return Google\Auth\CacheInterface Cache implementation
   */
  public function getCache()
  {
    if (!isset($this->cache)) {
      $this->cache = $this->createDefaultCache();
    }

    return $this->cache;
  }

  protected function createDefaultCache()
  {
    if ($this->isAppEngine()) {
      $cache = new Google_Cache_Memcache();
    } else {
      $cacheDir = sys_get_temp_dir() . '/google-api-php-client';
      $cache = new Google_Cache_File($cacheDir);
    }

    return $cache;
  }

  /**
   * Set the Logger object
   * @param Psr\Log\LoggerInterface $logger
   */
  public function setLogger(LoggerInterface $logger)
  {
    $this->logger = $logger;
  }

  /**
   * @return Psr\Log\LoggerInterface implementation
   */
  public function getLogger()
  {
    if (!isset($this->logger)) {
      $this->logger = $this->createDefaultLogger();
    }

    return $this->logger;
  }

  protected function createDefaultLogger()
  {
    $logger = new Logger('google-api-php-client');

    return $logger;
  }

  /**
   * Set the Http Client object
   * @param GuzzleHttp\ClientInterface $http
   */
  public function setHttpClient(ClientInterface $http)
  {
    $this->http = $http;
  }

  /**
   * @return GuzzleHttp\ClientInterface implementation
   */
  public function getHttpClient()
  {
    if (is_null($this->http)) {
      $this->http = $this->createDefaultHttpClient();
    }

    return $this->http;
  }

  protected function createDefaultHttpClient()
  {
    $options = [
      'base_url' => $this->config->get('base_path'),
      'defaults' => ['auth' => 'google_auth'],
    ];

    return new Client($options);
  }
}
