<?php
/*
 * Copyright 2014 Google Inc.
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

/**
 * In-memory cache
 */
class Google_Cache_Callback implements CacheInterface
{
  /**
   * @var callback $callback
   */
  protected $callback;

  /**
   * @var Google\Auth\CacheInterface $cache
   */
  protected $cache;

  public function __construct(callable $callback = null, CacheInterface $cache = null)
  {
    $this->callback = $callback;

    if (is_null($cache)) {
      $cache = new Google_Cache_Memory;
    }

    $this->cache = $cache;
  }

  /**
   * @inheritDoc
   */
  public function get($key, $expiration = false)
  {
    return $this->cache->get($key, $expiration);
  }

  /**
   * @inheritDoc
   */
  public function set($key, $value)
  {
    // notify the callback
    if ($this->callback) {
      $func = $this->callback;
      $func($key, $value);
    }

    return $this->cache->set($key, $value);
  }

  /**
   * @inheritDoc
   * @param String $key
   */
  public function delete($key)
  {
    return $this->cache->delete($key);
  }
}
