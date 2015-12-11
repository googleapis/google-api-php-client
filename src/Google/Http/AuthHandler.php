<?php

use Google\Auth\CacheInterface;
use Google\Auth\CredentialsLoader;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Google\Auth\Middleware\AuthTokenMiddleware;
use Google\Auth\Middleware\ScopedAccessTokenMiddleware;
use Google\Auth\Middleware\SimpleMiddleware;
use Google\Auth\Subscriber\AuthTokenSubscriber;
use Google\Auth\Subscriber\ScopedAccessTokenSubscriber;
use Google\Auth\Subscriber\SimpleSubscriber;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;

/**
*
*/
class Google_Http_AuthHandler
{
  protected $cache;

  public function __construct($cache = null)
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
    if ($this->useMiddleware()) {
      $middleware = new AuthTokenMiddleware(
          $credentials,
          [],
          $this->cache,
          $authHttpHandler
      );

      $config = $http->getConfig();
      $config['handler']->push($middleware);
      $config['auth'] = 'google_auth';
      $http = new Client($config);
    } else {
      $subscriber = new AuthTokenSubscriber(
          $credentials,
          [],
          $this->cache,
          $authHttpHandler
      );

      $http->setDefaultOption('auth', 'google_auth');
      $http->getEmitter()->attach($subscriber);
    }

    return $http;
  }

  public function attachToken(ClientInterface $http, array $token, array $scopes)
  {
    $tokenFunc = function ($scopes) use ($token) {
      return $token['access_token'];
    };

    if ($this->useMiddleware()) {
      $middleware = new ScopedAccessTokenMiddleware(
          $tokenFunc,
          $scopes,
          [],
          $this->cache
      );

      $config = $http->getConfig();
      $config['handler']->push($middleware);
      $config['auth'] = 'scoped';
      $http = new Client($config);
    } else {
      $subscriber = new ScopedAccessTokenSubscriber(
          $tokenFunc,
          $scopes,
          [],
          $this->cache
      );

      $http->setDefaultOption('auth', 'scoped');
      $http->getEmitter()->attach($subscriber);
    }

    return $http;
  }

  public function attachKey(ClientInterface $http, $key)
  {
    if ($this->useMiddleware()) {
      $middleware = new SimpleMiddleware(['key' => $key]);

      $config = $http->getConfig();
      $config['handler']->push($middleware);
      $config['auth'] = 'simple';
      $http = new Client($config);
    } else {
      $subscriber = new SimpleSubscriber(['key' => $key]);

      $http->setDefaultOption('auth', 'simple');
      $http->getEmitter()->attach($subscriber);
    }

    return $http;
  }

  public function createAuthHttp(ClientInterface $http)
  {
    if ($this->useMiddleware()) {
      return new Client(
          [
            'base_uri' => $http->getConfig('base_uri'),
            'exceptions' => true,
            'verify' => $http->getConfig('verify'),
            'proxy' => $http->getConfig('proxy'),
          ]
      );
    }

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

  private function useMiddleware()
  {
    $version = ClientInterface::VERSION;

    return '6' === $version[0];
  }
}
