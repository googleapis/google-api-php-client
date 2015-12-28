<?php

use Google\Auth\CacheInterface;
use Google\Auth\CredentialsLoader;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Google\Auth\Subscriber\AuthTokenSubscriber;
use Google\Auth\Subscriber\ScopedAccessTokenSubscriber;
use Google\Auth\Subscriber\SimpleSubscriber;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
*
*/
class Google_AuthHandler_Guzzle5AuthHandler
{
  protected $cache;

  public function __construct(CacheInterface $cache = null)
  {
    $this->cache = $cache;
  }

  public function attachCredentials(ClientInterface $http, CredentialsLoader $credentials)
  {
    // if we end up needing to make an HTTP request to retrieve credentials, we
    // can use our existing one, but we need to throw exceptions so the error
    // bubbles up.
    $authHttp = $this->createAuthHttp($http);
    $authHttpHandler = HttpHandlerFactory::build($authHttp);
    $subscriber = new AuthTokenSubscriber(
        $credentials,
        [],
        $this->cache,
        $authHttpHandler
    );

    $http->setDefaultOption('auth', 'google_auth');
    $http->getEmitter()->attach($subscriber);

    return $http;
  }

  public function attachToken(ClientInterface $http, array $token, array $scopes)
  {
    $tokenFunc = function ($scopes) use ($token) {
      return $token['access_token'];
    };

    $subscriber = new ScopedAccessTokenSubscriber(
        $tokenFunc,
        $scopes,
        [],
        $this->cache
    );

    $http->setDefaultOption('auth', 'scoped');
    $http->getEmitter()->attach($subscriber);

    return $http;
  }

  public function attachKey(ClientInterface $http, $key)
  {
    $subscriber = new SimpleSubscriber(['key' => $key]);

    $http->setDefaultOption('auth', 'simple');
    $http->getEmitter()->attach($subscriber);

    return $http;
  }

  private function createAuthHttp(ClientInterface $http)
  {
    return new Client(
        [
          'base_url' => $http->getBaseUrl(),
          'defaults' => [
            'exceptions' => true,
            'verify' => $http->getDefaultOption('verify'),
            'proxy' => $http->getDefaultOption('proxy'),
          ]
        ]
    );
  }
}
