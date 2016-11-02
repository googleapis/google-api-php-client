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

use GuzzleHttp\Client;
use GuzzleHttp\Event\RequestEvents;
use Psr\Http\Message\Request;

class Google_ClientTest extends BaseTest
{
  public function testClientConstructor()
  {
    $this->assertInstanceOf('Google_Client', $this->getClient());
  }

  public function testSignAppKey()
  {
    $client = $this->getClient();
    $client->setDeveloperKey('devKey');

    $http = new Client();
    $client->authorize($http);

    $this->checkAuthHandler($http, 'Simple');
  }

  private function checkAuthHandler($http, $className)
  {
    if ($this->isGuzzle6()) {
      $stack = $http->getConfig('handler');
      $class = new ReflectionClass(get_class($stack));
      $property = $class->getProperty('stack');
      $property->setAccessible(true);
      $middlewares = $property->getValue($stack);
      $middleware = array_pop($middlewares);

      if (is_null($className)) {
        // only the default middlewares have been added
        $this->assertEquals(3, count($middlewares));
      } else {
        $authClass = sprintf('Google\Auth\Middleware\%sMiddleware', $className);
        $this->assertInstanceOf($authClass, $middleware[0]);
      }
    } else {
      $listeners = $http->getEmitter()->listeners('before');

      if (is_null($className)) {
        $this->assertEquals(0, count($listeners));
      } else {
        $authClass = sprintf('Google\Auth\Subscriber\%sSubscriber', $className);
        $this->assertEquals(1, count($listeners));
        $this->assertEquals(2, count($listeners[0]));
        $this->assertInstanceOf($authClass, $listeners[0][0]);
      }
    }
  }

  private function checkCredentials($http, $fetcherClass, $sub = null)
  {
    if ($this->isGuzzle6()) {
      $stack = $http->getConfig('handler');
      $class = new ReflectionClass(get_class($stack));
      $property = $class->getProperty('stack');
      $property->setAccessible(true);
      $middlewares = $property->getValue($stack); // Works
      $middleware = array_pop($middlewares);
      $auth = $middleware[0];
    } else {
      // access the protected $fetcher property
      $listeners = $http->getEmitter()->listeners('before');
      $auth = $listeners[0][0];
    }

    $class = new ReflectionClass(get_class($auth));
    $property = $class->getProperty('fetcher');
    $property->setAccessible(true);
    $cacheFetcher = $property->getValue($auth);
    $this->assertInstanceOf('Google\Auth\FetchAuthTokenCache', $cacheFetcher);

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

    $http = new Client();
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
    $expected = "https://accounts.google.com/o/oauth2/auth"
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
    $expected = "https://accounts.google.com/o/oauth2/auth"
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
    $client = new Google_Client();

    $scopes = $client->prepareScopes();
    $this->assertEquals(null, $scopes);
  }

  public function testNoAuthIsNull()
  {
    $client = new Google_Client();

    $this->assertNull($client->getAccessToken());
  }

  public function testPrepareService()
  {
    $client = new Google_Client();
    $client->setScopes(array("scope1", "scope2"));
    $scopes = $client->prepareScopes();
    $this->assertEquals("scope1 scope2", $scopes);

    $client->setScopes(array("", "scope2"));
    $scopes = $client->prepareScopes();
    $this->assertEquals(" scope2", $scopes);

    $client->setScopes("scope2");
    $client->addScope("scope3");
    $client->addScope(array("scope4", "scope5"));
    $scopes = $client->prepareScopes();
    $this->assertEquals("scope2 scope3 scope4 scope5", $scopes);

    $client->setClientId('test1');
    $client->setRedirectUri('http://localhost/');
    $client->setState('xyz');
    $client->setScopes(array("http://test.com", "scope2"));
    $scopes = $client->prepareScopes();
    $this->assertEquals("http://test.com scope2", $scopes);
    $this->assertEquals(
        ''
        . 'https://accounts.google.com/o/oauth2/auth'
        . '?response_type=code'
        . '&access_type=online'
        . '&client_id=test1'
        . '&redirect_uri=http%3A%2F%2Flocalhost%2F'
        . '&state=xyz'
        . '&scope=http%3A%2F%2Ftest.com%20scope2'
        . '&approval_prompt=auto',

        $client->createAuthUrl()
    );

    $response = $this->getMock('Psr\Http\Message\ResponseInterface');
    $response->expects($this->once())
      ->method('getBody')
      ->will($this->returnValue($this->getMock('Psr\Http\Message\StreamInterface')));
    $http = $this->getMock('GuzzleHttp\ClientInterface');
    $http->expects($this->once())
      ->method('send')
      ->will($this->returnValue($response));

    if ($this->isGuzzle5()) {
      $guzzle5Request = new GuzzleHttp\Message\Request('POST', '/');
      $http->expects($this->once())
        ->method('createRequest')
        ->will($this->returnValue($guzzle5Request));
    }


    $client->setHttpClient($http);
    $dr_service = new Google_Service_Drive($client);
    $this->assertInstanceOf('Google_Model', $dr_service->files->listFiles());
  }

