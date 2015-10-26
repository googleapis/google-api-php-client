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
use GuzzleHttp\Message\Request;

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

    $listeners = $http->getEmitter()->listeners('before');
    $this->assertEquals(1, count($listeners));
    $this->assertEquals(2, count($listeners[0]));
    $this->assertInstanceOf('Google\Auth\Simple', $listeners[0][0]);
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

    $listeners = $http->getEmitter()->listeners('before');
    $this->assertEquals(1, count($listeners));
    $this->assertEquals(2, count($listeners[0]));
    $this->assertInstanceOf('Google\Auth\ScopedAccessToken', $listeners[0][0]);
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
        . "?access_type=offline"
        . "&approval_prompt=force"
        . "&login_hint=bob%40example.org"
        . "&response_type=code"
        . "&scope=http%3A%2F%2Fgoogleapis.com%2Fscope%2Ffoo"
        . "&state=xyz"
        . "&client_id=clientId1"
        . "&redirect_uri=http%3A%2F%2Flocalhost";
    $this->assertEquals($expected, $authUrl);

    // Again with a blank login hint (should remove all traces from authUrl)
    $client->setLoginHint('');
    $client->setHostedDomain('example.com');
    $client->setOpenIdRealm('example.com');
    $client->setPrompt('select_account');
    $client->setIncludeGrantedScopes(true);
    $authUrl = $client->createAuthUrl("http://googleapis.com/scope/foo");
    $expected = "https://accounts.google.com/o/oauth2/auth"
        . "?access_type=offline"
        . "&hd=example.com"
        . "&include_granted_scopes=true"
        . "&openid.realm=example.com"
        . "&prompt=select_account"
        . "&response_type=code"
        . "&scope=http%3A%2F%2Fgoogleapis.com%2Fscope%2Ffoo"
        . "&state=xyz"
        . "&client_id=clientId1"
        . "&redirect_uri=http%3A%2F%2Flocalhost";
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
        . '?access_type=online'
        . '&approval_prompt=auto'
        . '&response_type=code'
        . '&scope=http%3A%2F%2Ftest.com%20scope2'
        . '&state=xyz'
        . '&client_id=test1'
        . '&redirect_uri=http%3A%2F%2Flocalhost%2F',
        $client->createAuthUrl()
    );

    $response = $this->getMock('GuzzleHttp\Message\ResponseInterface');
    $response->expects($this->once())
      ->method('getBody')
      ->will($this->returnValue($this->getMock('GuzzleHttp\Post\PostBody')));
    $response->expects($this->once())
      ->method('json')
      ->will($this->returnValue($this->getMock('Google_Model')));
    $request = $this->getMock('GuzzleHttp\Message\RequestInterface');
    $request->expects($this->once())
      ->method('getQuery')
      ->will($this->returnValue($this->getMock('GuzzleHttp\Query')));
    $http = $this->getMock('GuzzleHttp\ClientInterface');
    $http->expects($this->once())
      ->method('createRequest')
      ->will($this->returnValue($request));
    $http->expects($this->once())
      ->method('send')
      ->will($this->returnValue($response));
    $client->setHttpClient($http);
    $dr_service = new Google_Service_Drive($client);
    $this->assertInstanceOf('Google_Model', $dr_service->files->listFiles());
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

  /**
   * @requires extension Memcached
   */
  public function testAppEngineAutoConfig()
  {
    $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
    $client = new Google_Client();
    $this->assertInstanceOf('Google_Cache_Memcache', $client->getCache());
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

    $listeners = $http->getEmitter()->listeners('before');

    putenv("GOOGLE_APPLICATION_CREDENTIALS=$GOOGLE_APPLICATION_CREDENTIALS");
    putenv("HOME=$HOME");
    $this->assertEquals(0, count($listeners));
  }

  public function testApplicationDefaultCredentials()
  {
    $client = new Google_Client();
    $client->setAuthConfig(__DIR__.'/../config/application-default-credentials.json');

    $http = new Client();
    $client->authorize($http);

    $listeners = $http->getEmitter()->listeners('before');

    $this->assertEquals(1, count($listeners));
    $this->assertEquals(2, count($listeners[0]));
    $this->assertInstanceOf('Google\Auth\AuthTokenFetcher', $listeners[0][0]);

    // access the protected $fetcher property
    $class = new ReflectionClass(get_class($listeners[0][0]));
    $property = $class->getProperty('fetcher');
    $property->setAccessible(true);
    $fetcher = $property->getValue($listeners[0][0]);

    $this->assertInstanceOf('Google\Auth\ServiceAccountCredentials', $fetcher);
  }

  public function testApplicationDefaultCredentialsWithSubject()
  {
    $sub = 'sub123';
    $client = new Google_Client();
    $client->setAuthConfig(__DIR__.'/../config/application-default-credentials.json');
    $client->setSubject($sub);

    $http = new Client();
    $client->authorize($http);

    $listeners = $http->getEmitter()->listeners('before');

    $this->assertEquals(1, count($listeners));
    $this->assertEquals(2, count($listeners[0]));
    $this->assertInstanceOf('Google\Auth\AuthTokenFetcher', $listeners[0][0]);

    // access the protected $fetcher property
    $class = new ReflectionClass(get_class($listeners[0][0]));
    $property = $class->getProperty('fetcher');
    $property->setAccessible(true);
    $fetcher = $property->getValue($listeners[0][0]);

    $this->assertInstanceOf('Google\Auth\ServiceAccountCredentials', $fetcher);

    // access the protected $auth property
    $class = new ReflectionClass(get_class($fetcher));
    $property = $class->getProperty('auth');
    $property->setAccessible(true);
    $auth = $property->getValue($fetcher);

    $this->assertEquals($sub, $auth->getSub());
  }

  /**
   * Test that the ID token is properly refreshed.
   */
  public function testRefreshTokenSetsValues()
  {
    $request = $this->getMock('GuzzleHttp\Message\RequestInterface');
    $request->expects($this->once())
      ->method('getBody')
      ->will($this->returnValue($this->getMock('GuzzleHttp\Post\PostBodyInterface')));
    $response = $this->getMock('GuzzleHttp\Message\ResponseInterface');
    $response->expects($this->once())
      ->method('json')
      ->will($this->returnValue(array(
          'access_token' => 'xyz',
          'id_token' => 'ID_TOKEN',
        )));
    $response->expects($this->once())
      ->method('getBody')
      ->will($this->returnValue($this->getMock('GuzzleHttp\Post\PostBody')));
    $http = $this->getMock('GuzzleHttp\ClientInterface');
    $http->expects($this->once())
      ->method('send')
      ->will($this->returnValue($response));
    $http->expects($this->once())
      ->method('createRequest')
      ->will($this->returnValue($request));
    $client = $this->getClient();
    $client->setHttpClient($http);
    $client->fetchAccessTokenWithRefreshToken("REFRESH_TOKEN");
    $token = $client->getAccessToken();
    $this->assertEquals($token['id_token'], "ID_TOKEN");
  }
}
