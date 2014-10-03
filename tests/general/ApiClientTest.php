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

require_once 'BaseTest.php';
require_once realpath(dirname(__FILE__) . '/../../autoload.php');

class ApiClientTest extends BaseTest {
  public function testClient() {
    $client = new Google_Client();
    $client->setAccessType('foo');
    $client->setDeveloperKey('foo');
    $req = new Google_Http_Request('http://foo.com');
    $client->getAuth()->sign($req);
    $params = $req->getQueryParams();
    $this->assertEquals('foo', $params['key']);

    $client->setAccessToken(json_encode(array('access_token' => '1')));
    $this->assertEquals("{\"access_token\":\"1\"}", $client->getAccessToken());
  }

  /**
   * @expectedException Google_Auth_Exception
   */
  public function testPrepareInvalidScopes() {
    $client = new Google_Client();

    $scopes = $client->prepareScopes();
    $this->assertEquals("", $scopes);
  }

  public function testNoAuthIsNull() {
    $client = new Google_Client();

    $this->assertNull($client->getAccessToken());
  }

  public function testPrepareService() {
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
    $client->setScopes(array("http://test.com", "scope2"));
    $scopes = $client->prepareScopes();
    $this->assertEquals("http://test.com scope2", $scopes);
    $this->assertEquals(''
        .  'https://accounts.google.com/o/oauth2/auth'
        . '?response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2F'
        . '&client_id=test1'
        . '&scope=http%3A%2F%2Ftest.com+scope2&access_type=online'
        . '&approval_prompt=auto', $client->createAuthUrl());
        
    // This should not trigger a request.
    $client->setDefer(true);
    $dr_service = new Google_Service_Drive($client);
    $this->assertInstanceOf('Google_Http_Request', $dr_service->files->listFiles());
  }

  public function testSettersGetters() {
    $client = new Google_Client();
    $client->setClientId("client1");
    $client->setClientSecret('client1secret');
    $client->setState('1');
    $client->setApprovalPrompt('force');
    $client->setAccessType('offline');

    $client->setRedirectUri('localhost');
    $client->setApplicationName('me');
    $this->assertEquals('object', gettype($client->getAuth()));
    $this->assertEquals('object', gettype($client->getCache()));
    $this->assertEquals('object', gettype($client->getIo()));

    $client->setAuth(new Google_Auth_Simple($client));
    $client->setAuth(new Google_Auth_OAuth2($client));

    try {
      $client->setAccessToken(null);
      die('Should have thrown an Google_Auth_Exception.');
    } catch(Google_Auth_Exception $e) {
      $this->assertEquals('Could not json decode the token', $e->getMessage());
    }

    $token = json_encode(array('access_token' => 'token'));
    $client->setAccessToken($token);
    $this->assertEquals($token, $client->getAccessToken());
  }

  public function testAppEngineAutoConfig() {
    if (!class_exists("Memcached")) {
      $this->markTestSkipped('Test requires memcache');
    }
    $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
    $client = new Google_Client();
    $this->assertInstanceOf('Google_Cache_Memcache', $client->getCache());
    unset($_SERVER['SERVER_SOFTWARE']);
  }
  
    public function testJsonConfig() {
        // Device config
    $config = new Google_Config();
    $client = new Google_Client($config);
    $device = '{"installed":{"auth_uri":"https://accounts.google.com/o/oauth2/auth","client_secret":"N0aHCBT1qX1VAcF5J1pJAn6S","token_uri":"https://accounts.google.com/o/oauth2/token","client_email":"","redirect_uris":["urn:ietf:wg:oauth:2.0:oob","oob"],"client_x509_cert_url":"","client_id":"123456789.apps.googleusercontent.com","auth_provider_x509_cert_url":"https://www.googleapis.com/oauth2/v1/certs"}}';
    $dObj = json_decode($device);
    $client->setAuthConfig($device);
    $cfg = $config->getClassConfig('Google_Auth_OAuth2');
    $this->assertEquals($cfg['client_id'], $dObj->installed->client_id);
    $this->assertEquals($cfg['client_secret'], $dObj->installed->client_secret);
    $this->assertEquals($cfg['redirect_uri'], $dObj->installed->redirect_uris[0]);
    
    // Web config 
    $config = new Google_Config();
    $client = new Google_Client($config);
    $web = '{"web":{"auth_uri":"https://accounts.google.com/o/oauth2/auth","client_secret":"lpoubuib8bj-Fmke_YhhyHGgXc","token_uri":"https://accounts.google.com/o/oauth2/token","client_email":"123456789@developer.gserviceaccount.com","client_x509_cert_url":"https://www.googleapis.com/robot/v1/metadata/x509/123456789@developer.gserviceaccount.com","client_id":"123456789.apps.googleusercontent.com","auth_provider_x509_cert_url":"https://www.googleapis.com/oauth2/v1/certs"}}';
    $wObj = json_decode($web);
    $client->setAuthConfig($web);
    $cfg = $config->getClassConfig('Google_Auth_OAuth2');
    $this->assertEquals($cfg['client_id'], $wObj->web->client_id);
    $this->assertEquals($cfg['client_secret'], $wObj->web->client_secret);
    $this->assertEquals($cfg['redirect_uri'], '');
  }
  
  public function testIniConfig() {
    $config = new Google_Config(__DIR__ . "/testdata/test.ini");
    $this->assertEquals('My Test application', $config->getApplicationName());
    $this->assertEquals('gjfiwnGinpena3', $config->getClassConfig('Google_Auth_OAuth2', 'client_secret'));
  }
}
