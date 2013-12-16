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

class ApiModelTest extends BaseTest {
  public function testJsonStructure() {
    $model = new Google_Model();
    $model->publicA = "This is a string";
    $model2 = new Google_Model();
    $model2->publicC = 12345;
    $model2->publicD = null;
    $model->publicB = $model2;
    $string = json_encode($model->toSimpleObject());
    $data = json_decode($string, true);
    $this->assertEquals(12345, $data['publicB']['publicC']);
    $this->assertEquals("This is a string", $data['publicA']);
    $this->assertArrayNotHasKey("publicD", $data['publicB']);
    $this->assertArrayNotHasKey("data", $data);
  }
}
