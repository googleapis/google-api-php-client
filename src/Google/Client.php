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
use Google\Auth\AuthTokenFetcher;
use Google\Auth\CacheInterface;
use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;
use Google\Auth\ScopedAccessToken;
use Google\Auth\ServiceAccountCredentials;
use Google\Auth\Simple;
use Google\Auth\UserRefreshCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Collection;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * The Google API Client
 * http://code.google.com/p/google-api-php-client/
 */
class Google_Client
{
  const LIBVER = "2.0.0-alpha";
  const USER_AGENT_SUFFIX = "google-api-php-client/";
  const OAUTH2_REVOKE_URI = 'https://accounts.google.com/o/oauth2/revoke';
  const OAUTH2_TOKEN_URI = 'https://www.googleapis.com/oauth2/v4/token';
  const OAUTH2_AUTH_URL = 'https://accounts.google.com/o/oauth2/auth';
  const API_BASE_PATH = 'https://www.googleapis.com';

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

  /**
   * Construct the Google Client.
   *
   * @param $config Google_Config or string for the ini file to load
   */
  public function __construct($config = array())
  {
    $this->config = Collection::fromConfig(
        $config,
        [
          'application_name' => '',

          // Don't change these unless you're working against a special development
          // or testing environment.
          'base_path' => self::API_BASE_PATH,

          // https://developers.google.com/console
          'client_id' => '',
          'client_secret' => '',
          'redirect_uri' => null,
          'state' => null,

          // Simple API access key, also from the API console. Ensure you get
          // a Server key, and not a Browser key.
          'developer_key' => '',

          // For use with Google Cloud Platform
          // fetch the ApplicationDefaultCredentials, if applicable
          // @see https://developers.google.com/identity/protocols/application-default-credentials
          'use_application_default_credentials' => false,

          // Other OAuth2 parameters.
          'hd' => '',
          'prompt' => '',
          'openid.realm' => '',
          'include_granted_scopes' => null,
          'login_hint' => '',
          'request_visible_actions' => '',
          'access_type' => 'online',
          'approval_prompt' => 'auto',

          // Task Runner retry configuration
          // @see Google_Task_Runner
          'retry' => array(),
        ]
    );
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
   * For backwards compatibility
   * alias for fetchAccessTokenWithAuthCode
   *
   * @param $code string code from accounts.google.com
   * @return array access token
   */
  public function authenticate($code)
  {
    return $this->fetchAccessTokenWithAuthCode($code);
  }

  /**
   * Attempt to exchange a code for an valid authentication token.
   * Helper wrapped around the OAuth 2.0 implementation.
   *
   * @param $code string code from accounts.google.com
   * @return array access token
   */
  public function fetchAccessTokenWithAuthCode($code)
  {
    if (strlen($code) == 0) {
      throw new InvalidArgumentException("Invalid code");
    }

    $auth = $this->getOAuth2Service();
    $auth->setCode($code);
    $auth->setRedirectUri($this->getRedirectUri());

    $creds = $auth->fetchAuthToken($this->getHttpClient());
    if ($creds && isset($creds['access_token'])) {
      $creds['created'] = time();
      $this->setAccessToken($creds);
    }

    return $creds;
  }

  /**
   * For backwards compatibility
   * alias for fetchAccessTokenWithAssertion
   *
   * @return array access token
   */
  public function refreshTokenWithAssertion()
  {
    return $this->fetchAccessTokenWithAssertion();
  }

  /**
   * Fetches a fresh access token with a given assertion token.
   * @param $assertionCredentials optional.
   * @return void
   */
  public function fetchAccessTokenWithAssertion()
  {
    if (is_null($this->config->get('signing_key'))) {
      throw new LogicException(
          'config parameter "signing_key" must be set to'
          . ' refresh a token with assertion'
      );
    }

    $this->getLogger()->log(
        'info',
        'OAuth2 access token refresh with Signed JWT assertion grants.'
    );

    $auth = $this->getOAuth2Service();
    $auth->setGrantType(OAuth2::JWT_URN);
    $auth->setAudience(self::OAUTH2_TOKEN_URI);
    $auth->setScope($this->getScopes());

    $creds = $auth->fetchAuthToken($this->getHttpClient());
    if ($creds && isset($creds['access_token'])) {
      $this->setAccessToken($creds);
    }

    return $creds;
  }

  /**
   * For backwards compatibility
   * alias for fetchAccessTokenWithRefreshToken
   *
   * @param string $refreshToken
   * @return array access token
   */
  public function refreshToken($refreshToken)
  {
    return $this->fetchAccessTokenWithRefreshToken($refreshToken);
  }

  /**
   * Fetches a fresh OAuth 2.0 access token with the given refresh token.
   * @param string $refreshToken
   * @return array access token
   */
  public function fetchAccessTokenWithRefreshToken($refreshToken = null)
  {
    if (is_null($refreshToken)) {
      if (!isset($this->token['refresh_token'])) {
        throw new LogicException(
            'refresh token must be passed in or set as part of setAccessToken'
        );
      }
      $refreshToken = $this->token['refresh_token'];
    }
    $this->getLogger()->info('OAuth2 access token refresh');
    $auth = $this->getOAuth2Service();
    $auth->setRefreshToken($refreshToken);

    $creds = $auth->fetchAuthToken($this->getHttpClient());
    if ($creds && isset($creds['access_token'])) {
      $creds['created'] = time();
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

    // only accept one of prompt or approval_prompt
    $approvalPrompt = $this->config->get('prompt')
      ? null
      : $this->config->get('approval_prompt');

    // include_granted_scopes should be string "true", string "false", or null
    $includeGrantedScopes = $this->config->get('include_granted_scopes') === null
      ? null
      : var_export($this->config->get('include_granted_scopes'), true);

    $params = array_filter(
        [
          'access_type' => $this->config->get('access_type'),
          'approval_prompt' => $approvalPrompt,
          'hd' => $this->config->get('hd'),
          'include_granted_scopes' => $includeGrantedScopes,
          'login_hint' => $this->config->get('login_hint'),
          'openid.realm' => $this->config->get('openid.realm'),
          'prompt' => $this->config->get('prompt'),
          'response_type' => 'code',
          'scope' => $scope,
          'state' => $this->config->get('state'),
        ]
    );

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
   * Adds auth listeners to the HTTP client based on the credentials
   * set in the Google API Client object
   *
   * @param GuzzleHttp\ClientInterface $http the http client object.
   * @param GuzzleHttp\ClientInterface $authHttp an http client for authentication.
   * @return void
   */
  public function authorize(ClientInterface $http, ClientInterface $authHttp = null)
  {
    $subscriber = null;
    $authIdentifier = null;

    // if we end up needing to make an HTTP request to retrieve credentials, we
    // can use our existing one, but we need to throw exceptions so the error
    // bubbles up.
    $authHttp = $authHttp ?: $this->createDefaultAuthHttpClient($http);

    // These conditionals represent the decision tree for authentication
    //   1.  Check for Application Default Credentials
    //   2.  Check for API Key
    //   3a. Check for an Access Token
    //   3b. If access token exists but is expired, try to refresh it
    if ($this->config->get('use_application_default_credentials')) {
      $scopes = $this->prepareScopes();
      if ($sub = $this->config->get('subject')) {
        // for service account domain-wide authority (impersonating a user)
        // @see https://developers.google.com/identity/protocols/OAuth2ServiceAccount
        if (!$creds = CredentialsLoader::fromEnv($scopes)) {
          $creds = CredentialsLoader::fromWellKnownFile($scopes);
        }
        if (!$creds instanceof ServiceAccountCredentials) {
          throw new DomainException('domain-wide authority requires service account credentials');
        }
        $creds->setSub($sub);
        $subscriber = new AuthTokenFetcher($creds, array(), $this->cache, $authHttp);
      } else {
        $subscriber = ApplicationDefaultCredentials::getFetcher(
            $scopes,
            $authHttp,
            array(),
            $this->cache
        );
      }
      $authIdentifier = 'google_auth';
    } elseif ($key = $this->config->get('developer_key')) {
      // if a developer key is set, authorize using that
      $subscriber = new Simple(['key' => $key]);
      $authIdentifier = 'simple';
    } elseif ($token = $this->getAccessToken()) {
      $scopes = $this->prepareScopes();
      // add refresh subscriber to request a new token
      if ($this->isAccessTokenExpired() && isset($token['refresh_token'])) {
        $subscriber = $this->createUserRefreshCredentials(
            $scopes,
            $token['refresh_token'],
            $authHttp
        );
        $authIdentifier = 'google_auth';
      } else {
        $subscriber = new ScopedAccessToken(
            function ($scopes) use ($token) {
              return $token['access_token'];
            },
            (array) $scopes,
            []
        );
        $authIdentifier = 'scoped';
      }
    }

    if ($subscriber) {
      $http->setDefaultOption('auth', $authIdentifier);
      $http->getEmitter()->attach($subscriber);
      $this->getLogger()->log(
          'info',
          sprintf('Added listener for auth type "%s"', $authIdentifier)
      );
    }

    return $http;
  }

  /**
   * Set the configuration to use application default credentials for
   * authentication
   *
   * @see https://developers.google.com/identity/protocols/application-default-credentials
   * @param boolean $useAppCreds
   */
  public function useApplicationDefaultCredentials($useAppCreds = true)
  {
    $this->config->set('use_application_default_credentials', $useAppCreds);
  }

  /**
   * To prevent useApplicationDefaultCredentials from inappropriately being
   * called in a conditional
   *
   * @see https://developers.google.com/identity/protocols/application-default-credentials
   */
  public function isUsingApplicationDefaultCredentials()
  {
    return $this->config->get('use_application_default_credentials');
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
        $token = array(
          'access_token' => $token,
        );
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

  public function getRefreshToken()
  {
    if (isset($this->token['refresh_token'])) {
      return $this->token['refresh_token'];
    }
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
      // check the ID token for "iat"
      // signature verification is not required here, as we are just
      // using this for convenience to save a round trip request
      // to the Google API server
      $idToken = $this->token['id_token'];
      if (substr_count($idToken, '.') == 2) {
        $parts = explode('.', $idToken);
        $payload = json_decode(base64_decode($parts[1]), true);
        if ($payload && isset($payload['iat'])) {
          $created = $payload['iat'];
        }
      }
    }

    // If the token is set to expire in the next 30 seconds.
    $expired = ($created
      + ($this->token['expires_in'] - 30)) < time();

    return $expired;
  }

  public function getAuth()
  {
    throw new BadMethodCallException(
        'This function no longer exists. See UPGRADING.md for more information'
    );
  }

  public function setAuth($auth)
  {
    throw new BadMethodCallException(
        'This function no longer exists. See UPGRADING.md for more information'
    );
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
    return $this->config->get('client_id');
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
   * Set OAuth 2.0 "state" parameter to achieve per-request customization.
   * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-22#section-3.1.2.2
   * @param string $state
   */
  public function setState($state)
  {
    $this->config->set('state', $state);
  }

  /**
   * @param string $accessType Possible values for access_type include:
   *  {@code "offline"} to request offline access from the user.
   *  {@code "online"} to request online access from the user.
   */
  public function setAccessType($accessType)
  {
    $this->config->set('access_type', $accessType);
  }

  /**
   * @param string $approvalPrompt Possible values for approval_prompt include:
   *  {@code "force"} to force the approval UI to appear. (This is the default value)
   *  {@code "auto"} to request auto-approval when possible.
   */
  public function setApprovalPrompt($approvalPrompt)
  {
    $this->config->set('approval_prompt', $approvalPrompt);
  }

  /**
   * Set the login hint, email address or sub id.
   * @param string $loginHint
   */
  public function setLoginHint($loginHint)
  {
    $this->config->set('login_hint', $loginHint);
  }

  /**
   * Set the application name, this is included in the User-Agent HTTP header.
   * @param string $applicationName
   */
  public function setApplicationName($applicationName)
  {
    $this->config->set('application_name', $applicationName);
  }

  /**
   * If 'plus.login' is included in the list of requested scopes, you can use
   * this method to define types of app activities that your app will write.
   * You can find a list of available types here:
   * @link https://developers.google.com/+/api/moment-types
   *
   * @param array $requestVisibleActions Array of app activity types
   */
  public function setRequestVisibleActions($requestVisibleActions)
  {
    if (is_array($requestVisibleActions)) {
      $requestVisibleActions = join(" ", $requestVisibleActions);
    }
    $this->config->set('request_visible_actions', $requestVisibleActions);
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
   * Set the hd (hosted domain) parameter streamlines the login process for
   * Google Apps hosted accounts. By including the domain of the user, you
   * restrict sign-in to accounts at that domain.
   * @param $hd string - the domain to use.
   */
  public function setHostedDomain($hd)
  {
    $this->config->set('hd', $hd);
  }
  /**
   * Set the prompt hint. Valid values are none, consent and select_account.
   * If no value is specified and the user has not previously authorized
   * access, then the user is shown a consent screen.
   * @param $prompt string
   */
  public function setPrompt($prompt)
  {
    $this->config->set('prompt', $prompt);
  }
  /**
   * openid.realm is a parameter from the OpenID 2.0 protocol, not from OAuth
   * 2.0. It is used in OpenID 2.0 requests to signify the URL-space for which
   * an authentication request is valid.
   * @param $realm string - the URL-space to use.
   */
  public function setOpenidRealm($realm)
  {
    $this->config->set('openid.realm', $realm);
  }
  /**
   * If this is provided with the value true, and the authorization request is
   * granted, the authorization will include any previous authorizations
   * granted to this user/application combination for other scopes.
   * @param $include boolean - the URL-space to use.
   */
  public function setIncludeGrantedScopes($include)
  {
    $this->config->set('include_granted_scopes', $include);
  }

  /**
   * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
   * token, if a token isn't provided.
   *
   * @param string|null $token The token (access token or a refresh token) that should be revoked.
   * @return boolean Returns True if the revocation was successful, otherwise False.
   */
  public function revokeToken($token = null)
  {
    $tokenRevoker = new Google_AccessToken_Revoke(
        $this->getHttpClient()
    );

    return $tokenRevoker->revokeToken($token ?: $this->getAccessToken());
  }

  /**
   * Verify an id_token. This method will verify the current id_token, if one
   * isn't provided.
   *
   * @throws Google_Exception
   * @param string|null $idToken The token (id_token) that should be verified.
   * @return array|false Returns the token payload as an array if the verification was
   * successful, false otherwise.
   */
  public function verifyIdToken($idToken = null)
  {
    $tokenVerifier = new Google_AccessToken_Verify(
        $this->getHttpClient()
    );

    if (is_null($idToken)) {
      $token = $this->getAccessToken();
      if (!isset($token['id_token'])) {
        throw new LogicException(
            'id_token must be passed in or set as part of setAccessToken'
        );
      }
      $idToken = $token['id_token'];
    }

    return $tokenVerifier->verifyIdToken(
        $idToken,
        $this->getClientId()
    );
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
        $this->config->get('application_name')
        . " " . self::USER_AGENT_SUFFIX
        . $this->getLibraryVersion()
    );

    $http = $this->getHttpClient();

    $result = Google_Http_REST::execute($http, $request, $this->config['retry']);
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
   * For backwards compatibility
   * alias for setAuthConfig
   *
   * @param string $file the configuration file
   * @throws Google_Exception
   */
  public function setAuthConfigFile($file)
  {
    $this->setAuthConfig($file);
  }

  /**
   * Set the auth config from new or deprecated JSON config.
   * This structure should match the file downloaded from
   * the "Download JSON" button on in the Google Developer
   * Console.
   * @param string|array $json the configuration json
   * @throws Google_Exception
   */
  public function setAuthConfig($config)
  {
    if (is_string($config)) {
      if (!file_exists($config)) {
        throw new InvalidArgumentException('file does not exist');
      }

      $json = file_get_contents($config);

      if (!$config = json_decode($json, true)) {
        throw new LogicException('invalid json for auth config');
      }
    }

    $key = isset($config['installed']) ? 'installed' : 'web';
    if (isset($config['type']) && $config['type'] == 'service_account') {
      // application default credentials
      $this->useApplicationDefaultCredentials();

      // overwrite APPLICATION_DEFAULT_CREDENTIALS with this config
      $tmpFile = tempnam(sys_get_temp_dir(), 'appcreds');
      file_put_contents($tmpFile, json_encode($config));
      putenv('GOOGLE_APPLICATION_CREDENTIALS='.$tmpFile);
    } elseif (isset($config[$key])) {
      // old-style
      $this->setClientId($config[$key]['client_id']);
      $this->setClientSecret($config[$key]['client_secret']);
      if (isset($config[$key]['redirect_uris'])) {
        $this->setRedirectUri($config[$key]['redirect_uris'][0]);
      }
    } else {
      // new-style
      $this->setClientId($config['client_id']);
      $this->setClientSecret($config['client_secret']);
      if (isset($config['redirect_uris'])) {
        $this->setRedirectUri($config['redirect_uris'][0]);
      }
    }
  }

  /**
   * Use when the service account has been delegated domain wide access.
   *
   * @param string subject an email address account to impersonate
   */
  public function setSubject($subject)
  {
    $this->config->set('subject', $subject);
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
  protected function createOAuth2Service()
  {
    $auth = new OAuth2(
        [
          'clientId'          => $this->getClientId(),
          'clientSecret'      => $this->getClientSecret(),
          'authorizationUri'   => self::OAUTH2_AUTH_URL,
          'tokenCredentialUri' => self::OAUTH2_TOKEN_URI,
          'redirectUri'       => $this->getRedirectUri(),
          'issuer'            => $this->config->get('client_id'),
          'signingKey'        => $this->config->get('signing_key'),
          'signingAlgorithm'  => $this->config->get('signing_algorithm'),
        ]
    );

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
    $logger->pushHandler(new StreamHandler('php://stderr', Logger::NOTICE));

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
      'defaults' => ['exceptions' => false]
    ];

    return new Client($options);
  }

  protected function createDefaultAuthHttpClient($http = null)
  {
    $options = [
      'base_url' => $this->config->get('base_path'),
      'defaults' => [
        'exceptions' => true,
        'verify' => $http ? $http->getDefaultOption('verify') : true,
        'proxy' => $http ? $http->getDefaultOption('proxy') : null,
      ]
    ];

    return new Client($options);
  }

  private function createUserRefreshCredentials(
      $scope,
      $refreshToken,
      ClientInterface $http = null
  ) {
    $creds = array_filter(
        array(
          'client_id' => $this->getClientId(),
          'client_secret' => $this->getClientSecret(),
          'refresh_token' => $refreshToken,
        )
    );

    return new AuthTokenFetcher(
        new UserRefreshCredentials($scope, $creds),
        [],
        $this->getCache(),
        $http
    );
  }
}
