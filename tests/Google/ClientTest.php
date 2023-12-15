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

namespace Google\Tests;

use Google\Client;
use Google\Service\Drive;
use Google\AuthHandler\AuthHandlerFactory;
use Google\Auth\FetchAuthTokenCache;
use Google\Auth\GCECache;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\ClientException;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use ReflectionClass;
use ReflectionMethod;
use InvalidArgumentException;
use Exception;

class ClientTest extends BaseTest
{
    public function testClientConstructor()
    {
        $this->assertInstanceOf(Client::class, $this->getClient());
    }

    public function testSignAppKey()
    {
        $client = $this->getClient();
        $client->setDeveloperKey('devKey');

        $http = new GuzzleClient();
        $client->authorize($http);

        $this->checkAuthHandler($http, 'Simple');
    }

    private function checkAuthHandler($http, $className)
    {
        $stack = $http->getConfig('handler');
        $class = new ReflectionClass(get_class($stack));
        $property = $class->getProperty('stack');
        $property->setAccessible(true);
        $middlewares = $property->getValue($stack);
        $middleware = array_pop($middlewares);

        if (null === $className) {
            // only the default middlewares have been added
            $this->assertCount(3, $middlewares);
        } else {
            $authClass = sprintf('Google\Auth\Middleware\%sMiddleware', $className);
            $this->assertInstanceOf($authClass, $middleware[0]);
        }
    }

    private function checkCredentials($http, $fetcherClass, $sub = null)
    {
        $stack = $http->getConfig('handler');
        $class = new ReflectionClass(get_class($stack));
        $property = $class->getProperty('stack');
        $property->setAccessible(true);
        $middlewares = $property->getValue($stack); // Works
        $middleware = array_pop($middlewares);
        $auth = $middleware[0];

        $class = new ReflectionClass(get_class($auth));
        $property = $class->getProperty('fetcher');
        $property->setAccessible(true);
        $cacheFetcher = $property->getValue($auth);
        $this->assertInstanceOf(FetchAuthTokenCache::class, $cacheFetcher);

        $class = new ReflectionClass(get_class($cacheFetcher));
        $property = $class->getProperty('fetcher');
        $property->setAccessible(true);
        $fetcher = $property->getValue($cacheFetcher);
        $this->assertInstanceOf($fetcherClass, $fetcher);

        if ($sub) {
            // access the protected $auth property
            $class = new ReflectionClass(get_class($fetcher));
            $property = $class->getProperty('auth');
            $property->setAccessible(true);
            $auth = $property->getValue($fetcher);

            $this->assertEquals($sub, $auth->getSub());
        }
    }

    public function testSignAccessToken()
    {
        $client = $this->getClient();

        $http = new GuzzleClient();
        $client->setAccessToken([
            'access_token' => 'test_token',
            'expires_in'   => 3600,
            'created'      => time(),
        ]);
        $client->setScopes('test_scope');
        $client->authorize($http);

        $this->checkAuthHandler($http, 'ScopedAccessToken');
    }

    public function testCreateAuthUrl()
    {
        $client = $this->getClient();

        $client->setClientId('clientId1');
        $client->setClientSecret('clientSecret1');
        $client->setRedirectUri('http://localhost');
        $client->setDeveloperKey('devKey');
        $client->setState('xyz');
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        $client->setRequestVisibleActions('http://foo');
        $client->setLoginHint('bob@example.org');

        $authUrl = $client->createAuthUrl("http://googleapis.com/scope/foo");
        $expected = "https://accounts.google.com/o/oauth2/v2/auth"
            . "?response_type=code"
            . "&access_type=offline"
            . "&client_id=clientId1"
            . "&redirect_uri=http%3A%2F%2Flocalhost"
            . "&state=xyz"
            . "&scope=http%3A%2F%2Fgoogleapis.com%2Fscope%2Ffoo"
            . "&approval_prompt=force"
            . "&login_hint=bob%40example.org";

        $this->assertEquals($expected, $authUrl);

        // Again with a blank login hint (should remove all traces from authUrl)
        $client->setLoginHint('');
        $client->setHostedDomain('example.com');
        $client->setOpenIdRealm('example.com');
        $client->setPrompt('select_account');
        $client->setIncludeGrantedScopes(true);
        $authUrl = $client->createAuthUrl("http://googleapis.com/scope/foo");
        $expected = "https://accounts.google.com/o/oauth2/v2/auth"
            . "?response_type=code"
            . "&access_type=offline"
            . "&client_id=clientId1"
            . "&redirect_uri=http%3A%2F%2Flocalhost"
            . "&state=xyz"
            . "&scope=http%3A%2F%2Fgoogleapis.com%2Fscope%2Ffoo"
            . "&hd=example.com"
            . "&include_granted_scopes=true"
            . "&openid.realm=example.com"
            . "&prompt=select_account";

        $this->assertEquals($expected, $authUrl);
    }

