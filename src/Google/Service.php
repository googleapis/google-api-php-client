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

class Google_Service
{
  public $batchPath;
  public $rootUrl;
  public $version;
  public $servicePath;
  public $availableScopes;
  public $resource;
  private $client;

  /**
   * @param Google_Client|array $clientOrConfig Optional
   */
  public function __construct($clientOrConfig = [])
  {
    if ($clientOrConfig instanceof Google_Client) {
      $this->client = $clientOrConfig;
    } elseif (is_array($clientOrConfig)) {
      $this->client = new Google_Client($clientOrConfig ?: []);
    } else {
      $errorMessage = 'constructor must be array or instance of Google_Client';
      if (class_exists('TypeError')) {
        throw new TypeError($errorMessage);
      }
      trigger_error($errorMessage, E_USER_ERROR);
    }
  }

  /**
   * Return the associated Google_Client class.
   * @return Google_Client
   */
  public function getClient()
  {
    return $this->client;
  }

  /**
   * Create a new HTTP Batch handler for this service
   *
   * @return Google_Http_Batch
   */
  public function createBatch()
  {
    return new Google_Http_Batch(
        $this->client,
        false,
        $this->rootUrl,
        $this->batchPath
    );
  }
}
