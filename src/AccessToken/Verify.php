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

namespace Google\AccessToken;

use DomainException;
use Exception;
use Firebase\JWT\CachedKeySet;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use Google\Auth\Cache\MemoryCacheItemPool;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Psr7\HttpFactory;
use InvalidArgumentException;
use LogicException;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Wrapper around Google Access Tokens which provides convenience functions
 *
 */
class Verify
{
    const FEDERATED_SIGNON_CERT_URL = 'https://www.googleapis.com/oauth2/v3/certs';
    const OAUTH2_ISSUER = 'accounts.google.com';
    const OAUTH2_ISSUER_HTTPS = 'https://accounts.google.com';

    /**
     * @var \Firebase\JWT\JWT
    */
    public JWT $jwt;

    /**
     * @var \Firebase\JWT\CachedKeySet
     */
    private CachedKeySet $keySet;

    /**
     * Instantiates the class, but does not initiate the login flow, leaving it
     * to the discretion of the caller.
     */
    public function __construct(
        GuzzleClientInterface $http = null,
        CacheItemPoolInterface $cache = null,
        $jwt = null
    ) {
        if (null === $http) {
            $http = new Client();
        }

        if (null === $cache) {
            $cache = new MemoryCacheItemPool();
        }

        if (!$http instanceof ClientInterface) {
            throw new InvalidArgumentException('http client must implement ' . ClientInterface::class);
        }

        $this->jwt = $jwt ?: $this->getJwtService();
        $this->keySet = new CachedKeySet(
            self::FEDERATED_SIGNON_CERT_URL,
            $http,
            new HttpFactory(),
            $cache
        );
    }

    /**
     * Verifies an id token and returns the authenticated apiLoginTicket.
     * Throws an exception if the id token is not valid.
     * The audience parameter can be used to control which id tokens are
     * accepted.  By default, the id token must have been issued to this OAuth2 client.
     *
     * @param string $idToken the ID token in JWT format
     * @param string $audience Optional. The audience to verify against JWt "aud"
     * @return array|false the token payload, if successful
     */
    public function verifyIdToken($idToken, $audience = null)
    {
        if (empty($idToken)) {
            throw new LogicException('id_token cannot be null');
        }

        // Check signature
        try {
            $payload = ($this->jwt)->decode($idToken, $this->keySet);
        } catch (ExpiredException | SignatureInvalidException | DomainException) {
            return false;
        }

        if (property_exists($payload, 'aud')) {
            if ($audience && $payload->aud != $audience) {
                return false;
            }
        }

        // support HTTP and HTTPS issuers
        // @see https://developers.google.com/identity/sign-in/web/backend-auth
        $issuers = [self::OAUTH2_ISSUER, self::OAUTH2_ISSUER_HTTPS];
        if (!isset($payload->iss) || !in_array($payload->iss, $issuers)) {
            return false;
        }

        return (array) $payload;
    }

    private function getJwtService()
    {
        $jwt = new JWT();
        if ($jwt::$leeway < 1) {
            // Ensures JWT leeway is at least 1
            // @see https://github.com/google/google-api-php-client/issues/827
            $jwt::$leeway = 1;
        }

        return $jwt;
    }
}
