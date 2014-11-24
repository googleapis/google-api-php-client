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

class YouTubeTest extends BaseTest
{
  /** @var Google_PlusService */
  public $plus;
  public function __construct()
  {
    parent::__construct();
    $this->youtube = new Google_Service_YouTube($this->getClient());
  }

  public function testMissingFieldsAreNull()
  {
    if (!$this->checkToken()) {
      return;
    }

    $parts = "id,brandingSettings";
    $opts = array("mine" => true);
    $channels = $this->youtube->channels->listChannels($parts, $opts);

    $newChannel = new Google_Service_YouTube_Channel();
    $newChannel->setId($channels[0]->getId());
    $newChannel->setBrandingSettings($channels[0]->getBrandingSettings());

    $simpleOriginal = $channels[0]->toSimpleObject();
    $simpleNew = $newChannel->toSimpleObject();

    $this->assertObjectHasAttribute('etag', $simpleOriginal);
    $this->assertObjectNotHasAttribute('etag', $simpleNew);

    $owner_details = new Google_Service_YouTube_ChannelContentOwnerDetails();
    $owner_details->setTimeLinked("123456789");
    $o_channel = new Google_Service_YouTube_Channel();
    $o_channel->setContentOwnerDetails($owner_details);
    $simpleManual = $o_channel->toSimpleObject();
    $this->assertObjectHasAttribute('timeLinked', $simpleManual->contentOwnerDetails);
    $this->assertObjectNotHasAttribute('contentOwner', $simpleManual->contentOwnerDetails);

    $owner_details = new Google_Service_YouTube_ChannelContentOwnerDetails();
    $owner_details->timeLinked = "123456789";
    $o_channel = new Google_Service_YouTube_Channel();
    $o_channel->setContentOwnerDetails($owner_details);
    $simpleManual = $o_channel->toSimpleObject();

    $this->assertObjectHasAttribute('timeLinked', $simpleManual->contentOwnerDetails);
    $this->assertObjectNotHasAttribute('contentOwner', $simpleManual->contentOwnerDetails);

    $owner_details = new Google_Service_YouTube_ChannelContentOwnerDetails();
    $owner_details['timeLinked'] = "123456789";
    $o_channel = new Google_Service_YouTube_Channel();
    $o_channel->setContentOwnerDetails($owner_details);
    $simpleManual = $o_channel->toSimpleObject();

    $this->assertObjectHasAttribute('timeLinked', $simpleManual->contentOwnerDetails);
    $this->assertObjectNotHasAttribute('contentOwner', $simpleManual->contentOwnerDetails);

    $ping = new Google_Service_YouTube_ChannelConversionPing();
    $ping->setContext("hello");
    $pings = new Google_Service_YouTube_ChannelConversionPings();
    $pings->setPings(array($ping));
    $simplePings = $pings->toSimpleObject();
    $this->assertObjectHasAttribute('context', $simplePings->pings[0]);
    $this->assertObjectNotHasAttribute('conversionUrl', $simplePings->pings[0]);
  }
}
