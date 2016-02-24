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
class Google_Cache_Memory implements CacheInterface
{
  protected $cache;

  /**
   * @inheritDoc
   */
  public function get($key, $expiration = false)
  {
    return isset($this->cache[$key]) ? $this->cache[$key] : false;
  }

  /**
   * @inheritDoc
   */
  public function set($key, $value)
  {
    $this->cache[$key] = $value;
  }

  /**
   * @inheritDoc
   * @param String $key
   */
  public function delete($key)
  {
    unset($this->cache[$key]);
  }
}