    public function testPrepareNoScopes()
    {
        $client = new Client();

        $scopes = $client->prepareScopes();
        $this->assertNull($scopes);
    }

    public function testNoAuthIsNull()
    {
        $client = new Client();

        $this->assertNull($client->getAccessToken());
    }

    public function testPrepareService()
    {
        $client = new Client();
        $client->setScopes(["scope1", "scope2"]);
        $scopes = $client->prepareScopes();
        $this->assertEquals("scope1 scope2", $scopes);

        $client->setScopes(["", "scope2"]);
        $scopes = $client->prepareScopes();
        $this->assertEquals(" scope2", $scopes);

        $client->setScopes("scope2");
        $client->addScope("scope3");
        $client->addScope(["scope4", "scope5"]);
        $scopes = $client->prepareScopes();
        $this->assertEquals("scope2 scope3 scope4 scope5", $scopes);

        $client->setClientId('test1');
        $client->setRedirectUri('http://localhost/');
        $client->setState('xyz');
        $client->setScopes(["http://test.com", "scope2"]);
        $scopes = $client->prepareScopes();
        $this->assertEquals("http://test.com scope2", $scopes);
        $this->assertEquals(
            ''
            . 'https://accounts.google.com/o/oauth2/v2/auth'
            . '?response_type=code'
            . '&access_type=online'
            . '&client_id=test1'
            . '&redirect_uri=http%3A%2F%2Flocalhost%2F'
            . '&state=xyz'
            . '&scope=http%3A%2F%2Ftest.com%20scope2'
            . '&approval_prompt=auto',
            $client->createAuthUrl()
        );

        $stream = $this->prophesize('GuzzleHttp\Psr7\Stream');
        $stream->__toString()->willReturn('');

        $response = $this->prophesize('Psr\Http\Message\ResponseInterface');
        $response->getBody()
            ->shouldBeCalledTimes(1)
            ->willReturn($stream->reveal());

        $response->getStatusCode()->willReturn(200);

        $http = $this->prophesize('GuzzleHttp\ClientInterface');

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response->reveal());

