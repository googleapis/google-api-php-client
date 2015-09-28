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

class Google_Http_PoolTest extends BaseTest
{
  public $parallel;
  public $plus;

  public function setUp()
  {
    $this->checkToken();
    $client = $this->getClient();
    $client->setUseBatch(true);
    $this->parallel = new Google_Http_Pool($client);
    $this->plus = new Google_Service_Plus($client);
  }

  public function testParallelRequestWithAuth()
  {
    $this->parallel->add($this->plus->people->get('me'), 'key1');
    $this->parallel->add($this->plus->people->get('me'), 'key2');
    $this->parallel->add($this->plus->people->get('me'), 'key3');

    $result = $this->parallel->execute();
    $this->assertTrue(isset($result['response-key1']));
    $this->assertTrue(isset($result['response-key2']));
    $this->assertTrue(isset($result['response-key3']));
    $this->assertInstanceOf('Google_Service_Plus_Person', $result['response-key1']);
    $this->assertInstanceOf('Google_Service_Plus_Person', $result['response-key2']);
    $this->assertInstanceOf('Google_Service_Plus_Person', $result['response-key3']);
  }

  public function testInvalidParallelRequest()
  {
    $this->parallel->add($this->plus->people->get('123456789987654321'), 'key1');
    $this->parallel->add($this->plus->people->get('+LarryPage'), 'key2');

    $result = $this->parallel->execute();
    $this->assertTrue(isset($result['response-key2']));
    $this->assertInstanceOf(
        'GuzzleHttp\Message\Response',
        $result['response-key1']
    );
    $this->assertEquals(404, $result['response-key1']->getStatusCode());
  }
}
