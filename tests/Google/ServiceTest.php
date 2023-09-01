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

namespace Google\Tests;

use Google\Client;
use Google\Model;
use Google\Service;
use Google\Http\Batch;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Prophecy\PhpUnit\ProphecyTrait;

class TestModel extends Model
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

class TestService extends Service
{
    public $batchPath = 'batch/test';
}

class ServiceTest extends TestCase
{
    private static $errorMessage;

    use ProphecyTrait;

    public function testCreateBatch()
    {
        $body = $this->prophesize(StreamInterface::class);
        $body->__toString()->willReturn('');
        $response = $this->prophesize(ResponseInterface::class);
        $response->getHeaderLine('content-type')
            ->willReturn('');
        $response->getBody()
            ->willReturn($body->reveal());
        $client = $this->prophesize(Client::class);

        $client->execute(
            Argument::allOf(
                Argument::type(RequestInterface::class),
                Argument::that(
                    function ($request) {
                        $this->assertEquals('/batch/test', $request->getRequestTarget());
                        return $request;
                    }
                )
            ),
            Argument::any()
        )->willReturn($response->reveal());

        $client->getConfig('base_path')->willReturn('');

        $model = new TestService($client->reveal());
        $batch = $model->createBatch();
        $this->assertInstanceOf(Batch::class, $batch);
        $batch->execute();
    }

    public function testModel()
    {
        $model = new TestModel();

        $model->mapTypes([
            'name' => 'asdf',
            'gender' => 'z',
        ]);
        $this->assertEquals('asdf', $model->name);
        $this->assertEquals('z', $model->gender);
        $model->mapTypes([
            '__infoType' => 'Google_Model',
            '__infoDataType' => 'map',
            'info' =>  [
                'location' => 'mars',
                'timezone' => 'mst',
            ],
            'name' => 'asdf',
            'gender' => 'z',
        ]);
        $this->assertEquals('asdf', $model->name);
        $this->assertEquals('z', $model->gender);

        $this->assertFalse($model->isAssociativeArray(""));
        $this->assertFalse($model->isAssociativeArray(false));
        $this->assertFalse($model->isAssociativeArray(null));
        $this->assertFalse($model->isAssociativeArray([]));
        $this->assertFalse($model->isAssociativeArray([1, 2]));
        $this->assertFalse($model->isAssociativeArray([1 => 2]));

        $this->assertTrue($model->isAssociativeArray(['test' => 'a']));
        $this->assertTrue($model->isAssociativeArray(["a", "b" => 2]));
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
        $this->assertInstanceOf(Client::class, $service->getClient());
    }

    public function testInvalidConstructorPhp7Plus()
    {
        if (!class_exists('TypeError')) {
            $this->markTestSkipped('PHP 7+ only');
        }

        try {
            $service = new TestService('foo');
        } catch (\TypeError $e) {
        }

        $this->assertInstanceOf('TypeError', $e);
        $this->assertEquals(
            'constructor must be array or instance of Google\Client',
            $e->getMessage()
        );
    }

    /** @runInSeparateProcess */
    public function testInvalidConstructorPhp5()
    {
        if (class_exists('TypeError')) {
            $this->markTestSkipped('PHP 5 only');
        }

        set_error_handler('Google\Tests\ServiceTest::handlePhp5Error');

        $service = new TestService('foo');

        $this->assertEquals(
            'constructor must be array or instance of Google\Client',
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
