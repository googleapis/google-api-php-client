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

class PageSpeedTest extends BaseTest {
  public $service;
  public function __construct() {
    parent::__construct();
    $this->service = new Google_Service_Pagespeedonline($this->getClient());
  }

  public function testPageSpeed() {
    $this->checkToken();
    $psapi = $this->service->pagespeedapi;
    $result = $psapi->runpagespeed('http://code.google.com');
    $this->assertArrayHasKey('kind', $result);
    $this->assertArrayHasKey('id', $result);
    $this->assertArrayHasKey('responseCode', $result);
    $this->assertArrayHasKey('title', $result);
    $this->assertArrayHasKey('score', $result);
    $this->assertInstanceOf('Google_Service_Pagespeedonline_ResultPageStats', $result->pageStats);
    $this->assertArrayHasKey('minor', $result['version']);
  }
}