        $client->setHttpClient($http->reveal());
        $dr_service = new Drive($client);
        $this->assertInstanceOf('Google\Model', $dr_service->files->listFiles());
    }

    public function testDefaultLogger()
    {
        $client = new Client();
        $logger = $client->getLogger();
        $this->assertInstanceOf('Monolog\Logger', $logger);
        $handler = $logger->popHandler();
        $this->assertInstanceOf('Monolog\Handler\StreamHandler', $handler);
    }

    public function testDefaultLoggerAppEngine()
    {
        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
        $client = new Client();
        $logger = $client->getLogger();
        $handler = $logger->popHandler();
        unset($_SERVER['SERVER_SOFTWARE']);

        $this->assertInstanceOf('Monolog\Logger', $logger);
        $this->assertInstanceOf('Monolog\Handler\SyslogHandler', $handler);
    }

    public function testSettersGetters()
    {
        $client = new Client();
        $client->setClientId("client1");
        $client->setClientSecret('client1secret');
        $client->setState('1');
        $client->setApprovalPrompt('force');
        $client->setAccessType('offline');

        $client->setRedirectUri('localhost');
        $client->setConfig('application_name', 'me');

        $cache = $this->prophesize(CacheItemPoolInterface::class);
        $client->setCache($cache->reveal());
        $this->assertInstanceOf(CacheItemPoolInterface::class, $client->getCache());

        try {
            $client->setAccessToken(null);
            $this->fail('Should have thrown an Exception.');
        } catch (InvalidArgumentException $e) {
            $this->assertEquals('invalid json token', $e->getMessage());
        }

        $token = ['access_token' => 'token'];
        $client->setAccessToken($token);
        $this->assertEquals($token, $client->getAccessToken());
    }

    public function testSetAccessTokenValidation()
    {
        $client = new Client();
        $client->setAccessToken([
            'access_token' => 'token',
            'created' => time()
        ]);
        self::assertEquals(true, $client->isAccessTokenExpired());
    }

    public function testDefaultConfigOptions()
    {
        $client = new Client();
        $this->assertArrayHasKey('http_errors', $client->getHttpClient()->getConfig());
        $this->assertArrayNotHasKey('exceptions', $client->getHttpClient()->getConfig());
        $this->assertFalse($client->getHttpClient()->getConfig()['http_errors']);
    }

    public function testJsonConfig()
    {
        // Device config
        $client = new Client();
        $device =
            '{"installed":{"auth_uri":"https://accounts.google.com/o/oauth2/v2/auth","client_secret"'.
            ':"N0aHCBT1qX1VAcF5J1pJAn6S","token_uri":"https://oauth2.googleapis.com/token",'.
            '"client_email":"","redirect_uris":["urn:ietf:wg:oauth:2.0:oob","oob"],"client_x509_cert_url"'.
            ':"","client_id":"123456789.apps.googleusercontent.com","auth_provider_x509_cert_url":'.
            '"https://www.googleapis.com/oauth2/v1/certs"}}';
        $dObj = json_decode($device, true);
        $client->setAuthConfig($dObj);
        $this->assertEquals($client->getClientId(), $dObj['installed']['client_id']);
        $this->assertEquals($client->getClientSecret(), $dObj['installed']['client_secret']);
        $this->assertEquals($client->getRedirectUri(), $dObj['installed']['redirect_uris'][0]);

        // Web config
        $client = new Client();
        $web = '{"web":{"auth_uri":"https://accounts.google.com/o/oauth2/v2/auth","client_secret"' .
            ':"lpoubuib8bj-Fmke_YhhyHGgXc","token_uri":"https://oauth2.googleapis.com/token"' .
            ',"client_email":"123456789@developer.gserviceaccount.com","client_x509_cert_url":'.
            '"https://www.googleapis.com/robot/v1/metadata/x509/123456789@developer.gserviceaccount.com"'.
            ',"client_id":"123456789.apps.googleusercontent.com","auth_provider_x509_cert_url":'.
            '"https://www.googleapis.com/oauth2/v1/certs"}}';
        $wObj = json_decode($web, true);
        $client->setAuthConfig($wObj);
        $this->assertEquals($client->getClientId(), $wObj['web']['client_id']);
        $this->assertEquals($client->getClientSecret(), $wObj['web']['client_secret']);
        $this->assertEquals($client->getRedirectUri(), '');
    }

    public function testIniConfig()
    {
        $config = parse_ini_file(__DIR__ . '/../config/test.ini');
        $client = new Client($config);

        $this->assertEquals('My Test application', $client->getConfig('application_name'));
        $this->assertEquals(
            'gjfiwnGinpena3',
            $client->getClientSecret()
        );
    }

    public function testNoAuth()
    {
        /** @var $noAuth Google_Auth_Simple */
        $client = new Client();
        $client->setDeveloperKey(null);

        // unset application credentials
        $GOOGLE_APPLICATION_CREDENTIALS = getenv('GOOGLE_APPLICATION_CREDENTIALS');
        $HOME = getenv('HOME');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=');
        putenv('HOME='.sys_get_temp_dir());
        $http = new GuzzleClient();
        $client->authorize($http);

        putenv("GOOGLE_APPLICATION_CREDENTIALS=$GOOGLE_APPLICATION_CREDENTIALS");
        putenv("HOME=$HOME");
        $this->checkAuthHandler($http, null);
    }

    public function testApplicationDefaultCredentials()
    {
        $this->checkServiceAccountCredentials();
        $credentialsFile = getenv('GOOGLE_APPLICATION_CREDENTIALS');

        $client = new Client();
        $client->setAuthConfig($credentialsFile);

        $http = new GuzzleClient();
        $client->authorize($http);

        $this->checkAuthHandler($http, 'AuthToken');
        $this->checkCredentials($http, 'Google\Auth\Credentials\ServiceAccountCredentials');
    }

    public function testApplicationDefaultCredentialsWithSubject()
    {
        $this->checkServiceAccountCredentials();
        $credentialsFile = getenv('GOOGLE_APPLICATION_CREDENTIALS');

        $sub = 'sub123';
        $client = new Client();
        $client->setAuthConfig($credentialsFile);
        $client->setSubject($sub);

        $http = new GuzzleClient();
        $client->authorize($http);

        $this->checkAuthHandler($http, 'AuthToken');
        $this->checkCredentials($http, 'Google\Auth\Credentials\ServiceAccountCredentials', $sub);
    }

    /**
     * Test that the ID token is properly refreshed.
     */
    public function testRefreshTokenSetsValues()
    {
        $token = json_encode([
            'access_token' => 'xyz',
            'id_token' => 'ID_TOKEN',
        ]);
        $postBody = $this->prophesize('GuzzleHttp\Psr7\Stream');
        $postBody->__toString()
            ->shouldBeCalledTimes(1)
            ->willReturn($token);

        $response = $this->prophesize('Psr\Http\Message\ResponseInterface');

        $response->getBody()
            ->shouldBeCalledTimes(1)
            ->willReturn($postBody->reveal());

        $response->hasHeader('Content-Type')->willReturn(false);

        $http = $this->prophesize('GuzzleHttp\ClientInterface');

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response->reveal());

        $client = $this->getClient();
        $client->setHttpClient($http->reveal());
        $client->fetchAccessTokenWithRefreshToken("REFRESH_TOKEN");
        $token = $client->getAccessToken();
        $this->assertEquals("ID_TOKEN", $token['id_token']);
    }

    /**
     * Test that the Refresh Token is set when refreshed.
     */
    public function testRefreshTokenIsSetOnRefresh()
    {
        $refreshToken = 'REFRESH_TOKEN';
        $token = json_encode([
            'access_token' => 'xyz',
            'id_token' => 'ID_TOKEN',
        ]);
        $postBody = $this->prophesize('Psr\Http\Message\StreamInterface');
        $postBody->__toString()
            ->shouldBeCalledTimes(1)
            ->willReturn($token);

        $response = $this->prophesize('Psr\Http\Message\ResponseInterface');

        $response->getBody()
            ->shouldBeCalledTimes(1)
            ->willReturn($postBody->reveal());

        $response->hasHeader('Content-Type')->willReturn(false);

        $http = $this->prophesize('GuzzleHttp\ClientInterface');

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response->reveal());

        $client = $this->getClient();
        $client->setHttpClient($http->reveal());
        $client->fetchAccessTokenWithRefreshToken($refreshToken);
        $token = $client->getAccessToken();
        $this->assertEquals($refreshToken, $token['refresh_token']);
    }

    /**
     * Test that the Refresh Token is not set when a new refresh token is returned.
     */
    public function testRefreshTokenIsNotSetWhenNewRefreshTokenIsReturned()
    {
        $refreshToken = 'REFRESH_TOKEN';
        $token = json_encode([
            'access_token' => 'xyz',
            'id_token' => 'ID_TOKEN',
            'refresh_token' => 'NEW_REFRESH_TOKEN'
        ]);

        $postBody = $this->prophesize('GuzzleHttp\Psr7\Stream');
        $postBody->__toString()
            ->wilLReturn($token);

        $response = $this->prophesize('Psr\Http\Message\ResponseInterface');

        $response->getBody()
            ->willReturn($postBody->reveal());

        $response->hasHeader('Content-Type')->willReturn(false);

        $http = $this->prophesize('GuzzleHttp\ClientInterface');

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes(1)
            ->willReturn($response->reveal());

        $client = $this->getClient();
        $client->setHttpClient($http->reveal());
        $client->fetchAccessTokenWithRefreshToken($refreshToken);
        $token = $client->getAccessToken();
        $this->assertEquals('NEW_REFRESH_TOKEN', $token['refresh_token']);
    }

    /**
     * Test fetching an access token with assertion credentials
     * using "useApplicationDefaultCredentials"
     */
    public function testFetchAccessTokenWithAssertionFromEnv()
    {
        $this->checkServiceAccountCredentials();

        $client = $this->getClient();
        $client->useApplicationDefaultCredentials();
        $token = $client->fetchAccessTokenWithAssertion();

        $this->assertNotNull($token);
        $this->assertArrayHasKey('access_token', $token);
    }

    /**
     * Test fetching an access token with assertion credentials
     * using "setAuthConfig"
     */
    public function testFetchAccessTokenWithAssertionFromFile()
    {
        $this->checkServiceAccountCredentials();

        $client = $this->getClient();
        $client->setAuthConfig(getenv('GOOGLE_APPLICATION_CREDENTIALS'));
        $token = $client->fetchAccessTokenWithAssertion();

        $this->assertNotNull($token);
        $this->assertArrayHasKey('access_token', $token);
    }

    /**
     * Test fetching an access token with assertion credentials
     * populates the "created" field
     */
    public function testFetchAccessTokenWithAssertionAddsCreated()
    {
        $this->checkServiceAccountCredentials();

        $client = $this->getClient();
        $client->useApplicationDefaultCredentials();
        $token = $client->fetchAccessTokenWithAssertion();

        $this->assertNotNull($token);
        $this->assertArrayHasKey('created', $token);
    }

    /**
     * Test fetching an access token with assertion credentials
     * using "setAuthConfig" and "setSubject" but with user credentials
     */
    public function testBadSubjectThrowsException()
    {
        $this->checkServiceAccountCredentials();

        $client = $this->getClient();
        $client->useApplicationDefaultCredentials();
        $client->setSubject('bad-subject');

        $authHandler = AuthHandlerFactory::build();

        // make this method public for testing purposes
        $method = new ReflectionMethod($authHandler, 'createAuthHttp');
        $method->setAccessible(true);
        $authHttp = $method->invoke($authHandler, $client->getHttpClient());

        try {
            $token = $client->fetchAccessTokenWithAssertion($authHttp);
            $this->fail('no exception thrown');
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $this->assertContains('Invalid impersonation', (string) $response->getBody());
        }
    }

    public function testTokenCallback()
    {
        $this->checkToken();

        $client = $this->getClient();
        $accessToken = $client->getAccessToken();

        if (!isset($accessToken['refresh_token'])) {
            $this->markTestSkipped('Refresh Token required');
        }

        // make the auth library think the token is expired
        $accessToken['expires_in'] = 0;
        $cache = $client->getCache();
        $path = sys_get_temp_dir().'/google-api-php-client-tests-'.time();
        $client->setCache($this->getCache($path));
        $client->setAccessToken($accessToken);

        // create the callback function
        $phpunit = $this;
        $called = false;
        $callback = function ($key, $value) use ($client, $cache, $phpunit, &$called) {
            // assert the expected keys and values
            $phpunit->assertNotNull($key);
            $phpunit->assertNotNull($value);
            $called = true;

            // go back to the previous cache
            $client->setCache($cache);
        };

        // set the token callback to the client
        $client->setTokenCallback($callback);

        // make a silly request to obtain a new token (it's ok if it fails)
        $http = $client->authorize();
        try {
            $http->get('https://www.googleapis.com/books/v1/volumes?q=Voltaire');
        } catch (Exception $e) {

        }
        $newToken = $client->getAccessToken();

        // go back to the previous cache
        // (in case callback wasn't called)
        $client->setCache($cache);

        $this->assertTrue($called);
    }

    public function testDefaultTokenCallback()
    {
        $this->checkToken();

        $client = $this->getClient();
        $accessToken = $client->getAccessToken();

        if (!isset($accessToken['refresh_token'])) {
            $this->markTestSkipped('Refresh Token required');
        }

        // make the auth library think the token is expired
        $accessToken['expires_in'] = 0;
        $client->setAccessToken($accessToken);

        // make a silly request to obtain a new token (it's ok if it fails)
        $http = $client->authorize();
        try {
            $http->get('https://www.googleapis.com/books/v1/volumes?q=Voltaire');
        } catch (Exception $e) {

        }

        // Assert the in-memory token has been updated
        $newToken = $client->getAccessToken();
        $this->assertNotEquals(
            $accessToken['access_token'],
            $newToken['access_token']
        );

        $this->assertFalse($client->isAccessTokenExpired());
    }

    /** @runInSeparateProcess */
    public function testOnGceCacheAndCacheOptions()
    {
        if (!class_exists(GCECache::class)) {
            $this->markTestSkipped('Requires google/auth >= 1.12');
        }

        putenv('HOME=');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=');
        $prefix = 'test_prefix_';
        $cacheConfig = ['gce_prefix' => $prefix];

        $mockCacheItem = $this->prophesize(CacheItemInterface::class);
        $mockCacheItem->isHit()
            ->willReturn(true);
        $mockCacheItem->get()
            ->shouldBeCalledTimes(1)
            ->willReturn(true);

        $mockCache = $this->prophesize(CacheItemPoolInterface::class);
        $mockCache->getItem($prefix . GCECache::GCE_CACHE_KEY)
            ->shouldBeCalledTimes(1)
            ->willReturn($mockCacheItem->reveal());

        $client = new Client(['cache_config' => $cacheConfig]);
        $client->setCache($mockCache->reveal());
        $client->useApplicationDefaultCredentials();
        $client->authorize();
    }

    /** @runInSeparateProcess */
    public function testFetchAccessTokenWithAssertionCache()
    {
        $this->checkServiceAccountCredentials();
        $cachedValue = ['access_token' => '2/abcdef1234567890'];
        $mockCacheItem = $this->prophesize(CacheItemInterface::class);
        $mockCacheItem->isHit()
            ->shouldBeCalledTimes(1)
            ->willReturn(true);
        $mockCacheItem->get()
            ->shouldBeCalledTimes(1)
            ->willReturn($cachedValue);

        $mockCache = $this->prophesize(CacheItemPoolInterface::class);
        $mockCache->getItem(Argument::any())
            ->shouldBeCalledTimes(1)
            ->willReturn($mockCacheItem->reveal());

        $client = new Client();
        $client->setCache($mockCache->reveal());
        $client->useApplicationDefaultCredentials();
        $token = $client->fetchAccessTokenWithAssertion();
        $this->assertArrayHasKey('access_token', $token);
        $this->assertEquals($cachedValue['access_token'], $token['access_token']);
    }

    public function testCacheClientOption()
    {
        $mockCache = $this->prophesize(CacheItemPoolInterface::class);
        $client = new Client([
            'cache' => $mockCache->reveal()
        ]);
        $this->assertEquals($mockCache->reveal(), $client->getCache());
    }

    public function testExecuteWithFormat()
    {
        $client = new Client([
            'api_format_v2' => true
        ]);

        $guzzle = $this->prophesize('GuzzleHttp\Client');
        $guzzle
        ->send(Argument::allOf(
            Argument::type('Psr\Http\Message\RequestInterface'),
            Argument::that(function (RequestInterface $request) {
                return $request->getHeaderLine('X-GOOG-API-FORMAT-VERSION') === '2';
            })
        ), [])
        ->shouldBeCalled()
        ->willReturn(new Response(200, [], null));

        $client->setHttpClient($guzzle->reveal());

        $request = new Request('POST', 'http://foo.bar/');
        $client->execute($request);
    }

    public function testExecuteSetsCorrectHeaders()
    {
        $client = new Client();

        $guzzle = $this->prophesize('GuzzleHttp\Client');
        $guzzle->send(Argument::that(function (RequestInterface $request) {
            $userAgent = sprintf(
                '%s%s',
                Client::USER_AGENT_SUFFIX,
                Client::LIBVER
            );
            $xGoogApiClient = sprintf(
                'gl-php/%s gdcl/%s',
                phpversion(),
                Client::LIBVER
            );

            if ($request->getHeaderLine('User-Agent') !== $userAgent) {
                return false;
            }

            if ($request->getHeaderLine('x-goog-api-client') !== $xGoogApiClient) {
                return false;
            }

            return true;
        }), [])->shouldBeCalledTimes(1)->willReturn(new Response(200, [], null));

        $client->setHttpClient($guzzle->reveal());

        $request = new Request('POST', 'http://foo.bar/');
        $client->execute($request);
    }

    /**
   * @runInSeparateProcess
   */
    public function testClientOptions()
    {
        // Test credential file
        $tmpCreds = [
            'type' => 'service_account',
            'client_id' => 'foo',
            'client_email' => '',
            'private_key' => ''
        ];
        $tmpCredFile = tempnam(sys_get_temp_dir(), 'creds') . '.json';
        file_put_contents($tmpCredFile, json_encode($tmpCreds));
        $client = new Client([
            'credentials' => $tmpCredFile
        ]);
        $this->assertEquals('foo', $client->getClientId());

        // Test credentials array
        $client = new Client([
            'credentials' => $tmpCredFile
        ]);
        $this->assertEquals('foo', $client->getClientId());

        // Test singular scope
        $client = new Client([
            'scopes' => 'a-scope'
        ]);
        $this->assertEquals(['a-scope'], $client->getScopes());

        // Test multiple scopes
        $client = new Client([
            'scopes' => ['one-scope', 'two-scope']
        ]);
        $this->assertEquals(['one-scope', 'two-scope'], $client->getScopes());

        // Test quota project
        $client = new Client([
            'quota_project' => 'some-quota-project'
        ]);
        $this->assertEquals('some-quota-project', $client->getConfig('quota_project'));
        // Test quota project in google/auth dependency
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.$tmpCredFile);
        $method = new ReflectionMethod($client, 'createApplicationDefaultCredentials');
        $method->setAccessible(true);
        $credentials = $method->invoke($client);
        $this->assertEquals('some-quota-project', $credentials->getQuotaProject());
    }

    public function testCredentialsOptionWithCredentialsLoader()
    {
        $request = null;
        $credentials = $this->prophesize('Google\Auth\CredentialsLoader');
        $credentials->getCacheKey()
            ->willReturn('cache-key');

        // Ensure the access token provided by our credentials loader is used
        $credentials->updateMetadata([], null, Argument::any())
            ->shouldBeCalledOnce()
            ->willReturn(['authorization' => 'Bearer abc']);
        $credentials->getLastReceivedToken()
            ->shouldBeCalledTimes(2)
            ->willReturn(null);

        $client = new Client(['credentials' => $credentials->reveal()]);

        $handler = $this->prophesize('GuzzleHttp\HandlerStack');
        $handler->remove('google_auth')
            ->shouldBeCalledOnce();
        $handler->push(Argument::any(), 'google_auth')
            ->shouldBeCalledOnce()
            ->will(function ($args) use (&$request) {
                $middleware = $args[0];
                $callable = $middleware(function ($req, $res) use (&$request) {
                    $request = $req; // test later
                });
                $callable(new Request('GET', '/fake-uri'), ['auth' => 'google_auth']);
            });

        $httpClient = $this->prophesize('GuzzleHttp\ClientInterface');
        $httpClient->getConfig()
            ->shouldBeCalled()
            ->willReturn(['handler' => $handler->reveal()]);
        $httpClient->send(Argument::any(), Argument::any())
            ->shouldNotBeCalled();

        $http = $client->authorize($httpClient->reveal());

        $this->assertNotNull($request);
        $authHeader = $request->getHeaderLine('authorization');
        $this->assertNotNull($authHeader);
        $this->assertEquals('Bearer abc', $authHeader);
    }

    public function testSetNewRedirectUri()
    {
        $client = new Client();
        $redirectUri1 = 'https://foo.com/test1';
        $client->setRedirectUri($redirectUri1);

        $authUrl1 = $client->createAuthUrl();
        $this->assertStringContainsString(urlencode($redirectUri1), $authUrl1);

        $redirectUri2 = 'https://foo.com/test2';
        $client->setRedirectUri($redirectUri2);

        $authUrl2 = $client->createAuthUrl();
        $this->assertStringContainsString(urlencode($redirectUri2), $authUrl2);
    }

    public function testQueryParamsForAuthUrl()
    {
        $client = new Client();
        $client->setRedirectUri('https://example.com');
        $authUrl1 = $client->createAuthUrl(null, [
            'enable_serial_consent' => 'true'
        ]);
        $this->assertStringContainsString('&enable_serial_consent=true', $authUrl1);
    }
}
