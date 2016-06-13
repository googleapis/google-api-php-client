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

include_once __DIR__ . '/../vendor/autoload.php';
include_once "templates/base.php";

echo pageHeader("User Query - Multiple APIs");


/*************************************************
 * Ensure you've downloaded your oauth credentials
 ************************************************/
if (!$oauth_credentials = getOAuthCredentialsFile()) {
  echo missingOAuth2CredentialsWarning();
  return;
}

/************************************************
 * The redirect URI is to the current page, e.g:
 * http://localhost:8080/multi-api.php
 ************************************************/
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$client = new Google_Client();
$client->setAuthConfig($oauth_credentials);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$client->addScope("https://www.googleapis.com/auth/youtube");

// add "?logout" to the URL to remove a token from the session
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['multi-api-token']);
}

/************************************************
 * If we have a code back from the OAuth 2.0 flow,
 * we need to exchange that with the
 * Google_Client::fetchAccessTokenWithAuthCode()
 * function. We store the resultant access token
 * bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);

  // store in the session also
  $_SESSION['multi-api-token'] = $token;

  // redirect back to the example
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

// set the access token as part of the client
if (!empty($_SESSION['multi-api-token'])) {
  $client->setAccessToken($_SESSION['multi-api-token']);
  if ($client->isAccessTokenExpired()) {
    unset($_SESSION['multi-api-token']);
  }
} else {
  $authUrl = $client->createAuthUrl();
}

/************************************************
  We are going to create both YouTube and Drive
  services, and query both.
 ************************************************/
$yt_service = new Google_Service_YouTube($client);
$dr_service = new Google_Service_Drive($client);

/************************************************
  If we're signed in, retrieve channels from YouTube
  and a list of files from Drive.
 ************************************************/
if ($client->getAccessToken()) {
  $_SESSION['multi-api-token'] = $client->getAccessToken();

  $dr_results = $dr_service->files->listFiles(array('pageSize' => 10));

  $yt_channels = $yt_service->channels->listChannels('contentDetails', array("mine" => true));
  $likePlaylist = $yt_channels[0]->contentDetails->relatedPlaylists->likes;
  $yt_results = $yt_service->playlistItems->listPlaylistItems(
      "snippet",
      array("playlistId" => $likePlaylist)
  );
}
?>

<div class="box">
  <div class="request">
<?php if (isset($authUrl)): ?>
  <a class="login" href="<?= $authUrl ?>">Connect Me!</a>
<?php else: ?>
  <h3>Results Of Drive List:</h3>
  <?php foreach ($dr_results as $item): ?>
    <?= $item->name ?><br />
  <?php endforeach ?>

  <h3>Results Of YouTube Likes:</h3>
  <?php foreach ($yt_results as $item): ?>
    <?= $item['snippet']['title'] ?><br />
  <?php endforeach ?>
<?php endif ?>
  </div>
</div>

<?= pageFooter(__FILE__) ?>
