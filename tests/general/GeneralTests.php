<?php
/*
 * Copyright 2010 Google Inc.
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

require_once "AuthTest.php";
require_once 'BaseTest.php';
require_once "CacheTest.php";
require_once "IoTest.php";
require_once "ServiceTest.php";
require_once "ApiModelTest.php";
require_once "AuthTest.php";
require_once "RestTest.php";
require_once "RequestTest.php";
require_once "ApiBatchRequestTest.php";
require_once "ApiClientTest.php";
require_once "ApiCacheParserTest.php";
require_once "ApiMediaFileUploadTest.php";
require_once "ApiOAuth2Test.php";
require_once "ServiceTest.php";
require_once "URITemplateTest.php";

class GeneralTests extends PHPUnit_Framework_TestSuite
{
  public static function suite()
  {
    $suite = new PHPUnit_Framework_TestSuite('Google API PHP Library core component tests');
    $suite->addTestSuite('AuthTest');
    $suite->addTestSuite('CacheTest');
    $suite->addTestSuite('IoTest');
    $suite->addTestSuite('ServiceTest');
    $suite->addTestSuite('ApiBatchRequestTest');
    $suite->addTestSuite('ApiClientTest');
    $suite->addTestSuite('ApiModelTest');
    $suite->addTestSuite('ApiOAuth2Test');
    $suite->addTestSuite('ApiCacheParserTest');
    $suite->addTestSuite('ApiMediaFileUploadTest');
    $suite->addTestSuite('RestTest');
    $suite->addTestSuite('RequestTest');
    $suite->addTestSuite('ServiceTest');
    $suite->addTestSuite('URITemplateTest');
    return $suite;
  }
}
