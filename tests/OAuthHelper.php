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
include_once 'bootstrap.php';
require_once 'Google/Client.php';

$client = new Google_Client();
$client->setScopes(
    array(
      "https://www.googleapis.com/auth/plus.me",
      "https://www.googleapis.com/auth/urlshortener",
      "https://www.googleapis.com/auth/tasks",
      "https://www.googleapis.com/auth/adsense",
      "https://www.googleapis.com/auth/youtube"
    )
);
$client->setRedirectUri("urn:ietf:wg:oauth:2.0:oob");
// Visit https://code.google.com/apis/console to
// generate your oauth2_client_id, oauth2_client_secret, and to
// register your oauth2_redirect_uri.
$client->setClientId("");
$client->setClientSecret("");

$authUrl = $client->createAuthUrl();

`open '$authUrl'`;
echo "\nPlease enter the auth code:\n";
$authCode = trim(fgets(STDIN));

$accessToken = $client->authenticate($authCode);

echo "\n", 'Add the following to BaseTest.php as the $token value:', "\n\n";
echo $accessToken, "\n\n";
