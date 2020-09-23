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

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class TestModel extends Google_Model
{
  public function mapTypes($array)
  {
    return parent::mapTypes($array);
  }

  public function isAssociativeArray($array)
  {
    return parent::isAssociativeArray($array);
  }
}

class TestService extends Google_Service
{
  public $batchPath = 'batch/test';
}

class Google_ServiceTest extends TestCase
{
  public function testCreateBatch()
  {
    $response = $this->prophesize('Psr\Http\Message\ResponseInterface');
    $client = $this->prophesize('Google_Client');

    $client->execute(Argument::allOf(
      Argument::type('Psr\Http\Message\RequestInterface'),
      Argument::that(function ($request) {
        $this->assertEquals('/batch/test', $request->getRequestTarget());
        return $request;
      })
    ), Argument::any())->willReturn($response->reveal());

    $client->getConfig('base_path')->willReturn('');

    $model = new TestService($client->reveal());
    $batch = $model->createBatch();
    $this->assertInstanceOf('Google_Http_Batch', $batch);
    $batch->execute();
  }

  public function testModel()
  {
    $model = new TestModel();

    $model->mapTypes(
        array(
          'name' => 'asdf',
          'gender' => 'z',
        )
    );
    $this->assertEquals('asdf', $model->name);
    $this->assertEquals('z', $model->gender);
    $model->mapTypes(
        array(
          '__infoType' => 'Google_Model',
          '__infoDataType' => 'map',
          'info' => array (
            'location' => 'mars',
            'timezone' => 'mst',
          ),
          'name' => 'asdf',
          'gender' => 'z',
        )
    );
    $this->assertEquals('asdf', $model->name);
    $this->assertEquals('z', $model->gender);

    $this->assertFalse($model->isAssociativeArray(""));
    $this->assertFalse($model->isAssociativeArray(false));
    $this->assertFalse($model->isAssociativeArray(null));
    $this->assertFalse($model->isAssociativeArray(array()));
    $this->assertFalse($model->isAssociativeArray(array(1, 2)));
    $this->assertFalse($model->isAssociativeArray(array(1 => 2)));

    $this->assertTrue($model->isAssociativeArray(array('test' => 'a')));
    $this->assertTrue($model->isAssociativeArray(array("a", "b" => 2)));
  }

  /**
   * @dataProvider serviceProvider
   */
  public function testIncludes($class)
  {
    $this->assertTrue(
        class_exists($class),
        sprintf('Failed asserting class %s exists.', $class)
    );
  }

  public function serviceProvider()
  {
    $classes = array();
    $path = dirname(dirname(__DIR__)) . '/src/Google/Service';
    foreach (glob($path . "/*.php") as $file) {
      $classes[] = array('Google_Service_' . basename($file, '.php'));
    }

    return $classes;
  }

  public function testConfigConstructor()
  {
    $clientId = 'test-client-id';
    $service = new TestService(['client_id' => $clientId]);
    $this->assertEquals($clientId, $service->getClient()->getClientId());
  }

  public function testNoConstructor()
  {
    $service = new TestService();
    $this->assertInstanceOf('Google_Client', $service->getClient());
  }

  public function testInvalidConstructorPhp7Plus()
  {
    if (!class_exists('TypeError')) {
      $this->markTestSkipped('PHP 7+ only');
    }

    try {
      $service = new TestService('foo');
    } catch (TypeError $e) {}

    $this->assertInstanceOf('TypeError', $e);
    $this->assertEquals(
      'constructor must be array or instance of Google_Client',
      $e->getMessage()
    );
  }

  private static $errorMessage;

  /** @runInSeparateProcess */
  public function testInvalidConstructorPhp5()
  {
    if (class_exists('TypeError')) {
      $this->markTestSkipped('PHP 5 only');
    }

    set_error_handler('Google_ServiceTest::handlePhp5Error');

    $service = new TestService('foo');

    $this->assertEquals(
      'constructor must be array or instance of Google_Client',
      self::$errorMessage
    );
  }

  public static function handlePhp5Error($errno, $errstr, $errfile, $errline)
  {
    self::assertEquals(E_USER_ERROR, $errno);
    self::$errorMessage = $errstr;
    return true;
  }
}
