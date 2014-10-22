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
include_once "templates/base.php";
session_start();

require_once realpath(dirname(__FILE__) . '/../autoload.php');

/************************************************
  ATTENTION: Fill in these values! Make sure
  the redirect URI is to this page, e.g:
  http://localhost:8080/user-example.php
 ************************************************/
 $client_id = '<YOUR_CLIENT_ID>';
 $client_secret = '<YOUR_CLIENT_SECRET>';
 $redirect_uri = '<YOUR_REDIRECT_URI>';

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$client->addScope("https://www.googleapis.com/auth/youtube");

/************************************************
  We are going to create both YouTube and Drive
  services, and query both.
 ************************************************/
$yt_service = new Google_Service_YouTube($client);
$dr_service = new Google_Service_Drive($client);


/************************************************
  Boilerplate auth management - see
  user-example.php for details.
 ************************************************/
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
}
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

/************************************************
  If we're signed in, retrieve channels from YouTube
  and a list of files from Drive.
 ************************************************/
if ($client->getAccessToken()) {
  $_SESSION['access_token'] = $client->getAccessToken();

  $dr_results = $dr_service->files->listFiles(array('maxResults' => 10));

  $yt_channels = $yt_service->channels->listChannels('contentDetails', array("mine" => true));
  $likePlaylist = $yt_channels[0]->contentDetails->relatedPlaylists->likes;
  $yt_results = $yt_service->playlistItems->listPlaylistItems(
      "snippet",
      array("playlistId" => $likePlaylist)
  );
}

echo pageHeader("User Query - Multiple APIs");
if (
    $client_id == '<YOUR_CLIENT_ID>'
    || $client_secret == '<YOUR_CLIENT_SECRET>'
    || $redirect_uri == '<YOUR_REDIRECT_URI>') {
  echo missingClientSecretsWarning();
}
?>
<div class="box">
  <div class="request">
<?php 
if (isset($authUrl)) {
  echo "<a class='login' href='" . $authUrl . "'>Connect Me!</a>";
} else {
  echo "<h3>Results Of Drive List:</h3>";
  foreach ($dr_results as $item) {
    echo $item->title, "<br /> \n";
  }

  echo "<h3>Results Of YouTube Likes:</h3>";
  foreach ($yt_results as $item) {
    echo $item['snippet']['title'], "<br /> \n";
  }
} ?>
  </div>
</div>
<?php echo pageFooter(__FILE__);
