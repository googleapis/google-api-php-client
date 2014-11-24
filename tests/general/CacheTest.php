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

class CacheTest extends BaseTest
{
  public function testFile()
  {
    $dir = sys_get_temp_dir() . '/google-api-php-client/tests';
    $client = $this->getClient();
    $client->setClassConfig(
        'Google_Cache_File',
        'directory',
        $dir
    );
    $cache = new Google_Cache_File($client);
    $cache->set('foo', 'bar');
    $this->assertEquals($cache->get('foo'), 'bar');

    $this->getSetDelete($cache);
  }

  /**
   * @requires extension Memcache
   */
  public function testNull()
  {
    $client = $this->getClient();
    $cache = new Google_Cache_Null($client);
    $client->setCache($cache);

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

  /**
   * @requires extension Memcache
   */
  public function testMemcache()
  {
    $client = $this->getClient();
    if (!$client->getClassConfig('Google_Cache_Memcache', 'host')) {
      $this->markTestSkipped('Test requires memcache host specified');
    }

    $cache = new Google_Cache_Memcache($client);

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
    $client = $this->getClient();
    $cache = new Google_Cache_Apc($client);

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
