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

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Cache\Adapter\Filesystem\FilesystemCachePool;

class BaseTest extends PHPUnit_Framework_TestCase
{
  private $key;
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

  public function getCache($path = null)
  {
    $path = $path ?: sys_get_temp_dir().'/google-api-php-client-tests/';
    $filesystemAdapter = new Local($path);
    $filesystem        = new Filesystem($filesystemAdapter);

    return new FilesystemCachePool($filesystem);
  }

  private function createClient()
  {
    $options = [
      'auth' => 'google_auth',
      'exceptions' => false,
    ];

    if ($proxy = getenv('HTTP_PROXY')) {
      $options['proxy'] = $proxy;
      $options['verify'] = false;
    }

    // adjust constructor depending on guzzle version
    if (!$this->isGuzzle6()) {
      $options = ['defaults' => $options];
    }

    $httpClient = new GuzzleHttp\Client($options);

    $client = new Google_Client();
    $client->setApplicationName('google-api-php-client-tests');
    $client->setHttpClient($httpClient);
    $client->setScopes([
        "https://www.googleapis.com/auth/plus.me",
        "https://www.googleapis.com/auth/urlshortener",
        "https://www.googleapis.com/auth/tasks",
        "https://www.googleapis.com/auth/adsense",
        "https://www.googleapis.com/auth/youtube",
        "https://www.googleapis.com/auth/drive",
    ]);

    if ($this->key) {
      $client->setDeveloperKey($this->key);
    }

    list($clientId, $clientSecret) = $this->getClientIdAndSecret();
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    if (version_compare(PHP_VERSION, '5.5', '>=')) {
      $client->setCache($this->getCache());
    }


    return $client;
  }

  public function checkToken()
  {
    $client = $this->getClient();
    $cache = $client->getCache();
    $cacheItem = $cache->getItem('access_token');

    if (!$token = $cacheItem->get()) {
      if (!$token = $this->tryToGetAnAccessToken($client)) {
        return $this->markTestSkipped("Test requires access token");
      }
      $cacheItem->set($token);
      $cache->save($cacheItem);
    }

    $client->setAccessToken($token);

    if ($client->isAccessTokenExpired()) {
      // as long as we have client credentials, even if its expired
      // our access token will automatically be refreshed
      $this->checkClientCredentials();
    }

    return true;
  }

  public function tryToGetAnAccessToken(Google_Client $client)
  {
    $this->checkClientCredentials();

    $client->setRedirectUri("urn:ietf:wg:oauth:2.0:oob");
    $client->setConfig('access_type', 'offline');
    $authUrl = $client->createAuthUrl();

    echo "\nPlease enter the auth code:\n";
    ob_flush();
    `open '$authUrl'`;
    $authCode = trim(fgets(STDIN));

    if ($accessToken = $client->fetchAccessTokenWithAuthCode($authCode)) {
      if (isset($accessToken['access_token'])) {
        return $accessToken;
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

  public function checkClientCredentials()
  {
    list($clientId, $clientSecret) = $this->getClientIdAndSecret();
    if (!($clientId && $clientSecret)) {
      $this->markTestSkipped("Test requires GCLOUD_CLIENT_ID and GCLOUD_CLIENT_SECRET to be set");
    }
  }

  public function checkServiceAccountCredentials()
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

  protected function loadExample($example)
  {
    // trick app into thinking we are a web server
    $_SERVER['HTTP_USER_AGENT'] = 'google-api-php-client-tests';
    $_SERVER['HTTP_HOST'] = 'localhost';
    $_SERVER['REQUEST_METHOD'] = 'GET';

    // include the file and return an HTML crawler
    $file = __DIR__ . '/../examples/' . $example;
    if (is_file($file)) {
        ob_start();
        include $file;
        $html = ob_get_clean();

        return new Crawler($html);
    }

    return false;
  }

  protected function isGuzzle6()
  {
    $version = ClientInterface::VERSION;

    return ('6' === $version[0]);
  }

  protected function isGuzzle5()
  {
    $version = ClientInterface::VERSION;

    return ('5' === $version[0]);
  }

  public function onlyGuzzle6()
  {
    if (!$this->isGuzzle6()) {
      $this->markTestSkipped('Guzzle 6 only');
    }
  }

  public function onlyPhp55AndAbove()
  {
    if (version_compare(PHP_VERSION, '5.5', '<')) {
      $this->markTestSkipped('PHP 5.5 and above only');
    }
  }

  public function onlyGuzzle5()
  {
    if (!$this->isGuzzle5()) {
      $this->markTestSkipped('Guzzle 5 only');
    }
  }
}
