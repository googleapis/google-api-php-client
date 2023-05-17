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

namespace Google;

use BadMethodCallException;
use DomainException;
use Google\AccessToken\Revoke;
use Google\AccessToken\Verify;
use Google\Auth\ApplicationDefaultCredentials;
use Google\Auth\Cache\MemoryCacheItemPool;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Auth\CredentialsLoader;
use Google\Auth\FetchAuthTokenCache;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Google\Auth\OAuth2;
use Google\AuthHandler\AuthHandlerFactory;
use Google\Http\REST;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Ring\Client\StreamHandler;
use InvalidArgumentException;
use LogicException;
use Monolog\Handler\StreamHandler as MonologStreamHandler;
use Monolog\Handler\SyslogHandler as MonologSyslogHandler;
use Monolog\Logger;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use UnexpectedValueException;

/**
 * The Google API Client
 * https://github.com/google/google-api-php-client
 */
class Client
{
    const LIBVER = "2.12.6";
    const USER_AGENT_SUFFIX = "google-api-php-client/";
    const OAUTH2_REVOKE_URI = 'https://oauth2.googleapis.com/revoke';
    const OAUTH2_TOKEN_URI = 'https://oauth2.googleapis.com/token';
    const OAUTH2_AUTH_URL = 'https://accounts.google.com/o/oauth2/v2/auth';
    const API_BASE_PATH = 'https://www.googleapis.com';

    /**
     * @var ?OAuth2 $auth
     */
    private $auth;

    /**
     * @var ClientInterface $http
     */
    private $http;

    /**
     * @var ?CacheItemPoolInterface $cache
     */
    private $cache;

    /**
     * @var array access token
     */
    private $token;

    /**
     * @var array $config
     */
    private $config;

    /**
     * @var ?LoggerInterface $logger
     */
    private $logger;

    /**
     * @var ?CredentialsLoader $credentials
     */
    private $credentials;

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
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'application_name' => '',

            // Don't change these unless you're working against a special development
            // or testing environment.
            'base_path' => self::API_BASE_PATH,

            // https://developers.google.com/console
            'client_id' => '',
            'client_secret' => '',

            // Can be a path to JSON credentials or an array representing those
            // credentials (@see Google\Client::setAuthConfig), or an instance of
            // Google\Auth\CredentialsLoader.
            'credentials' => null,
            // @see Google\Client::setScopes
            'scopes' => null,
            // Sets X-Goog-User-Project, which specifies a user project to bill
            // for access charges associated with the request
            'quota_project' => null,

            'redirect_uri' => null,
            'state' => null,

            // Simple API access key, also from the API console. Ensure you get
            // a Server key, and not a Browser key.
            'developer_key' => '',

            // For use with Google Cloud Platform
            // fetch the ApplicationDefaultCredentials, if applicable
            // @see https://developers.google.com/identity/protocols/application-default-credentials
            'use_application_default_credentials' => false,
            'signing_key' => null,
            'signing_algorithm' => null,
            'subject' => null,

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
            // @see Google\Task\Runner
            'retry' => [],
            'retry_map' => null,

            // Cache class implementing Psr\Cache\CacheItemPoolInterface.
            // Defaults to Google\Auth\Cache\MemoryCacheItemPool.
            'cache' => null,
            // cache config for downstream auth caching
            'cache_config' => [],

            // function to be called when an access token is fetched
            // follows the signature function ($cacheKey, $accessToken)
            'token_callback' => null,

            // Service class used in Google\Client::verifyIdToken.
            // Explicitly pass this in to avoid setting JWT::$leeway
            'jwt' => null,