  public function testDefaultLogger()
  {
    $client = new Google_Client();
    $logger = $client->getLogger();
    $this->assertInstanceOf('Monolog\Logger', $logger);
    $handler = $logger->popHandler();
    $this->assertInstanceOf('Monolog\Handler\StreamHandler', $handler);
  }

  public function testDefaultLoggerAppEngine()
  {
    $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
    $client = new Google_Client();
    $logger = $client->getLogger();
    $handler = $logger->popHandler();
    unset($_SERVER['SERVER_SOFTWARE']);

    $this->assertInstanceOf('Monolog\Logger', $logger);
    $this->assertInstanceOf('Monolog\Handler\SyslogHandler', $handler);
  }

  public function testSettersGetters()
  {
    $client = new Google_Client();
    $client->setClientId("client1");
    $client->setClientSecret('client1secret');
    $client->setState('1');
    $client->setApprovalPrompt('force');
    $client->setAccessType('offline');

    $client->setRedirectUri('localhost');
    $client->setConfig('application_name', 'me');
    $client->setCache($this->getMock('Psr\Cache\CacheItemPoolInterface'));
    $this->assertEquals('object', gettype($client->getCache()));

    try {
      $client->setAccessToken(null);
      $this->fail('Should have thrown an Exception.');
    } catch (InvalidArgumentException $e) {
      $this->assertEquals('invalid json token', $e->getMessage());
    }

    $token = array('access_token' => 'token');
    $client->setAccessToken($token);
    $this->assertEquals($token, $client->getAccessToken());
  }

  public function testAppEngineStreamHandlerConfig()
  {
    $this->onlyGuzzle5();

    $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
    $client = new Google_Client();

    // check Stream Handler is used
    $http = $client->getHttpClient();
    $class = new ReflectionClass(get_class($http));
    $property = $class->getProperty('fsm');
    $property->setAccessible(true);
    $fsm = $property->getValue($http);

    $class = new ReflectionClass(get_class($fsm));
    $property = $class->getProperty('handler');
    $property->setAccessible(true);
    $handler = $property->getValue($fsm);

    $this->assertInstanceOf('GuzzleHttp\Ring\Client\StreamHandler', $handler);

    unset($_SERVER['SERVER_SOFTWARE']);
  }

  public function testAppEngineVerifyConfig()
  {
    $this->onlyGuzzle5();

    $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
    $client = new Google_Client();

    $this->assertEquals(
      '/etc/ca-certificates.crt',
      $client->getHttpClient()->getDefaultOption('verify')
    );

    unset($_SERVER['SERVER_SOFTWARE']);
  }

  public function testJsonConfig()
  {
    // Device config
    $client = new Google_Client();
    $device =
    '{"installed":{"auth_uri":"https://accounts.google.com/o/oauth2/auth","client_secret"'.
    ':"N0aHCBT1qX1VAcF5J1pJAn6S","token_uri":"https://accounts.google.com/o/oauth2/token",'.
    '"client_email":"","redirect_uris":["urn:ietf:wg:oauth:2.0:oob","oob"],"client_x509_cert_url"'.
    ':"","client_id":"123456789.apps.googleusercontent.com","auth_provider_x509_cert_url":'.
    '"https://www.googleapis.com/oauth2/v1/certs"}}';
    $dObj = json_decode($device, true);
    $client->setAuthConfig($dObj);
    $this->assertEquals($client->getClientId(), $dObj['installed']['client_id']);
    $this->assertEquals($client->getClientSecret(), $dObj['installed']['client_secret']);
    $this->assertEquals($client->getRedirectUri(), $dObj['installed']['redirect_uris'][0]);

    // Web config
    $client = new Google_Client();
    $web = '{"web":{"auth_uri":"https://accounts.google.com/o/oauth2/auth","client_secret"' .
      ':"lpoubuib8bj-Fmke_YhhyHGgXc","token_uri":"https://accounts.google.com/o/oauth2/token"' .
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
    $config = parse_ini_file($this->testDir . "/config/test.ini");
    $client = new Google_Client($config);

    $this->assertEquals('My Test application', $client->getConfig('application_name'));
    $this->assertEquals(
        'gjfiwnGinpena3',
        $client->getClientSecret()
    );
  }

