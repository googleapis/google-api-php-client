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

class Google_Http_RequestTest extends PHPUnit_Framework_TestCase
{
  
  public function testBaseComponentDefault()
  {
  	$request = new Google_Http_Request("https://api.example.com/base");
  	$this->assertEquals("https://api.example.com", $request->getBaseComponent());
  }

  public function testBaseComponentExplicitStripsSlashes()
  {
  	$request = new Google_Http_Request("https://api.example.com/base");
  	$request->setBaseComponent("https://other.example.com/");
  	$this->assertEquals("https://other.example.com", $request->getBaseComponent());
  }

  public function testBaseComponentWithPathExplicitStripsSlashes()
  {
  	$request = new Google_Http_Request("https://api.example.com/base");
  	$request->setBaseComponent("https://other.example.com/path/");
  	$this->assertEquals("https://other.example.com/path", $request->getBaseComponent());
  }

}
