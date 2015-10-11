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

use Google\Auth\CacheInterface;
use Psr\Log\LoggerInterface;

/**
 * A persistent storage class based on the APC cache, which is not
 * really very persistent, as soon as you restart your web server
 * the storage will be wiped, however for debugging and/or speed
 * it can be useful, and cache is a lot cheaper then storage.
 *
 * @author Chris Chabot <chabotc@google.com>
 */
class Google_Cache_Apc implements CacheInterface
{
  /**
   * @var Psr\Log\LoggerInterface logger
   */
  private $logger;

  public function __construct(LoggerInterface $logger = null)
  {
    $this->logger = $logger;

    if (! function_exists('apc_add') ) {
      $error = "Apc functions not available";

      $this->log('error', $error);
      throw new Google_Cache_Exception($error);
    }
  }

   /**
   * @inheritDoc
   */
  public function get($key, $expiration = false)
  {
    $ret = apc_fetch($key);
    if ($ret === false) {
      $this->log(
          'debug',
          'APC cache miss',
          array('key' => $key)
      );
      return false;
    }
    if (is_numeric($expiration) && (time() - $ret['time'] > $expiration)) {
      $this->log(
          'debug',
          'APC cache miss (expired)',
          array('key' => $key, 'var' => $ret)
      );
      $this->delete($key);
      return false;
    }

    $this->log(
        'debug',
        'APC cache hit',
        array('key' => $key, 'var' => $ret)
    );

    return $ret['data'];
  }

  /**
   * @inheritDoc
   */
  public function set($key, $value)
  {
    $var = array('time' => time(), 'data' => $value);
    $rc = apc_store($key, $var);

    if ($rc == false) {
      $this->log(
          'error',
          'APC cache set failed',
          array('key' => $key, 'var' => $var)
      );
      throw new Google_Cache_Exception("Couldn't store data");
    }

    $this->log(
        'debug',
        'APC cache set',
        array('key' => $key, 'var' => $var)
    );
  }

  /**
   * @inheritDoc
   * @param String $key
   */
  public function delete($key)
  {
    $this->log(
        'debug',
        'APC cache delete',
        array('key' => $key)
    );
    apc_delete($key);
  }

  private function log($level, $message, $context = array())
  {
    if ($this->logger) {
      $this->logger->log($level, $message, $context);
    }
  }
}
