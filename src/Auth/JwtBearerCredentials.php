<?php
/*
 * Copyright 2026 Appning Lda.
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

namespace Appning\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use InvalidArgumentException;
use Google\Auth\FetchAuthTokenInterface;


/**
 * Credentials that generate RS256 JWT Bearer tokens with a kid header.
 *
 * This class generates JWT tokens signed with RS256 algorithm using a private key.
 * The kid (Key ID) is included in the JWT header for token validation.
 */
class JwtBearerCredentials implements FetchAuthTokenInterface
{
    /**
     * @var string The Key ID (kid) to include in JWT header
     */
    private $kid;

    /**
     * @var string The RSA private key in PEM format
     */
    private $privateKeyPem;

    /**
     * @var JWT JWT service instance
     */
    private $jwt;

    /**
     * @var array|null Last generated token and expiration
     */
    private $lastToken;

    /**
     * @var string|null The client ID from serviceAccount.json (used for iss and sub claims)
     */
    private $clientId;

    /**
     * @param string $kid The Key ID (kid) to include in JWT header
     * @param string $privateKeyPem The RSA private key in PEM format
     * @param JWT|null $jwt Optional JWT service instance
     * @param string|null $clientId Optional client ID from serviceAccount.json (used for iss and sub claims)
     */
    public function __construct($kid, $privateKeyPem, ?JWT $jwt = null, ?string $clientId = null)
    {
        if (empty($kid)) {
            throw new InvalidArgumentException('kid is required');
        }
        if (empty($privateKeyPem)) {
            throw new InvalidArgumentException('privateKeyPem is required');
        }

        $this->kid = $kid;
        $this->privateKeyPem = $privateKeyPem;
        $this->jwt = $jwt ?: $this->getJwtService();
        $this->clientId = $clientId;
    }

    /**
     * Generate a JWT Bearer token with custom claims.
     *
     * When iss/sub are not provided, uses clientId from serviceAccount.json when set.
     *
     * @param array $claims JWT claims (iss, sub, exp, iat, etc.)
     * @return string The signed JWT token
     */
    public function generateToken(array $claims = [])
    {
        // Default iss and sub from clientId (serviceAccount.json) when not provided
        $issSub = $this->clientId ?? 'jwt-bearer';
        if (!isset($claims['iss'])) {
            $claims['iss'] = $issSub;
        }
        if (!isset($claims['sub'])) {
            $claims['sub'] = $issSub;
        }

        // Set default expiration (1 hour from now) if not provided
        $now = time();
        if (!isset($claims['exp'])) {
            $claims['exp'] = $now + 3600;
        }
        if (!isset($claims['iat'])) {
            $claims['iat'] = $now;
        }

        // Create header with kid
        $header = [
            'alg' => 'RS256',
            'typ' => 'JWT',
            'kid' => $this->kid,
        ];

        // Encode and sign the token
        $token = JWT::encode($claims, $this->privateKeyPem, 'RS256', null, $header);

        // Store last token for getLastReceivedToken()
        $this->lastToken = [
            'access_token' => $token,
            'expires_at' => $claims['exp'],
        ];

        return $token;
    }

    /**
     * Fetches auth tokens. Required by FetchAuthTokenInterface.
     *
     * For JWT Bearer tokens, this generates a basic token with minimal claims.
     * For custom claims, use generateToken() directly.
     *
     * @param callable|null $httpHandler Unused for JWT generation
     * @return array Array containing 'access_token'
     */
    public function fetchAuthToken(?callable $httpHandler = null)
    {
        // Use clientId from serviceAccount.json for iss and sub when set
        $iss = $this->clientId ?? 'jwt-bearer';
        $sub = $this->clientId ?? 'jwt-bearer';

        $token = $this->generateToken([
            'iss' => $iss,
            'sub' => $sub,
        ]);

        return [
            'access_token' => $token,
        ];
    }

    /**
     * Gets a cache key for the credentials.
     *
     * @return string Cache key based on kid
     */
    public function getCacheKey()
    {
        return 'jwt_bearer_' . md5($this->kid);
    }

    /**
     * Returns the last received token.
     *
     * @return array|null Last token with access_token and expires_at, or null
     */
    public function getLastReceivedToken()
    {
        return $this->lastToken;
    }

    /**
     * Get the Key ID (kid).
     *
     * @return string
     */
    public function getKid()
    {
        return $this->kid;
    }

    /**
     * Get the client ID from serviceAccount.json (used for iss and sub claims).
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Get a JWT service instance.
     *
     * @return JWT
     */
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
