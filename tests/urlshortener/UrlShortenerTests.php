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

class UrlShortenerTests extends BaseTest
{
  /** @var Google_UrlshortenerService */
  public $service;

  public function __construct()
  {
    parent::__construct();
    $this->service = new Google_Service_Urlshortener($this->getClient());
  }

  public function testUrlShort()
  {
    $url = new Google_Service_Urlshortener_Url();
    $url->longUrl = "http://google.com";

    $shortUrl = $this->service->url->insert($url);
    $this->assertEquals('urlshortener#url', $shortUrl['kind']);
    $this->assertEquals('http://google.com/', $shortUrl['longUrl']);
  }

  public function testEmptyJsonResponse()
  {
    $optParams = array('fields' => '');
    $resp = $this->service->url->get('http://goo.gl/KkHq8', $optParams);

    $this->assertEquals("", $resp->longUrl);
  }
}
