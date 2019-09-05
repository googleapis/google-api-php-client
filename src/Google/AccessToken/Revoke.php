<?php

/*
 * Copyright 2008 Google Inc.
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

use Firebase\JWT\JWT;
use Google\Auth\AccessToken;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use GuzzleHttp\ClientInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Wrapper around Google Access Tokens which provides convenience functions
 *
 * @deprecated Use {@see Google\Auth\AccessToken}.
 */
class Google_AccessToken_Revoke
{
    /**
     * @var AccessToken
     */
    private $accessToken;

    /**
     * @param ClientInterface $http [optional] An HTTP Handler to deliver PSR-7 requests.
     * @param CacheItemPoolInterface $cache [optional] A PSR-6 compatible cache implementation.
     * @param AccessToken $accessToken [optional] An Access Token instance.
     */
    public function __construct(
        ClientInterface $http = null,
        CacheItemPoolInterface $cache = null,
        AccessToken $accessToken = null
    ) {
        $httpHandler = HttpHandlerFactory::build($http);
        $this->accessToken = $accessToken ?: new AccessToken($httpHandler, $cache);
    }

    /**
     * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
     * token, if a token isn't provided.
     *
     * @param string|array $token The token (access token or a refresh token) that should be revoked.
     * @return boolean Returns True if the revocation was successful, otherwise False.
     */
    public function revokeToken($token)
    {
        return $this->accessToken->revoke($token);
    }
}
