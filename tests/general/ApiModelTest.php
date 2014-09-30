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
require_once 'Google/Service/AdExchangeBuyer.php';
require_once 'Google/Service/Calendar.php';

class ApiModelTest extends BaseTest
{
  public function testModelMutation()
  {
    $htmlLink = 'https://www.google.com/calendar/event?'
        . 'eid=NWdpMmFjNDkzbm5yZzh2N2poZXNhZmdldDggaWFuLmJhcmJlckBt';
    $data = json_decode(
        '{
           "kind": "calendar#event",
           "etag": "\"-kteSF26GsdKQ5bfmcd4H3_-u3g/MTE0NTUyNTAxOTk0MjAwMA\"",
           "id": "1234566",
           "status": "confirmed",
           "htmlLink": "' . $htmlLink . '",
           "created": "2006-04-13T14:22:08.000Z",
           "updated": "2006-04-20T09:23:39.942Z",
           "summary": "Evening Jolt Q3 CTFL",
           "description": "6.30 - Adminning\n9.30 - Game",
           "creator": {
             "email": "ian@example.com",
             "displayName": "Ian Test",
             "self": true
           },
           "organizer": {
             "email": "ian@example.com",
             "displayName": "Ian Test",
             "self": true
           },
           "start": {
             "date": "2006-04-23"
           },
           "end": {
             "date": "2006-04-24"
           },
           "iCalUID": "5gi2ac493nnrfdfd7jhesafget8@google.com",
           "sequence": 0,
           "reminders": {
             "useDefault": false
           }
         }',
        true
    );
    $event = new Google_Service_Calendar_Event($data);
    $date = new Google_Service_Calendar_EventDateTime();
    date_default_timezone_set('UTC');
    $dateString = Date("c");
    $summary = "hello";
    $date->setDate($dateString);
    $event->setStart($date);
    $event->setEnd($date);
    $event->setSummary($summary);
    $simpleEvent = $event->toSimpleObject();
    $this->assertEquals($dateString, $simpleEvent->start->date);
    $this->assertEquals($dateString, $simpleEvent->end->date);
    $this->assertEquals($summary, $simpleEvent->summary);

    $event2 = new Google_Service_Calendar_Event();
    $this->assertNull($event2->getStart());
  }

  public function testOddMappingNames()
  {
    $creative = new Google_Service_AdExchangeBuyer_Creative();
    $creative->setAccountId('12345');
    $creative->setBuyerCreativeId('12345');
    $creative->setAdvertiserName('Hi');
    $creative->setHTMLSnippet("<p>Foo!</p>");
    $creative->setClickThroughUrl(array('http://somedomain.com'));
    $creative->setWidth(100);
    $creative->setHeight(100);
    $data = json_decode(json_encode($creative->toSimpleObject()), true);
    $this->assertEquals($data['HTMLSnippet'], "<p>Foo!</p>");
    $this->assertEquals($data['width'], 100);
    $this->assertEquals($data['height'], 100);
    $this->assertEquals($data['accountId'], "12345");
  }

  public function testJsonStructure()
  {
    $model = new Google_Model();
    $model->publicA = "This is a string";
    $model2 = new Google_Model();
    $model2->publicC = 12345;
    $model2->publicD = null;
    $model->publicB = $model2;
    $model3 = new Google_Model();
    $model3->publicE = 54321;
    $model3->publicF = null;
    $model->publicG = array($model3, "hello", false);
    $model->publicH = false;
    $model->publicI = 0;
    $string = json_encode($model->toSimpleObject());
    $data = json_decode($string, true);
    $this->assertEquals(12345, $data['publicB']['publicC']);
    $this->assertEquals("This is a string", $data['publicA']);
    $this->assertArrayNotHasKey("publicD", $data['publicB']);
    $this->assertArrayHasKey("publicE", $data['publicG'][0]);
    $this->assertArrayNotHasKey("publicF", $data['publicG'][0]);
    $this->assertEquals("hello", $data['publicG'][1]);
    $this->assertEquals(false, $data['publicG'][2]);
    $this->assertArrayNotHasKey("data", $data);
    $this->assertEquals(false, $data['publicH']);
    $this->assertEquals(0, $data['publicI']);
  }

  public function testIssetPropertyOnModel()
  {
    $model = new Google_Model();
    $model['foo'] = 'bar';
    $this->assertTrue(isset($model->foo));
  }

  public function testUnsetPropertyOnModel()
  {
    $model = new Google_Model();
    $model['foo'] = 'bar';
    unset($model->foo);
    $this->assertFalse(isset($model->foo));
  }

  public function testCollection()
  {
    $data = json_decode(
        '{
           "kind": "calendar#events",
           "id": "1234566",
           "etag": "abcdef",
           "totalItems": 4,
           "items": [
              {"id": 1},
              {"id": 2},
              {"id": 3},
              {"id": 4}
           ]
         }', true);
    $collection = new Google_Service_Calendar_Events($data);
    $this->assertEquals(4, count($collection));
    $count = 0;
    foreach ($collection as $col) {
      $count++;
    }
    $this->assertEquals(4, $count);
    $this->assertEquals(1, $collection[0]->id);
  }
}
