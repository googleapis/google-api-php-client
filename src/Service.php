<?php
/*
 * Copyright 2010 Google Inc.
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

namespace Google;

use Google\Http\Batch;
use Google\Http\BatchInterface;
use TypeError;

class Service implements ServiceInterface
{
    public $batchPath;
    /**
     * Only used in getBatch
     */
    public $rootUrl;
    public $rootUrlTemplate;
    public $version;
    public $servicePath;
    public $serviceName;
    public $availableScopes;
    public $resource;
    private $client;

    public function __construct($clientOrConfig = [])
    {
        if ($clientOrConfig instanceof GoogleClientInterface) {
            $this->client = $clientOrConfig;
        } elseif (is_array($clientOrConfig)) {
            $this->client = new Client($clientOrConfig ?: []);
        } else {
            $errorMessage = 'constructor must be array or instance of Google\Client';
            if (class_exists('TypeError')) {
                throw new TypeError($errorMessage);
            }
            trigger_error($errorMessage, E_USER_ERROR);
        }
    }

    /**
   * Return the associated Google\GoogleClientInterface class.
   * @return \Google\GoogleClientInterface
   */
    public function getClient()
    {
        return $this->client;
    }

    /**
   * Create a new HTTP Batch handler for this service
   *
   * @return BatchInterface
   */
    public function createBatch()
    {
        return new Batch(
            $this->client,
            false,
            $this->rootUrlTemplate ?? $this->rootUrl,
            $this->batchPath
        );
    }
}
