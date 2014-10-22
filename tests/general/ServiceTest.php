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

require_once 'BaseTest.php';
require_once realpath(dirname(__FILE__) . '/../../autoload.php');

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

class ServiceTest extends BaseTest
{
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

    $this->assertEquals(false, $model->isAssociativeArray(""));
    $this->assertEquals(false, $model->isAssociativeArray(false));
    $this->assertEquals(false, $model->isAssociativeArray(null));
    $this->assertEquals(false, $model->isAssociativeArray(array()));
    $this->assertEquals(false, $model->isAssociativeArray(array(1, 2)));
    $this->assertEquals(false, $model->isAssociativeArray(array(1 => 2)));

    $this->assertEquals(true, $model->isAssociativeArray(array('test' => 'a')));
    $this->assertEquals(true, $model->isAssociativeArray(array("a", "b" => 2)));
  }

  public function testStrLen()
  {
    $this->assertEquals(0, Google_Utils::getStrLen(null));
    $this->assertEquals(0, Google_Utils::getStrLen(false));
    $this->assertEquals(0, Google_Utils::getStrLen(""));

    $this->assertEquals(1, Google_Utils::getStrLen(" "));
    $this->assertEquals(2, Google_Utils::getStrLen(" 1"));
    $this->assertEquals(7, Google_Utils::getStrLen("0a\\n\n\r\n"));
  }
}
