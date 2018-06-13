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

class Google_ModelTest extends BaseTest
{
  private $calendarData =  '{
         "kind": "calendar#event",
         "etag": "\"-kteSF26GsdKQ5bfmcd4H3_-u3g/MTE0NTUyNTAxOTk0MjAwMA\"",
         "id": "1234566",
         "status": "confirmed",
         "htmlLink": "https://www.google.com/calendar/event?eid=N",
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
       }';

  public function testIntentionalNulls()
  {
    $data = json_decode($this->calendarData, true);
    $event = new Google_Service_Calendar_Event($data);
    $obj = json_decode(json_encode($event->toSimpleObject()), true);
    $this->assertArrayHasKey('date', $obj['start']);
    $this->assertArrayNotHasKey('dateTime', $obj['start']);
    $date = new Google_Service_Calendar_EventDateTime();
    $date->setDate(Google_Model::NULL_VALUE);
    $event->setStart($date);
    $obj = json_decode(json_encode($event->toSimpleObject()), true);
    $this->assertNull($obj['start']['date']);
    $this->assertArrayHasKey('date', $obj['start']);
    $this->assertArrayNotHasKey('dateTime', $obj['start']);
  }
  public function testModelMutation()
  {
    $data = json_decode($this->calendarData, true);
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

  public function testVariantTypes()
  {
    $file = new Google_Service_Drive_DriveFile();
    $metadata = new Google_Service_Drive_DriveFileImageMediaMetadata();
    $metadata->setCameraMake('Pokémon Snap');
    $file->setImageMediaMetadata($metadata);
    $data = json_decode(json_encode($file->toSimpleObject()), true);
    $this->assertEquals('Pokémon Snap', $data['imageMediaMetadata']['cameraMake']);
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
    $this->assertFalse($data['publicG'][2]);
    $this->assertArrayNotHasKey("data", $data);
    $this->assertFalse($data['publicH']);
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

  public function testCollectionWithItemsFromConstructor()
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
         }',
        true
    );
    $collection = new Google_Service_Calendar_Events($data);
    $this->assertCount(4, $collection);
    $count = 0;
    foreach ($collection as $col) {
      $count++;
    }
    $this->assertEquals(4, $count);
    $this->assertEquals(1, $collection[0]->id);
  }

  public function testCollectionWithItemsFromSetter()
  {
    $data = json_decode(
        '{
           "kind": "calendar#events",
           "id": "1234566",
           "etag": "abcdef",
           "totalItems": 4
         }',
        true
    );
    $collection = new Google_Service_Calendar_Events($data);
    $collection->setItems([
      new Google_Service_Calendar_Event(['id' => 1]),
      new Google_Service_Calendar_Event(['id' => 2]),
      new Google_Service_Calendar_Event(['id' => 3]),
      new Google_Service_Calendar_Event(['id' => 4]),
    ]);
    $this->assertCount(4, $collection);
    $count = 0;
    foreach ($collection as $col) {
      $count++;
    }
    $this->assertEquals(4, $count);
    $this->assertEquals(1, $collection[0]->id);
  }

  public function testMapDataType()
  {
    $data = json_decode(
        '{
            "calendar": {
              "regular":  { "background": "#FFF", "foreground": "#000" },
              "inverted": { "background": "#000", "foreground": "#FFF" }
            }
         }',
        true
    );
    $collection = new Google_Service_Calendar_Colors($data);
    $this->assertCount(2, $collection->calendar);
    $this->assertTrue(isset($collection->calendar['regular']));
    $this->assertTrue(isset($collection->calendar['inverted']));
    $this->assertInstanceOf('Google_Service_Calendar_ColorDefinition', $collection->calendar['regular']);
    $this->assertEquals('#FFF', $collection->calendar['regular']->getBackground());
    $this->assertEquals('#FFF', $collection->calendar['inverted']->getForeground());
  }

  public function testPassingInstanceInConstructor()
  {
    $creator = new Google_Service_Calendar_EventCreator();
    $creator->setDisplayName('Brent Shaffer');
    $data = [
        "creator" => $creator
    ];
    $event = new Google_Service_Calendar_Event($data);
    $this->assertInstanceOf('Google_Service_Calendar_EventCreator', $event->getCreator());
    $this->assertEquals('Brent Shaffer', $event->creator->getDisplayName());
  }

  public function testPassingInstanceInConstructorForMap()
  {
    $regular = new Google_Service_Calendar_ColorDefinition();
    $regular->setBackground('#FFF');
    $regular->setForeground('#000');
    $data = [
        "calendar" => [
            "regular" =>  $regular,
            "inverted" => [ "background" => "#000", "foreground" => "#FFF" ],
        ]
    ];
    $collection = new Google_Service_Calendar_Colors($data);
    $this->assertCount(2, $collection->calendar);
    $this->assertTrue(isset($collection->calendar['regular']));
    $this->assertTrue(isset($collection->calendar['inverted']));
    $this->assertInstanceOf('Google_Service_Calendar_ColorDefinition', $collection->calendar['regular']);
    $this->assertEquals('#FFF', $collection->calendar['regular']->getBackground());
    $this->assertEquals('#FFF', $collection->calendar['inverted']->getForeground());
  }

  /**
   * @see https://github.com/google/google-api-php-client/issues/1308
   */
  public function testKeyTypePropertyConflict()
  {
    $data = [
        "duration" => 0,
        "durationType" => "unknown",
    ];
    $creativeAsset = new Google_Service_Dfareporting_CreativeAsset($data);
    $this->assertEquals(0, $creativeAsset->getDuration());
    $this->assertEquals('unknown', $creativeAsset->getDurationType());
  }
}
