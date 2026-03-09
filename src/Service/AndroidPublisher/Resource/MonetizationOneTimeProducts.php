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

namespace Appning\Service\AndroidPublisher\Resource;

use Appning\Auth\JwtBearerCredentials;
use Appning\Exception as GoogleException;
use Appning\Service;
use Appning\Service\Resource;

/**
 * The "monetization_onetimeproducts" collection of methods.
 */
class MonetizationOneTimeProducts extends Resource
{
    /**
     * @param Service $service
     * @param string $serviceName
     * @param string $resourceName
     * @param array $resource
     */
    public function __construct($service, $serviceName, $resourceName, $resource)
    {
        parent::__construct($service, $serviceName, $resourceName, $resource);
    }

    /**
     * Magic method to intercept method calls and handle JWT Bearer authentication.
     *
     * @param string $name Method name
     * @param array $arguments Method arguments
     * @return mixed The decoded response body
     * @throws GoogleException
     */
    public function __call($name, $arguments)
    {
        // Handle batchUpdate with JWT Bearer authentication
        if ($name === 'batchUpdate') {
            return $this->batchUpdate(...$arguments);
        }

        // For other methods, use parent call() method
        return parent::call($name, $arguments);
    }

    /**
     * Batch update one-time products.
     *
     * @param string $packageName The package name of the application.
     * @param array|\Appning\Model $body Request body data. Can be an array or a Model object
     *                                  (e.g., Google\Service\AndroidPublisher\BatchUpdateOneTimeProductsRequest
     *                                  from google/apiclient-services).
     * @param array $jwtClaims Optional JWT claims to include in the token (iss and sub default to clientId from serviceAccount.json)
     * @param array $optParams Optional parameters
     * @return mixed The decoded response body
     * @throws GoogleException
     */
    private function batchUpdate($packageName, $body, $jwtClaims = [], $optParams = [])
    {
        // Validate packageName
        if (empty($packageName)) {
            throw new GoogleException('packageName is required');
        }

        // Generate JWT token with claims
        $token = $this->generateJwtToken($packageName, $jwtClaims);

        // Prepare parameters in the format expected by call()
        $params = [
            'packageName' => $packageName,
            'postBody' => $body,
        ];

        // Add optParams if provided
        if (!empty($optParams)) {
            $params = array_merge($params, $optParams);
        }

        // Get client from service
        $client = $this->service->getClient();

        // Use defer to get Request without executing
        $wasDeferred = $client->shouldDefer();
        $client->setDefer(true);

        try {
            // Call parent::call() which returns Request
            $request = parent::call('batchUpdate', [$params]);

            // Add JWT token to Authorization header
            $request = $request->withHeader('Authorization', 'Bearer ' . $token);

            // Execute request
            $client->setDefer($wasDeferred);
            return $client->execute($request);
        } catch (\Exception $e) {
            $client->setDefer($wasDeferred);
            throw $e;
        }
    }

    /**
     * Generate JWT token with claims.
     *
     * Uses clientId from serviceAccount.json for iss and sub when available.
     *
     * @param string $packageName The package name (fallback for iss/sub when clientId is not set)
     * @param array $jwtClaims Optional additional JWT claims
     * @return string The signed JWT token
     * @throws GoogleException
     */
    private function generateJwtToken($packageName, $jwtClaims = [])
    {
        $client = $this->service->getClient();
        $credentials = $client->getCredentials();

        if (!$credentials instanceof JwtBearerCredentials) {
            throw new GoogleException('JWT Bearer credentials are required. Use fromServiceAccountFile() to set credentials.');
        }

        // Use clientId from serviceAccount.json for iss and sub; fallback to packageName
        $issSub = $credentials->getClientId() ?? $client->getClientId() ?? $packageName;
        $claims = array_merge([
            'iss' => $issSub,
            'sub' => $issSub,
        ], $jwtClaims);

        return $credentials->generateToken($claims);
    }
}