  public function testNoAuth()
  {
    /** @var $noAuth Google_Auth_Simple */
    $client = new Google_Client();
    $client->setDeveloperKey(null);

    // unset application credentials
    $GOOGLE_APPLICATION_CREDENTIALS = getenv('GOOGLE_APPLICATION_CREDENTIALS');
    $HOME = getenv('HOME');
    putenv('GOOGLE_APPLICATION_CREDENTIALS=');
    putenv('HOME='.sys_get_temp_dir());
    $http = new Client();
    $client->authorize($http);

    putenv("GOOGLE_APPLICATION_CREDENTIALS=$GOOGLE_APPLICATION_CREDENTIALS");
    putenv("HOME=$HOME");
    $this->checkAuthHandler($http, null);
  }

  public function testApplicationDefaultCredentials()
  {
    $this->checkServiceAccountCredentials();
    $credentialsFile = getenv('GOOGLE_APPLICATION_CREDENTIALS');

    $client = new Google_Client();
    $client->setAuthConfig($credentialsFile);

    $http = new Client();
    $client->authorize($http);

    $this->checkAuthHandler($http, 'AuthToken');
    $this->checkCredentials($http, 'Google\Auth\Credentials\ServiceAccountCredentials');
  }

  public function testApplicationDefaultCredentialsWithSubject()
  {
    $this->checkServiceAccountCredentials();
    $credentialsFile = getenv('GOOGLE_APPLICATION_CREDENTIALS');

    $sub = 'sub123';
    $client = new Google_Client();
    $client->setAuthConfig($credentialsFile);
    $client->setSubject($sub);

    $http = new Client();
    $client->authorize($http);

    $this->checkAuthHandler($http, 'AuthToken');
    $this->checkCredentials($http, 'Google\Auth\Credentials\ServiceAccountCredentials', $sub);
  }

  /**
   * Test that the ID token is properly refreshed.
   */
  public function testRefreshTokenSetsValues()
  {
    $token = json_encode(array(
        'access_token' => 'xyz',
        'id_token' => 'ID_TOKEN',
    ));
    $postBody = $this->getMock('Psr\Http\Message\StreamInterface');
    $postBody->expects($this->once())
      ->method('__toString')
      ->will($this->returnValue($token));
    $response = $this->getMock('Psr\Http\Message\ResponseInterface');
    $response->expects($this->once())
      ->method('getBody')
      ->will($this->returnValue($postBody));
    $http = $this->getMock('GuzzleHttp\ClientInterface');
    $http->expects($this->once())
      ->method('send')
      ->will($this->returnValue($response));

    if ($this->isGuzzle5()) {
      $guzzle5Request = new GuzzleHttp\Message\Request('POST', '/', ['body' => $token]);
      $http->expects($this->once())
        ->method('createRequest')
        ->will($this->returnValue($guzzle5Request));
    }

    $client = $this->getClient();
    $client->setHttpClient($http);
    $client->fetchAccessTokenWithRefreshToken("REFRESH_TOKEN");
    $token = $client->getAccessToken();
    $this->assertEquals($token['id_token'], "ID_TOKEN");
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
   * using "setAuthConfig" and "setSubject" but with user credentials
   */
  public function testBadSubjectThrowsException()
  {
    $this->checkServiceAccountCredentials();

    $client = $this->getClient();
    $client->useApplicationDefaultCredentials();
    $client->setSubject('bad-subject');

    $authHandler = Google_AuthHandler_AuthHandlerFactory::build();

    // make this method public for testing purposes
    $method = new ReflectionMethod($authHandler, 'createAuthHttp');
    $method->setAccessible(true);
    $authHttp = $method->invoke($authHandler, $client->getHttpClient());

    try {
      $token = $client->fetchAccessTokenWithAssertion($authHttp);
      $this->fail('no exception thrown');
    } catch (GuzzleHttp\Exception\ClientException $e) {
      $response = $e->getResponse();
      $this->assertContains('Invalid impersonation prn email address', (string) $response->getBody());
    }
  }

  public function testTokenCallback()
  {
    $this->onlyPhp55AndAbove();
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
      // go back to the previous cache
      $client->setCache($cache);

      // assert the expected keys and values
      $phpunit->assertContains('https---www.googleapis.com-auth-', $key);
      $phpunit->assertNotNull($value);
      $called = true;
    };

    // set the token callback to the client
    $client->setTokenCallback($callback);

    // make a silly request to obtain a new token
    $http = $client->authorize();
    $http->get('https://www.googleapis.com/books/v1/volumes?q=Voltaire');
    $newToken = $client->getAccessToken();

    // go back to the previous cache
    // (in case callback wasn't called)
    $client->setCache($cache);

    $this->assertTrue($called);
  }
}
