<?php
/*
 * Copyright 2013 Google Inc.
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
session_start();
include_once "templates/base.php";

/************************************************
  Make an API request authenticated via the 
  AppIdentity service on AppEngine.
 ************************************************/
require_once realpath(dirname(__FILE__) . '/../src/Google/autoload.php');

echo pageHeader("AppIdentity Account Access");

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");

$auth = new Google_Auth_AppIdentity($client);
$token = $auth->authenticateForScope(Google_Service_Storage::DEVSTORAGE_READ_ONLY);
if (!$token) {
  die("Could not authenticate to AppIdentity service");
}
$client->setAuth($auth);

$service = new Google_Service_Storage($client);
$results = $service->buckets->listBuckets(str_replace("s~", "", $_SERVER['APPLICATION_ID']));

echo "<h3>Results Of Call:</h3>";
echo "<pre>";
var_dump($results);
echo "</pre>";

echo pageFooter(__FILE__);
