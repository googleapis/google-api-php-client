<?php
/*
 * Copyright 2011 Google Inc.
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

require_once realpath(dirname(__FILE__) . '/../../autoload.php');

class AllPlusTests extends PHPUnit_Framework_TestSuite
{
  public static function suite()
  {
    $suite = new PHPUnit_Framework_TestSuite();
    $suite->setName('Google Plus API tests');
    $suite->addTestSuite('PlusTest');
    return $suite;
  }
}

class PlusTest extends BaseTest
{
  /** @var Google_PlusService */
  public $plus;
  public function __construct()
  {
    parent::__construct();
    $this->plus = new Google_Service_Plus($this->getClient());
  }

  public function testGetPerson()
  {
    $this->checkToken();
    $person = $this->plus->people->get("118051310819094153327");
    $this->assertArrayHasKey('kind', $person);
    $this->assertArrayHasKey('displayName', $person);
    $this->assertArrayHasKey('gender', $person);
    $this->assertArrayHasKey('id', $person);
  }

  public function testListActivities()
  {
    $this->checkToken();
    $activities = $this->plus->activities
        ->listActivities("118051310819094153327", "public");
    
    $this->assertArrayHasKey('kind', $activities);
    $this->assertGreaterThan(0, count($activities));
    
    // Test a variety of access methods.
    $this->assertItem($activities['items'][0]);
    $this->assertItem($activities[0]);
    foreach ($activities as $item) {
      $this->assertItem($item);
      break;
    }

    // Test deeper type transformations
    $this->assertGreaterThan(0, strlen($activities[0]->actor->displayName));
  }
  
  public function assertItem($item)
  {
    // assertArrayHasKey uses array_key_exists, which is not great:
    // it doesn't understand SPL ArrayAccess
    $this->assertTrue(isset($item['actor']));
    $this->assertInstanceOf('Google_Service_Plus_ActivityActor', $item->actor);
    $this->assertTrue(isset($item['actor']['displayName']));
    $this->assertTrue(isset($item['actor']->url));
    $this->assertTrue(isset($item['object']));
    $this->assertTrue(isset($item['access']));
    $this->assertTrue(isset($item['provider']));
  }
}
