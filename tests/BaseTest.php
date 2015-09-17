<?php
/*
 * Copyright 2011 Google Inc.
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

class BaseTest extends PHPUnit_Framework_TestCase
{
  private $key;
  private $token;
  private $client;
  private $memcacheHost;
  private $memcachePort;
  protected $testDir = __DIR__;

  public function getClient()
  {
    if (!$this->client) {
      $this->client = $this->createClient();
    }

    return $this->client;
  }

  public function getCache()
  {
    return new Google_Cache_File(sys_get_temp_dir().'/google-api-php-client-tests');
  }

  private function createClient()
  {
    $defaults = [
      'auth' => 'google_auth',
      'exceptions' => false
    ];
    if ($proxy = getenv('HTTP_PROXY')) {
      $defaults['proxy'] = $proxy;
      $defaults['verify'] = false;
    }
    $httpClient = new GuzzleHttp\Client([
      'defaults' => $defaults,
    ]);

    $client = new Google_Client();
    $client->setHttpClient($httpClient);
    $client->setScopes([
        "https://www.googleapis.com/auth/plus.me",
        "https://www.googleapis.com/auth/urlshortener",
        "https://www.googleapis.com/auth/tasks",
        "https://www.googleapis.com/auth/adsense",
        "https://www.googleapis.com/auth/youtube",
    ]);

    if ($this->key) {
      $client->setDeveloperKey($this->key);
    }
    if ($this->token) {
      $client->setAccessToken($this->token);
    }
    list($clientId, $clientSecret) = $this->getClientIdAndSecret();
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setCache($this->getCache());

    return $client;
  }

  public function checkToken()
  {
    $cache = $this->getCache();
    $this->token = $cache->get('access_token');
    if (!$this->token) {
      if (!$this->tryToGetAnAccessToken()) {
        return $this->markTestSkipped("Test requires access token");
      }
    }

    $client = $this->getClient();
    $client->setAccessToken($this->token);

    if ($client->isAccessTokenExpired()) {
      if (isset($this->token['refresh_token'])) {
        $this->token = $client->refreshToken($this->token['refresh_token']);
      }
    }

    $cache->set('access_token', $this->token);

    return true;
  }

  public function tryToGetAnAccessToken()
  {
    $client = $this->getClient();
    if (!($client->getClientId() && $client->getClientSecret())) {
      $this->markTestSkipped("Test requires GCLOUD_CLIENT_ID and GCLOUD_CLIENT_SECRET to be set");
    }

    $client = $this->getClient();
    $client->setRedirectUri("urn:ietf:wg:oauth:2.0:oob");
    $client->setConfig('access_type', 'offline');
    $authUrl = $client->createAuthUrl();

    echo "\nPlease enter the auth code:\n";
    ob_flush();
    `open '$authUrl'`;
    $authCode = trim(fgets(STDIN));

    if ($accessToken = $client->authenticate($authCode)) {
      if (isset($accessToken['access_token'])) {
        $this->token = $accessToken;

        return true;
      }
    }

    return false;
  }

  private function getClientIdAndSecret()
  {
    $clientId = getenv('GCLOUD_CLIENT_ID') ? getenv('GCLOUD_CLIENT_ID') : null;
    $clientSecret = getenv('GCLOUD_CLIENT_SECRET') ? getenv('GCLOUD_CLIENT_SECRET') : null;

    return array($clientId, $clientSecret);
  }

  public function checkServiceAccountToken()
  {
    if (!$f = getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
      $skip = "This test requires the GOOGLE_APPLICATION_CREDENTIALS environment variable to be set\n"
        . "see https://developers.google.com/accounts/docs/application-default-credentials";
      $this->markTestSkipped($skip);

      return false;
    }

    if (!file_exists($f)) {
      $this->markTestSkipped('invalid path for GOOGLE_APPLICATION_CREDENTIALS');
    }

    return true;
  }

  public function checkKey()
  {
    $this->key = $this->loadKey();

    if (!strlen($this->key)) {
      $this->markTestSkipped("Test requires api key\nYou can create one in your developer console");
      return false;
    }
  }

  public function loadKey()
  {
    if (file_exists($f = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.apiKey')) {
      return file_get_contents($f);
    }
  }
}
