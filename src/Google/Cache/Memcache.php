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

use Google\Auth\CacheInterface;
use Psr\Log\LoggerInterface;

/**
 * A persistent storage class based on the memcache, which is not
 * really very persistent, as soon as you restart your memcache daemon
 * the storage will be wiped.
 *
 * Will use either the memcache or memcached extensions, preferring
 * memcached.
 *
 * @author Chris Chabot <chabotc@google.com>
 */
class Google_Cache_Memcache implements CacheInterface
{
  private $connection = false;
  private $mc = false;
  private $host;
  private $port;

  /**
   * @var use Psr\Log\LoggerInterface logger
   */
  private $logger;

  public function __construct($host = null, $port = null, LoggerInterface $logger = null)
  {
    $this->logger = $logger;

    if (!function_exists('memcache_connect') && !class_exists("Memcached")) {
      $error = "Memcache functions not available";

      $this->log('error', $error);
      throw new Google_Cache_Exception($error);
    }

    $this->host = $host;
    $this->port = $port;
  }

  /**
   * @inheritDoc
   */
  public function get($key, $expiration = false)
  {
    $this->connect();
    $ret = false;
    if ($this->mc) {
      $ret = $this->mc->get($key);
    } else {
      $ret = memcache_get($this->connection, $key);
    }
    if ($ret === false) {
      $this->log(
          'debug',
          'Memcache cache miss',
          array('key' => $key)
      );
      return false;
    }
    if (is_numeric($expiration) && (time() - $ret['time'] > $expiration)) {
      $this->log(
          'debug',
          'Memcache cache miss (expired)',
          array('key' => $key, 'var' => $ret)
      );
      $this->delete($key);
      return false;
    }

    $this->log(
        'debug',
        'Memcache cache hit',
        array('key' => $key, 'var' => $ret)
    );

    return $ret['data'];
  }

  /**
   * @inheritDoc
   * @param string $key
   * @param string $value
   * @throws Google_Cache_Exception
   */
  public function set($key, $value)
  {
    $this->connect();
    // we store it with the cache_time default expiration so objects will at
    // least get cleaned eventually.
    $data = array('time' => time(), 'data' => $value);
    $rc = false;
    if ($this->mc) {
      $rc = $this->mc->set($key, $data);
    } else {
      $rc = memcache_set($this->connection, $key, $data, false);
    }
    if ($rc == false) {
      $this->log(
          'error',
          'Memcache cache set failed',
          array('key' => $key, 'var' => $data)
      );

      throw new Google_Cache_Exception("Couldn't store data in cache");
    }

    $this->log(
        'debug',
        'Memcache cache set',
        array('key' => $key, 'var' => $data)
    );
  }

  /**
   * @inheritDoc
   * @param String $key
   */
  public function delete($key)
  {
    $this->connect();
    if ($this->mc) {
      $this->mc->delete($key, 0);
    } else {
      memcache_delete($this->connection, $key, 0);
    }

    $this->log(
        'debug',
        'Memcache cache delete',
        array('key' => $key)
    );
  }

  /**
   * Lazy initialiser for memcache connection. Uses pconnect for to take
   * advantage of the persistence pool where possible.
   */
  private function connect()
  {
    if ($this->connection) {
      return;
    }

    if (class_exists("Memcached")) {
      $this->mc = new Memcached();
      $this->mc->addServer($this->host, $this->port);
       $this->connection = true;
    } else {
      $this->connection = memcache_pconnect($this->host, $this->port);
    }

    if (! $this->connection) {
      $error = "Couldn't connect to memcache server";

      $this->log('error', $error);
      throw new Google_Cache_Exception($error);
    }
  }

  private function log($level, $message, $context = array())
  {
    if ($this->logger) {
      $this->logger->log($level, $message, $context);
    }
  }
}
