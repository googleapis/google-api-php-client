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
  We'll setup an empty 1MB file to upload.
 ************************************************/
DEFINE("TESTFILE", 'testfile-small.txt');
if (true || !file_exists(TESTFILE)) {
  $fh = fopen(TESTFILE, 'w');
  fseek($fh, 1024 * 1024);
  fwrite($fh, "!", 1);
  fclose($fh);
}

/************************************************
  ATTENTION: Fill in these values! Make sure
  the redirect URI is to this page, e.g:
  http://localhost:8080/fileupload.php
 ************************************************/
$client_id = '<YOUR_CLIENT_ID>';
$client_secret = '<YOUR_CLIENT_SECRET>';
$redirect_uri = '<YOUR_REDIRECT_URI>';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$service = new Google_Service_Drive($client);

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['upload_token']);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['upload_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['upload_token']) && $_SESSION['upload_token']) {
  $client->setAccessToken($_SESSION['upload_token']);
  if ($client->isAccessTokenExpired()) {
    unset($_SESSION['upload_token']);
  }
} else {
  $authUrl = $client->createAuthUrl();
}

/************************************************
  If we're signed in then lets try to upload our
  file. For larger files, see fileupload.php.
 ************************************************/
if ($client->getAccessToken()) {
  // This is uploading a file directly, with no metadata associated.
  $file = new Google_Service_Drive_DriveFile();
  $result = $service->files->insert(
      $file,
      array(
        'data' => file_get_contents(TESTFILE),
        'mimeType' => 'application/octet-stream',
        'uploadType' => 'media'
      )
  );

  // Now lets try and send the metadata as well using multipart!
  $file = new Google_Service_Drive_DriveFile();
  $file->setTitle("Hello World!");
  $result2 = $service->files->insert(
      $file,
      array(
        'data' => file_get_contents(TESTFILE),
        'mimeType' => 'application/octet-stream',
        'uploadType' => 'multipart'
      )
  );
}

echo pageHeader("File Upload - Uploading a small file");
if (
    $client_id == '<YOUR_CLIENT_ID>'
    || $client_secret == '<YOUR_CLIENT_SECRET>'
    || $redirect_uri == '<YOUR_REDIRECT_URI>') {
  echo missingClientSecretsWarning();
}
?>
<div class="box">
  <div class="request">
    <?php if (isset($authUrl)): ?>
      <a class='login' href='<?php echo $authUrl; ?>'>Connect Me!</a>
    <?php endif; ?>
  </div>

  <?php if (isset($result) && $result): ?>
    <div class="shortened">
      <?php var_dump($result->title); ?>
      <?php var_dump($result2->title); ?>
    </div>
  <?php endif ?>
</div>
<?php
echo pageFooter(__FILE__);
