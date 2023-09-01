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

namespace Google\Tests\Service;

use Google\Service\YouTube;
use Google\Tests\BaseTest;

class YouTubeTest extends BaseTest
{
    /** @var YouTube */
    public $youtube;
    public function setUp(): void
    {
        $this->checkToken();
        $this->youtube = new YouTube($this->getClient());
    }

    public function testMissingFieldsAreNull()
    {
        $parts = "id,brandingSettings";
        $opts = ["mine" => true];
        $channels = $this->youtube->channels->listChannels($parts, $opts);

        $newChannel = new YouTube\Channel();
        $newChannel->setId($channels[0]->getId());
        $newChannel->setBrandingSettings($channels[0]->getBrandingSettings());

        $simpleOriginal = $channels[0]->toSimpleObject();
        $simpleNew = $newChannel->toSimpleObject();

        $this->assertObjectHasAttribute('etag', $simpleOriginal);
        $this->assertObjectNotHasAttribute('etag', $simpleNew);

        $owner_details = new YouTube\ChannelContentOwnerDetails();
        $owner_details->setTimeLinked("123456789");
        $o_channel = new YouTube\Channel();
        $o_channel->setContentOwnerDetails($owner_details);
        $simpleManual = $o_channel->toSimpleObject();
        $this->assertObjectHasAttribute('timeLinked', $simpleManual->contentOwnerDetails);
        $this->assertObjectNotHasAttribute('contentOwner', $simpleManual->contentOwnerDetails);

        $owner_details = new YouTube\ChannelContentOwnerDetails();
        $owner_details->timeLinked = "123456789";
        $o_channel = new YouTube\Channel();
        $o_channel->setContentOwnerDetails($owner_details);
        $simpleManual = $o_channel->toSimpleObject();

        $this->assertObjectHasAttribute('timeLinked', $simpleManual->contentOwnerDetails);
        $this->assertObjectNotHasAttribute('contentOwner', $simpleManual->contentOwnerDetails);

        $owner_details = new YouTube\ChannelContentOwnerDetails();
        $owner_details['timeLinked'] = "123456789";
        $o_channel = new YouTube\Channel();
        $o_channel->setContentOwnerDetails($owner_details);
        $simpleManual = $o_channel->toSimpleObject();

        $this->assertObjectHasAttribute('timeLinked', $simpleManual->contentOwnerDetails);
        $this->assertObjectNotHasAttribute('contentOwner', $simpleManual->contentOwnerDetails);

        $ping = new YouTube\ChannelConversionPing();
        $ping->setContext("hello");
        $pings = new YouTube\ChannelConversionPings();
        $pings->setPings([$ping]);
        $simplePings = $pings->toSimpleObject();
        $this->assertObjectHasAttribute('context', $simplePings->pings[0]);
        $this->assertObjectNotHasAttribute('conversionUrl', $simplePings->pings[0]);
    }
}
