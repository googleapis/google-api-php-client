<?php
declare(strict_types=1);

namespace Google;

use GuzzleHttp\ClientInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

interface GoogleClientInterface
{
    public function __construct(array $config = []);
    public function getLibraryVersion();
    public function authenticate($code);
    public function fetchAccessTokenWithAuthCode($code, $codeVerifier = null);
    public function refreshTokenWithAssertion();
    public function fetchAccessTokenWithAssertion(ClientInterface $authHttp = null);
    public function refreshToken($refreshToken);
    public function fetchAccessTokenWithRefreshToken($refreshToken = null);
    public function createAuthUrl($scope = null, array $queryParams = []);
    public function authorize(ClientInterface $http = null);
    public function useApplicationDefaultCredentials($useAppCreds = true);
    public function isUsingApplicationDefaultCredentials();
    public function setAccessToken($token);
    public function getAccessToken();
    public function getRefreshToken();
    public function isAccessTokenExpired();
    public function getAuth();
    public function setAuth($auth);
    public function setClientId($clientId);
    public function getClientId();
    public function setClientSecret($clientSecret);
    public function getClientSecret();
    public function setRedirectUri($redirectUri);
    public function getRedirectUri();
    public function setState($state);
    public function setAccessType($accessType);
    public function setApprovalPrompt($approvalPrompt);
    public function setLoginHint($loginHint);
    public function setApplicationName($applicationName);
    public function setRequestVisibleActions($requestVisibleActions);
    public function setDeveloperKey($developerKey);
    public function setHostedDomain($hd);
    public function setPrompt($prompt);
    public function setOpenidRealm($realm);
    public function setIncludeGrantedScopes($include);
    public function setTokenCallback(callable $tokenCallback);
    public function revokeToken($token = null);
    public function verifyIdToken($idToken = null);
    public function setScopes($scope_or_scopes);
    public function addScope($scope_or_scopes);
    public function getScopes();
    public function prepareScopes();
    public function execute(RequestInterface $request, $expectedClass = null);
    public function setUseBatch($useBatch);
    public function isAppEngine();
    public function setConfig($name, $value);
    public function getConfig($name, $default = null);
    public function setAuthConfigFile($file);
    public function setAuthConfig($config);
    public function setSubject($subject);
    public function setDefer($defer);
    public function shouldDefer();
    public function getOAuth2Service();
    public function setCache(CacheItemPoolInterface $cache);
    public function getCache();
    public function setCacheConfig(array $cacheConfig);
    public function setLogger(LoggerInterface $logger);
    public function getLogger();
    public function setHttpClient(ClientInterface $http);
    public function getHttpClient();
    public function setApiFormatV2($value);
    public function getUniverseDomain();
}
