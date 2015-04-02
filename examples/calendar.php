<?php
session_start();
/*
 * Copyright 2015 Google Inc.
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
 *
 * added: 4/2/2015
 * James Ransom (Created this example, calendar.php)
 * ransom1538@gmail.com
 * http://www.jamesransom.net
 */

include_once "templates/base.php";
echo pageHeader("Calendar API Access");


require_once realpath(dirname(__FILE__) . '/../src/Google/autoload.php');

ini_set("display_errors", 1);

//Get the client id from google console:
//https://code.google.com/apis/console/?noredirect  under Api Access
$client_id = '<YOUR_CLIENT_ID>';

assert($client_id != "<YOUR_CLIENT_ID>");

//Get the client_secret from google console:
//https://code.google.com/apis/console/?noredirect  under Api Access, create an
//App under "Client ID for web applications" and you will see "Client secret:" appear.
$client_secret = '<YOUR_SECRET>';

$client = new Google_Client();
$client->setApplicationName("Events");
$client->setClientId($client_id);

$client->setClientSecret($client_secret);

/**
 * The redirect url must match what you have in Google Developer console. !important!
 */
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);


/**
 * This next section is important to understand:
 * Great blog on scopes: http://googleappsdeveloper.blogspot.com.es/2012/01/tips-on-using-apis-discovery-service.html
 * Listing all scopes: https://www.googleapis.com/discovery/v1/apis/
 * Below I am asking for access to their email and calendar and profile,
 * without this, you will get a permission error
 */
$client->setScopes(array(
    'https://www.googleapis.com/auth/userinfo.email',
    'https://www.googleapis.com/auth/calendar',
    'https://www.googleapis.com/auth/userinfo.profile')
    );


$service = new Google_Service_Calendar($client);

if (isset($_GET['logout'])) {
    echo "<br>Logging out";
    unset($_SESSION['token']);
}

if (isset($_GET['code']))
{
    echo "<br>Google code from URI: ".$_GET['code'];
    $client->authenticate($_GET['code']);
    $_SESSION['token'] = $client->getAccessToken();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
    echo "<br>Token = ".$_SESSION['token'];
}

if (isset($_SESSION['token']))
{
    echo "<br>Able to get token: " . strlen($_SESSION['token']). "chars";
    $client->setAccessToken($_SESSION['token']);
}

//Check if loggedin,
if ($client->getAccessToken()){

    $calendarList = $service->calendarList->listCalendarList();
    echo "<h3>Google Calendar Return:</h3><pre class='code'>";

    /**
     * Next section from: https://developers.google.com/google-apps/calendar/v3/reference/calendarList/list
     *
     */
    while(true) {
        foreach ($calendarList->getItems() as $calendarListEntry) {
            echo "<br>". $calendarListEntry->getSummary();
        }
        $pageToken = $calendarList->getNextPageToken();
        if ($pageToken) {
            $optParams = array('pageToken' => $pageToken);
            $calendarList = $service->calendarList->listCalendarList($optParams);
        } else {
            break;
        }
    }
    echo "</pre>";

    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    echo "<br><a href=$url?logout>Logout</a><br>";

}
//Was not logged in
else
{
    $authUrl = $client->createAuthUrl();
    echo "<hr><a href='$authUrl'>Log In</a>";
}

echo pageFooter(__FILE__);
