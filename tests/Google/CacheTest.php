<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class Google_CacheTest extends BaseTest
{
  public function testFile()
  {
    $dir = sys_get_temp_dir() . '/google-api-php-client/tests';
    $cache = new Google_Cache_File($dir);
    $cache->set('foo', 'bar');
    $this->assertEquals($cache->get('foo'), 'bar');

    $this->getSetDelete($cache);
  }

  public function testFileWithTrailingSlash()
  {
    $dir = sys_get_temp_dir() . '/google-api-php-client/tests/';
    $cache = new Google_Cache_File($dir);
    $cache->set('foo', 'bar');
    $this->assertEquals($cache->get('foo'), 'bar');

    $this->getSetDelete($cache);
  }

  public function testBaseCacheDirectoryPermissions()
  {
    $dir = sys_get_temp_dir() . '/google-api-php-client/tests/' . rand();
    $cache = new Google_Cache_File($dir);
    $cache->set('foo', 'bar');

    $method = new ReflectionMethod($cache, 'getWriteableCacheFile');
    $method->setAccessible(true);
    $filename = $method->invoke($cache, 'foo');
    $stat = stat($dir);

    $this->assertEquals(0777 & ~umask(), $stat['mode'] & 0777);
  }

  public function testCacheDirectoryPermissions()
  {
    $dir = sys_get_temp_dir() . '/google-api-php-client/tests/' . rand();
    $cache = new Google_Cache_File($dir);
    $cache->set('foo', 'bar');

    $method = new ReflectionMethod($cache, 'getWriteableCacheFile');
    $method->setAccessible(true);
    $filename = $method->invoke($cache, 'foo');
    $stat = stat(dirname($filename));

    $this->assertEquals(0700, $stat['mode'] & 0777);
  }

  public function testCacheFilePermissions()
  {
    $dir = sys_get_temp_dir() . '/google-api-php-client/tests/';
    $cache = new Google_Cache_File($dir);
    $cache->set('foo', 'bar');

    $method = new ReflectionMethod($cache, 'getWriteableCacheFile');
    $method->setAccessible(true);
    $filename = $method->invoke($cache, 'foo');
    $stat = stat($filename);

    $this->assertEquals(0600, $stat['mode'] & 0777);
  }

  public function testNull()
  {
    $cache = new Google_Cache_Null();
    $cache->set('foo', 'bar');
    $cache->delete('foo');
    $this->assertEquals(false, $cache->get('foo'));

    $cache->set('foo.1', 'bar.1');
    $this->assertEquals($cache->get('foo.1'), false);

    $cache->set('foo', 'baz');
    $this->assertEquals($cache->get('foo'), false);

    $cache->set('foo', null);
    $cache->delete('foo');
    $this->assertEquals($cache->get('foo'), false);
  }

  public function testMemory()
  {
    $cache = new Google_Cache_Memory();
    $cache->set('foo', 'bar');
    $cache->delete('foo');
    $this->assertEquals(false, $cache->get('foo'));

    $cache->set('foo.1', 'bar.1');
    $this->assertEquals($cache->get('foo.1'), 'bar.1');

    $cache->set('foo', 'baz');
    $this->assertEquals($cache->get('foo'), 'baz');

    $cache->delete('foo');
    $this->assertEquals($cache->get('foo'), false);
  }

  /**
   * @requires extension Memcache
   */
  public function testMemcache()
  {
    $host = getenv('MEMCACHE_HOST') ? getenv('MEMCACHE_HOST') : null;
    $port = getenv('MEMCACHE_PORT') ? getenv('MEMCACHE_PORT') : null;
    if (!($host && $port)) {
      $this->markTestSkipped('Test requires memcache host and port specified');
    }

    $cache = new Google_Cache_Memcache($host, $port);

    $this->getSetDelete($cache);
  }

  /**
   * @requires extension APC
   */
  public function testAPC()
  {
    if (!ini_get('apc.enable_cli')) {
      $this->markTestSkipped('Test requires APC enabled for CLI');
    }
    $cache = new Google_Cache_Apc();

    $this->getSetDelete($cache);
  }

  public function getSetDelete($cache)
  {
    $cache->set('foo', 'bar');
    $cache->delete('foo');
    $this->assertEquals(false, $cache->get('foo'));

    $cache->set('foo.1', 'bar.1');
    $cache->delete('foo.1');
    $this->assertEquals($cache->get('foo.1'), false);

    $cache->set('foo', 'baz');
    $cache->delete('foo');
    $this->assertEquals($cache->get('foo'), false);

    $cache->set('foo', null);
    $cache->delete('foo');
    $this->assertEquals($cache->get('foo'), false);

    $obj = new stdClass();
    $obj->foo = 'bar';
    $cache->set('foo', $obj);
    $cache->delete('foo');
    $this->assertEquals($cache->get('foo'), false);

    $cache->set('foo.1', 'bar.1');
    $this->assertEquals($cache->get('foo.1'), 'bar.1');

    $cache->set('foo', 'baz');
    $this->assertEquals($cache->get('foo'), 'baz');

    $cache->set('foo', null);
    $this->assertEquals($cache->get('foo'), null);

    $cache->set('1/2/3', 'bar');
    $this->assertEquals($cache->get('1/2/3'), 'bar');

    $obj = new stdClass();
    $obj->foo = 'bar';
    $cache->set('foo', $obj);
    $this->assertEquals($cache->get('foo'), $obj);
  }
}
