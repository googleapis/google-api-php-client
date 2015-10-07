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

class Google_ServiceTest extends PHPUnit_Framework_TestCase
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
    $path = dirname(dirname(dirname(__FILE__))) . '/src/Google/Service';
    foreach (glob($path . "/*.php") as $file) {
      $classes[] = array('Google_Service_' . basename($file, '.php'));
    }

    return $classes;
  }
}
