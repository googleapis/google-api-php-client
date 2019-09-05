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

use Google\Auth\AccessToken;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use GuzzleHttp\ClientInterface;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Wrapper around Google Access Tokens which provides convenience functions
 *
 * @deprecated Use {@see Google\Auth\AccessToken}.
 */
class Google_AccessToken_Verify
{
    const FEDERATED_SIGNON_CERT_URL = 'https://www.googleapis.com/oauth2/v3/certs';
    const OAUTH2_ISSUER = 'accounts.google.com';
    const OAUTH2_ISSUER_HTTPS = 'https://accounts.google.com';

    /**
     * @var AccessToken
     */
    private $accessToken;

    /**
     * Formerly implicit public property. maintain for backwards compatibility.
     *
     * @deprecated
     * @var Jwt|null
     */
    public $jwt;

    /**
     * @param ClientInterface $httpHandler [optional] An HTTP Handler to deliver PSR-7 requests.
     * @param CacheItemPoolInterface $cache [optional] A PSR-6 compatible cache implementation.
     * @param Firebase\JWT\JWT|\JWT [optional] DEPRECATED.
     * @param AccessToken $accessToken [optional] An Access Token instance.
     */
    public function __construct(
        ClientInterface $http = null,
        CacheItemPoolInterface $cache = null,
        $jwt = null,
        AccessToken $accessToken = null
    ) {
        $httpHandler = HttpHandlerFactory::build($http);
        $this->accessToken = $accessToken ?: new AccessToken($httpHandler, $cache);

        // For backwards compatibility.
        $this->jwt = $jwt ?: $this->getJwtService();
    }

    /**
     * Verifies an id token and returns the authenticated apiLoginTicket.
     * Throws an exception if the id token is not valid.
     * The audience parameter can be used to control which id tokens are
     * accepted.  By default, the id token must have been issued to this OAuth2 client.
     *
     * @param string $token The JSON Web Token to be verified.
     * @param string [optional] $audience The indended recipient of the token.
     * @return array the token payload, if successful
     */
    public function verifyIdToken($idToken, $audience = null)
    {
        return $this->accessToken->verify($idToken, $audience);
    }

    /**
     * Maintained for backwards compatibility on Verify::$jwt.
     *
     * @return \Firebase\JWT\JWT|\JWT
     */
    private function getJwtService()
    {
        $jwtClass = 'JWT';
        if (class_exists('\Firebase\JWT\JWT')) {
            $jwtClass = 'Firebase\JWT\JWT';
        }

        return new $jwtClass;
    }
}
