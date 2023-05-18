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

echo pageHeader("File Upload - Uploading a simple file");

/*************************************************
 * Ensure you've downloaded your oauth credentials
 ************************************************/
if (!$oauth_credentials = getOAuthCredentialsFile()) {
    echo missingOAuth2CredentialsWarning();
    return;
}

/************************************************
 * The redirect URI is to the current page, e.g:
 * http://localhost:8080/simple-file-upload.php
 ************************************************/
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$client = new Google\Client();
$client->setAuthConfig($oauth_credentials);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$service = new Google\Service\Drive($client);

// add "?logout" to the URL to remove a token from the session
if (isset($_REQUEST['logout'])) {
    unset($_SESSION['upload_token']);
}

/************************************************
 * If we have a code back from the OAuth 2.0 flow,
 * we need to exchange that with the
 * Google\Client::fetchAccessTokenWithAuthCode()
 * function. We store the resultant access token
 * bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code'], $_SESSION['code_verifier']);
    $client->setAccessToken($token);

    // store in the session also
    $_SESSION['upload_token'] = $token;

    // redirect back to the example
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

// set the access token as part of the client
if (!empty($_SESSION['upload_token'])) {
    $client->setAccessToken($_SESSION['upload_token']);
    if ($client->isAccessTokenExpired()) {
        unset($_SESSION['upload_token']);
    }
} else {
    $_SESSION['code_verifier'] = $client->getOAuth2Service()->generateCodeVerifier();
    $authUrl = $client->createAuthUrl();
}

/************************************************
 * If we're signed in then lets try to upload our
 * file. For larger files, see fileupload.php.
 ************************************************/
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $client->getAccessToken()) {
    // We'll setup an empty 1MB file to upload.
    DEFINE("TESTFILE", 'testfile-small.txt');
    if (!file_exists(TESTFILE)) {
        $fh = fopen(TESTFILE, 'w');
        fseek($fh, 1024 * 1024);
        fwrite($fh, "!", 1);
        fclose($fh);
    }

    // This is uploading a file directly, with no metadata associated.
    $file = new Google\Service\Drive\DriveFile();
    $result = $service->files->create(
        $file,
        [
            'data' => file_get_contents(TESTFILE),
            'mimeType' => 'application/octet-stream',
            'uploadType' => 'media'
        ]
    );

    // Now lets try and send the metadata as well using multipart!
    $file = new Google\Service\Drive\DriveFile();
    $file->setName("Hello World!");
    $result2 = $service->files->create(
        $file,
        [
            'data' => file_get_contents(TESTFILE),
            'mimeType' => 'application/octet-stream',
            'uploadType' => 'multipart'
        ]
    );
}
?>

<div class="box">
<?php if (isset($authUrl)) : ?>
  <div class="request">
    <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
  </div>
<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
  <div class="shortened">
    <p>Your call was successful! Check your drive for the following files:</p>
    <ul>
      <li><a href="https://drive.google.com/open?id=<?= $result->id ?>" target="_blank"><?= $result->name ?></a></li>
      <li><a href="https://drive.google.com/open?id=<?= $result2->id ?>" target="_blank"><?= $result2->name ?></a></li>
    </ul>
  </div>
<?php else : ?>
  <form method="POST">
    <input type="submit" value="Click here to upload two small (1MB) test files" />
  </form>
<?php endif ?>
</div>

<?= pageFooter(__FILE__);