            // Setting api_format_v2 will return more detailed error messages
            // from certain APIs.
            'api_format_v2' => false
        ], $config);

        if (!is_null($this->config['credentials'])) {
            if ($this->config['credentials'] instanceof CredentialsLoader) {
                $this->credentials = $this->config['credentials'];
            } else {
                $this->setAuthConfig($this->config['credentials']);
            }
            unset($this->config['credentials']);
        }

        if (!is_null($this->config['scopes'])) {
            $this->setScopes($this->config['scopes']);
            unset($this->config['scopes']);
        }

        // Set a default token callback to update the in-memory access token
        if (is_null($this->config['token_callback'])) {
            $this->config['token_callback'] = function ($cacheKey, $newAccessToken) {
                $this->setAccessToken(
                    [
                    'access_token' => $newAccessToken,
                    'expires_in' => 3600, // Google default
                    'created' => time(),
                    ]
                );
            };
        }

        if (!is_null($this->config['cache'])) {
            $this->setCache($this->config['cache']);
            unset($this->config['cache']);
        }
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
     * @param string $code string code from accounts.google.com
     * @return array access token
     * @deprecated
     */
    public function authenticate($code)
    {
        return $this->fetchAccessTokenWithAuthCode($code);
    }

    /**
     * Attempt to exchange a code for an valid authentication token.
     * Helper wrapped around the OAuth 2.0 implementation.
     *
     * @param string $code code from accounts.google.com
     * @param string $codeVerifier the code verifier used for PKCE (if applicable)
     * @return array access token
     */
    public function fetchAccessTokenWithAuthCode($code, $codeVerifier = null)
    {
        if (strlen($code) == 0) {
            throw new InvalidArgumentException("Invalid code");
        }

        $auth = $this->getOAuth2Service();
        $auth->setCode($code);
        $auth->setRedirectUri($this->getRedirectUri());
        if ($codeVerifier) {
            $auth->setCodeVerifier($codeVerifier);
        }

        $httpHandler = HttpHandlerFactory::build($this->getHttpClient());
        $creds = $auth->fetchAuthToken($httpHandler);
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
     * @deprecated
     */
    public function refreshTokenWithAssertion()
    {
        return $this->fetchAccessTokenWithAssertion();
    }

    /**
     * Fetches a fresh access token with a given assertion token.
     * @param ClientInterface $authHttp optional.
     * @return array access token
     */
    public function fetchAccessTokenWithAssertion(ClientInterface $authHttp = null)
    {
        if (!$this->isUsingApplicationDefaultCredentials()) {
            throw new DomainException(
                'set the JSON service account credentials using'
                . ' Google\Client::setAuthConfig or set the path to your JSON file'
                . ' with the "GOOGLE_APPLICATION_CREDENTIALS" environment variable'
                . ' and call Google\Client::useApplicationDefaultCredentials to'
                . ' refresh a token with assertion.'
            );
        }

        $this->getLogger()->log(
            'info',
            'OAuth2 access token refresh with Signed JWT assertion grants.'
        );

        $credentials = $this->createApplicationDefaultCredentials();

        $httpHandler = HttpHandlerFactory::build($authHttp);
        $creds = $credentials->fetchAuthToken($httpHandler);
        if ($creds && isset($creds['access_token'])) {
            $creds['created'] = time();
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
        if (null === $refreshToken) {
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

        $httpHandler = HttpHandlerFactory::build($this->getHttpClient());
        $creds = $auth->fetchAuthToken($httpHandler);
        if ($creds && isset($creds['access_token'])) {
            $creds['created'] = time();
            if (!isset($creds['refresh_token'])) {
                $creds['refresh_token'] = $refreshToken;
            }
            $this->setAccessToken($creds);
        }

        return $creds;
    }

    /**
     * Create a URL to obtain user authorization.
     * The authorization endpoint allows the user to first
     * authenticate, and then grant/deny the access request.
     * @param string|array $scope The scope is expressed as an array or list of space-delimited strings.
     * @param array $queryParams Querystring params to add to the authorization URL.
     * @return string
     */
    public function createAuthUrl($scope = null, array $queryParams = [])
    {
        if (empty($scope)) {
            $scope = $this->prepareScopes();
        }
        if (is_array($scope)) {
            $scope = implode(' ', $scope);
        }

        // only accept one of prompt or approval_prompt
        $approvalPrompt = $this->config['prompt']
            ? null
            : $this->config['approval_prompt'];

        // include_granted_scopes should be string "true", string "false", or null
        $includeGrantedScopes = $this->config['include_granted_scopes'] === null
            ? null
            : var_export($this->config['include_granted_scopes'], true);

        $params = array_filter([
            'access_type' => $this->config['access_type'],
            'approval_prompt' => $approvalPrompt,
            'hd' => $this->config['hd'],
            'include_granted_scopes' => $includeGrantedScopes,
            'login_hint' => $this->config['login_hint'],
            'openid.realm' => $this->config['openid.realm'],
            'prompt' => $this->config['prompt'],
            'redirect_uri' => $this->config['redirect_uri'],
            'response_type' => 'code',
            'scope' => $scope,
            'state' => $this->config['state'],
        ]) + $queryParams;

        // If the list of scopes contains plus.login, add request_visible_actions
        // to auth URL.
        $rva = $this->config['request_visible_actions'];
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
     * @param ClientInterface $http the http client object.
     * @return ClientInterface the http client object
     */
    public function authorize(ClientInterface $http = null)
    {
        $http = $http ?: $this->getHttpClient();
        $authHandler = $this->getAuthHandler();

        // These conditionals represent the decision tree for authentication
        //   1.  Check if a Google\Auth\CredentialsLoader instance has been supplied via the "credentials" option
        //   2.  Check for Application Default Credentials
        //   3a. Check for an Access Token
        //   3b. If access token exists but is expired, try to refresh it
        //   4.  Check for API Key
        if ($this->credentials) {
            return $authHandler->attachCredentials(
                $http,
                $this->credentials,
                $this->config['token_callback']
            );
        }

        if ($this->isUsingApplicationDefaultCredentials()) {
            $credentials = $this->createApplicationDefaultCredentials();
            return $authHandler->attachCredentialsCache(
                $http,
                $credentials,
                $this->config['token_callback']
            );
        }

        if ($token = $this->getAccessToken()) {
            $scopes = $this->prepareScopes();
            // add refresh subscriber to request a new token
            if (isset($token['refresh_token']) && $this->isAccessTokenExpired()) {
                $credentials = $this->createUserRefreshCredentials(
                    $scopes,
                    $token['refresh_token']
                );
                return $authHandler->attachCredentials(
                    $http,
                    $credentials,
                    $this->config['token_callback']
                );
            }

            return $authHandler->attachToken($http, $token, (array) $scopes);
        }

        if ($key = $this->config['developer_key']) {
            return $authHandler->attachKey($http, $key);
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
        $this->config['use_application_default_credentials'] = $useAppCreds;
    }

    /**
     * To prevent useApplicationDefaultCredentials from inappropriately being
     * called in a conditional
     *
     * @see https://developers.google.com/identity/protocols/application-default-credentials
     */
    public function isUsingApplicationDefaultCredentials()
    {
        return $this->config['use_application_default_credentials'];
    }

    /**
     * Set the access token used for requests.
     *
     * Note that at the time requests are sent, tokens are cached. A token will be
     * cached for each combination of service and authentication scopes. If a
     * cache pool is not provided, creating a new instance of the client will
     * allow modification of access tokens. If a persistent cache pool is
     * provided, in order to change the access token, you must clear the cached
     * token by calling `$client->getCache()->clear()`. (Use caution in this case,
     * as calling `clear()` will remove all cache items, including any items not
     * related to Google API PHP Client.)
     *
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
     * @return string|null
     */
    public function getRefreshToken()
    {
        if (isset($this->token['refresh_token'])) {
            return $this->token['refresh_token'];
        }

        return null;
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
        if (!isset($this->token['expires_in'])) {
            // if the token does not have an "expires_in", then it's considered expired
            return true;
        }

        // If the token is set to expire in the next 30 seconds.
        return ($created + ($this->token['expires_in'] - 30)) < time();
    }

    /**
     * @deprecated See UPGRADING.md for more information
     */
    public function getAuth()
    {
        throw new BadMethodCallException(
            'This function no longer exists. See UPGRADING.md for more information'
        );
    }

    /**
     * @deprecated See UPGRADING.md for more information
     */
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
        $this->config['client_id'] = $clientId;
    }

    public function getClientId()
    {
        return $this->config['client_id'];
    }

    /**
     * Set the OAuth 2.0 Client Secret.
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->config['client_secret'] = $clientSecret;
    }

    public function getClientSecret()
    {
        return $this->config['client_secret'];
    }

    /**
     * Set the OAuth 2.0 Redirect URI.
     * @param string $redirectUri
     */
    public function setRedirectUri($redirectUri)
    {
        $this->config['redirect_uri'] = $redirectUri;
    }

    public function getRedirectUri()
    {
        return $this->config['redirect_uri'];
    }

    /**
     * Set OAuth 2.0 "state" parameter to achieve per-request customization.
     * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-22#section-3.1.2.2
     * @param string $state
     */
    public function setState($state)
    {
        $this->config['state'] = $state;
    }

    /**
     * @param string $accessType Possible values for access_type include:
     *  {@code "offline"} to request offline access from the user.
     *  {@code "online"} to request online access from the user.
     */
    public function setAccessType($accessType)
    {
        $this->config['access_type'] = $accessType;
    }

    /**
     * @param string $approvalPrompt Possible values for approval_prompt include:
     *  {@code "force"} to force the approval UI to appear.
     *  {@code "auto"} to request auto-approval when possible. (This is the default value)
     */
    public function setApprovalPrompt($approvalPrompt)
    {
        $this->config['approval_prompt'] = $approvalPrompt;
    }

    /**
     * Set the login hint, email address or sub id.
     * @param string $loginHint
     */
    public function setLoginHint($loginHint)
    {
        $this->config['login_hint'] = $loginHint;
    }

    /**
     * Set the application name, this is included in the User-Agent HTTP header.
     * @param string $applicationName
     */
    public function setApplicationName($applicationName)
    {
        $this->config['application_name'] = $applicationName;
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
            $requestVisibleActions = implode(" ", $requestVisibleActions);
        }
        $this->config['request_visible_actions'] = $requestVisibleActions;
    }

    /**
     * Set the developer key to use, these are obtained through the API Console.
     * @see http://code.google.com/apis/console-help/#generatingdevkeys
     * @param string $developerKey
     */
    public function setDeveloperKey($developerKey)
    {
        $this->config['developer_key'] = $developerKey;
    }

    /**
     * Set the hd (hosted domain) parameter streamlines the login process for
     * Google Apps hosted accounts. By including the domain of the user, you
     * restrict sign-in to accounts at that domain.
     * @param string $hd the domain to use.
     */
    public function setHostedDomain($hd)
    {
        $this->config['hd'] = $hd;
    }

    /**
     * Set the prompt hint. Valid values are none, consent and select_account.
     * If no value is specified and the user has not previously authorized
     * access, then the user is shown a consent screen.
     * @param string $prompt
     *  {@code "none"} Do not display any authentication or consent screens. Must not be specified with other values.
     *  {@code "consent"} Prompt the user for consent.
     *  {@code "select_account"} Prompt the user to select an account.
     */
    public function setPrompt($prompt)
    {
        $this->config['prompt'] = $prompt;
    }

    /**
     * openid.realm is a parameter from the OpenID 2.0 protocol, not from OAuth
     * 2.0. It is used in OpenID 2.0 requests to signify the URL-space for which
     * an authentication request is valid.
     * @param string $realm the URL-space to use.
     */
    public function setOpenidRealm($realm)
    {
        $this->config['openid.realm'] = $realm;
    }

    /**
     * If this is provided with the value true, and the authorization request is
     * granted, the authorization will include any previous authorizations
     * granted to this user/application combination for other scopes.
     * @param bool $include the URL-space to use.
     */
    public function setIncludeGrantedScopes($include)
    {
        $this->config['include_granted_scopes'] = $include;
    }

    /**
     * sets function to be called when an access token is fetched
     * @param callable $tokenCallback - function ($cacheKey, $accessToken)
     */
    public function setTokenCallback(callable $tokenCallback)
    {
        $this->config['token_callback'] = $tokenCallback;
    }

    /**
     * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
     * token, if a token isn't provided.
     *
     * @param string|array|null $token The token (access token or a refresh token) that should be revoked.
     * @return boolean Returns True if the revocation was successful, otherwise False.
     */
    public function revokeToken($token = null)
    {
        $tokenRevoker = new Revoke($this->getHttpClient());

        return $tokenRevoker->revokeToken($token ?: $this->getAccessToken());
    }

    /**
     * Verify an id_token. This method will verify the current id_token, if one
     * isn't provided.
     *
     * @throws LogicException If no token was provided and no token was set using `setAccessToken`.
     * @throws UnexpectedValueException If the token is not a valid JWT.
     * @param string|null $idToken The token (id_token) that should be verified.
     * @return array|false Returns the token payload as an array if the verification was
     * successful, false otherwise.
     */
    public function verifyIdToken($idToken = null)
    {
        $tokenVerifier = new Verify(
            $this->getHttpClient(),
            $this->getCache(),
            $this->config['jwt']
        );

        if (null === $idToken) {
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
     * @param string|array $scope_or_scopes, ie:
     *    array(
     *        'https://www.googleapis.com/auth/plus.login',
     *        'https://www.googleapis.com/auth/moderator'
     *    );
     */
    public function setScopes($scope_or_scopes)
    {
        $this->requestedScopes = [];
        $this->addScope($scope_or_scopes);
    }

    /**
     * This functions adds a scope to be requested as part of the OAuth2.0 flow.
     * Will append any scopes not previously requested to the scope parameter.
     * A single string will be treated as a scope to request. An array of strings
     * will each be appended.
     * @param string|string[] $scope_or_scopes e.g. "profile"
     */
    public function addScope($scope_or_scopes)
    {
        if (is_string($scope_or_scopes) && !in_array($scope_or_scopes, $this->requestedScopes)) {
            $this->requestedScopes[] = $scope_or_scopes;
        } elseif (is_array($scope_or_scopes)) {
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
     * @return string|null
     * @visible For Testing
     */
    public function prepareScopes()
    {
        if (empty($this->requestedScopes)) {
            return null;
        }

        return implode(' ', $this->requestedScopes);
    }

    /**
     * Helper method to execute deferred HTTP requests.
     *
     * @template T
     * @param RequestInterface $request
     * @param class-string<T>|false|null $expectedClass
     * @throws \Google\Exception
     * @return mixed|T|ResponseInterface
     */
    public function execute(RequestInterface $request, $expectedClass = null)
    {
        $request = $request
            ->withHeader(
                'User-Agent',
                sprintf(
                    '%s %s%s',
                    $this->config['application_name'],
                    self::USER_AGENT_SUFFIX,
                    $this->getLibraryVersion()
                )
            )
            ->withHeader(
                'x-goog-api-client',
                sprintf(
                    'gl-php/%s gdcl/%s',
                    phpversion(),
                    $this->getLibraryVersion()
                )
            );

        if ($this->config['api_format_v2']) {
            $request = $request->withHeader(
                'X-GOOG-API-FORMAT-VERSION',
                '2'
            );
        }

        // call the authorize method
        // this is where most of the grunt work is done
        $http = $this->authorize();

        return REST::execute(
            $http,
            $request,
            $expectedClass,
            $this->config['retry'],
            $this->config['retry_map']
        );
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
        $this->config[$name] = $value;
    }

    public function getConfig($name, $default = null)
    {
        return isset($this->config[$name]) ? $this->config[$name] : $default;
    }

    /**
     * For backwards compatibility
     * alias for setAuthConfig
     *
     * @param string $file the configuration file
     * @throws \Google\Exception
     * @deprecated
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
     * @param string|array $config the configuration json
     * @throws \Google\Exception
     */
    public function setAuthConfig($config)
    {
        if (is_string($config)) {
            if (!file_exists($config)) {
                throw new InvalidArgumentException(sprintf('file "%s" does not exist', $config));
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

            // set the information from the config
            $this->setClientId($config['client_id']);
            $this->config['client_email'] = $config['client_email'];
            $this->config['signing_key'] = $config['private_key'];
            $this->config['signing_algorithm'] = 'HS256';
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
     * @param string $subject an email address account to impersonate
     */
    public function setSubject($subject)
    {
        $this->config['subject'] = $subject;
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
     * @return OAuth2 implementation
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
        $auth = new OAuth2([
            'clientId'          => $this->getClientId(),
            'clientSecret'      => $this->getClientSecret(),
            'authorizationUri'   => self::OAUTH2_AUTH_URL,
            'tokenCredentialUri' => self::OAUTH2_TOKEN_URI,
            'redirectUri'       => $this->getRedirectUri(),
            'issuer'            => $this->config['client_id'],
            'signingKey'        => $this->config['signing_key'],
            'signingAlgorithm'  => $this->config['signing_algorithm'],
        ]);

        return $auth;
    }

    /**
     * Set the Cache object
     * @param CacheItemPoolInterface $cache
     */
    public function setCache(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @return CacheItemPoolInterface
     */
    public function getCache()
    {
        if (!$this->cache) {
            $this->cache = $this->createDefaultCache();
        }

        return $this->cache;
    }

    /**
     * @param array $cacheConfig
     */
    public function setCacheConfig(array $cacheConfig)
    {
        $this->config['cache_config'] = $cacheConfig;
    }

    /**
     * Set the Logger object
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface
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
        if ($this->isAppEngine()) {
            $handler = new MonologSyslogHandler('app', LOG_USER, Logger::NOTICE);
        } else {
            $handler = new MonologStreamHandler('php://stderr', Logger::NOTICE);
        }
        $logger->pushHandler($handler);

        return $logger;
    }

    protected function createDefaultCache()
    {
        return new MemoryCacheItemPool();
    }

    /**
     * Set the Http Client object
     * @param ClientInterface $http
     */
    public function setHttpClient(ClientInterface $http)
    {
        $this->http = $http;
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient()
    {
        if (null === $this->http) {
            $this->http = $this->createDefaultHttpClient();
        }

        return $this->http;
    }

    /**
     * Set the API format version.
     *
     * `true` will use V2, which may return more useful error messages.
     *
     * @param bool $value
     */
    public function setApiFormatV2($value)
    {
        $this->config['api_format_v2'] = (bool) $value;
    }

    protected function createDefaultHttpClient()
    {
        $guzzleVersion = null;
        if (defined('\GuzzleHttp\ClientInterface::MAJOR_VERSION')) {
            $guzzleVersion = ClientInterface::MAJOR_VERSION;
        } elseif (defined('\GuzzleHttp\ClientInterface::VERSION')) {
            $guzzleVersion = (int)substr(ClientInterface::VERSION, 0, 1);
        }

        if (5 === $guzzleVersion) {
            $options = [
                'base_url' => $this->config['base_path'],
                'defaults' => ['exceptions' => false],
            ];
            if ($this->isAppEngine()) {
                if (class_exists(StreamHandler::class)) {
                    // set StreamHandler on AppEngine by default
                    $options['handler'] = new StreamHandler();
                    $options['defaults']['verify'] = '/etc/ca-certificates.crt';
                }
            }
        } elseif (6 === $guzzleVersion || 7 === $guzzleVersion) {
            // guzzle 6 or 7
            $options = [
                'base_uri' => $this->config['base_path'],
                'http_errors' => false,
            ];
        } else {
            throw new LogicException('Could not find supported version of Guzzle.');
        }

        return new GuzzleClient($options);
    }

    /**
     * @return FetchAuthTokenCache
     */
    private function createApplicationDefaultCredentials()
    {
        $scopes = $this->prepareScopes();
        $sub = $this->config['subject'];
        $signingKey = $this->config['signing_key'];

        // create credentials using values supplied in setAuthConfig
        if ($signingKey) {
            $serviceAccountCredentials = [
                'client_id' => $this->config['client_id'],
                'client_email' => $this->config['client_email'],
                'private_key' => $signingKey,
                'type' => 'service_account',
                'quota_project_id' => $this->config['quota_project'],
            ];
            $credentials = CredentialsLoader::makeCredentials(
                $scopes,
                $serviceAccountCredentials
            );
        } else {
            // When $sub is provided, we cannot pass cache classes to ::getCredentials
            // because FetchAuthTokenCache::setSub does not exist.
            // The result is when $sub is provided, calls to ::onGce are not cached.
            $credentials = ApplicationDefaultCredentials::getCredentials(
                $scopes,
                null,
                $sub ? null : $this->config['cache_config'],
                $sub ? null : $this->getCache(),
                $this->config['quota_project']
            );
        }

        // for service account domain-wide authority (impersonating a user)
        // @see https://developers.google.com/identity/protocols/OAuth2ServiceAccount
        if ($sub) {
            if (!$credentials instanceof ServiceAccountCredentials) {
                throw new DomainException('domain-wide authority requires service account credentials');
            }

            $credentials->setSub($sub);
        }

        // If we are not using FetchAuthTokenCache yet, create it now
        if (!$credentials instanceof FetchAuthTokenCache) {
            $credentials = new FetchAuthTokenCache(
                $credentials,
                $this->config['cache_config'],
                $this->getCache()
            );
        }
        return $credentials;
    }

    protected function getAuthHandler()
    {
        // Be very careful using the cache, as the underlying auth library's cache
        // implementation is naive, and the cache keys do not account for user
        // sessions.
        //
        // @see https://github.com/google/google-api-php-client/issues/821
        return AuthHandlerFactory::build(
            $this->getCache(),
            $this->config['cache_config']
        );
    }

    private function createUserRefreshCredentials($scope, $refreshToken)
    {
        $creds = array_filter([
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'refresh_token' => $refreshToken,
        ]);

        return new UserRefreshCredentials($scope, $creds);
    }
}
