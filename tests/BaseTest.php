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

namespace Google\Tests;

use Google\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Cache\Adapter\Filesystem\FilesystemCachePool;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

if (trait_exists('\Prophecy\PhpUnit\ProphecyTrait')) {
    trait BaseTestTrait
    {
        use \Prophecy\PhpUnit\ProphecyTrait;
    }
} else {
    trait BaseTestTrait
    {
    }
}

class BaseTest extends TestCase
{
    private $key;
    private $client;

    use BaseTestTrait;

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
        if ($this->isGuzzle5()) {
            $options = ['defaults' => $options];
        }

        $httpClient = new GuzzleClient($options);

        $client = new Client();
        $client->setApplicationName('google-api-php-client-tests');
        $client->setHttpClient($httpClient);
        $client->setScopes(
            [
            "https://www.googleapis.com/auth/tasks",
            "https://www.googleapis.com/auth/adsense",
            "https://www.googleapis.com/auth/youtube",
            "https://www.googleapis.com/auth/drive",
            ]
        );

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

    public function tryToGetAnAccessToken(Client $client)
    {
        $this->checkClientCredentials();

        $client->setRedirectUri("urn:ietf:wg:oauth:2.0:oob");
        $client->setConfig('access_type', 'offline');
        $authUrl = $client->createAuthUrl();
        echo "\nGo to: $authUrl\n";
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
        $clientId = getenv('GOOGLE_CLIENT_ID') ?: null;
        $clientSecret = getenv('GOOGLE_CLIENT_SECRET') ?: null;

        return array($clientId, $clientSecret);
    }

    protected function checkClientCredentials()
    {
        list($clientId, $clientSecret) = $this->getClientIdAndSecret();
        if (!($clientId && $clientSecret)) {
            $this->markTestSkipped("Test requires GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET to be set");
        }
    }

    protected function checkServiceAccountCredentials()
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

    protected function checkKey()
    {
        if (file_exists($apiKeyFile = __DIR__ . DIRECTORY_SEPARATOR . '.apiKey')) {
            $apiKey = file_get_contents($apiKeyFile);
        } elseif (!$apiKey = getenv('GOOGLE_API_KEY')) {
            $this->markTestSkipped(
                "Test requires api key\nYou can create one in your developer console"
            );
            file_put_contents($apiKeyFile, $apiKey);
        }
        $this->key = $apiKey;
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

    protected function isGuzzle7()
    {
        if (!defined('\GuzzleHttp\ClientInterface::MAJOR_VERSION')) {
            return false;
        }

        return (7 === ClientInterface::MAJOR_VERSION);
    }

    protected function isGuzzle6()
    {
        if (!defined('\GuzzleHttp\ClientInterface::VERSION')) {
            return false;
        }
        $version = ClientInterface::VERSION;

        return ('6' === $version[0]);
    }

    protected function isGuzzle5()
    {
        if (!defined('\GuzzleHttp\ClientInterface::VERSION')) {
            return false;
        }

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

    public function onlyGuzzle6Or7()
    {
        if (!$this->isGuzzle6() && !$this->isGuzzle7()) {
            $this->markTestSkipped('Guzzle 6 or 7 only');
        }
    }

    protected function getGuzzle5ResponseMock()
    {
        $response = $this->prophesize('GuzzleHttp\Message\ResponseInterface');
        $response->getStatusCode()
            ->willReturn(200);

        $response->getHeaders()->willReturn([]);
        $response->getBody()->willReturn('');
        $response->getProtocolVersion()->willReturn('');
        $response->getReasonPhrase()->willReturn('');

        return $response;
    }
}
