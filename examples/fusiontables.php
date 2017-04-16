<?php
/*
 * Copyright 2013 Daniel Klasson.
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

use Google_Service_Fusiontables;

$client_email = '<id>@developer.gserviceaccount.com';
$private_key = file_get_contents('<private key>.p12');
$scopes= array(
        'https://www.googleapis.com/auth/fusiontables',
        'https://www.googleapis.com/auth/fusiontables.readonly',
        );
$credentials = new Google_Auth_AssertionCredentials(
    $client_email,
    $scopes,
    $private_key
);

$client = new Google_Client();
$client->setAssertionCredentials($credentials);
if ($client->getAuth()->isAccessTokenExpired()) {
  $client->getAuth()->refreshTokenWithAssertion();
}

$service = new Google_Service_Fusiontables($client);
$result = $service->query->sql('SELECT <column> FROM <table id>');
var_dump($result);

