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

class Google_Service_UrlshortenerTest extends BaseTest
{
  public function testUrlShort()
  {
    $this->checkKey();

    $service = new Google_Service_Urlshortener($this->getClient());
    $url = new Google_Service_Urlshortener_Url();
    $url->longUrl = "http://google.com";

    $shortUrl = $service->url->insert($url);
    $this->assertEquals('urlshortener#url', $shortUrl['kind']);
    $this->assertEquals('http://google.com/', $shortUrl['longUrl']);
  }

  public function testEmptyJsonResponse()
  {
    $this->checkKey();

    $service = new Google_Service_Urlshortener($this->getClient());

    $optParams = array('fields' => '');
    $resp = $service->url->get('http://goo.gl/KkHq8', $optParams);

    $this->assertEquals("", $resp->longUrl);
  }
}
