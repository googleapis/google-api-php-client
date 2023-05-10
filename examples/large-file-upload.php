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

echo pageHeader("File Upload - Uploading a large file");

/*************************************************
 * Ensure you've downloaded your oauth credentials
 ************************************************/
if (!$oauth_credentials = getOAuthCredentialsFile()) {
    echo missingOAuth2CredentialsWarning();
    return;
}

/************************************************
 * The redirect URI is to the current page, e.g:
 * http://localhost:8080/large-file-upload.php
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
 * file.
 ************************************************/
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $client->getAccessToken()) {
    /************************************************
    * We'll setup an empty 20MB file to upload.
    ************************************************/
    DEFINE("TESTFILE", 'testfile.txt');
    if (!file_exists(TESTFILE)) {
        $fh = fopen(TESTFILE, 'w');
        fseek($fh, 1024*1024*20);
        fwrite($fh, "!", 1);
        fclose($fh);
    }

    $file = new Google\Service\Drive\DriveFile();
    $file->name = "Big File";
    $chunkSizeBytes = 1 * 1024 * 1024;

    // Call the API with the media upload, defer so it doesn't immediately return.
    $client->setDefer(true);
    $request = $service->files->create($file);

    // Create a media file upload to represent our upload process.
    $media = new Google\Http\MediaFileUpload(
        $client,
        $request,
        'text/plain',
        null,
        true,
        $chunkSizeBytes
    );
    $media->setFileSize(filesize(TESTFILE));

    // Upload the various chunks. $status will be false until the process is
    // complete.
    $status = false;
    $handle = fopen(TESTFILE, "rb");
    while (!$status && !feof($handle)) {
        // read until you get $chunkSizeBytes from TESTFILE
        // fread will never return more than 8192 bytes if the stream is read
        // buffered and it does not represent a plain file
        // An example of a read buffered file is when reading from a URL
        $chunk = readVideoChunk($handle, $chunkSizeBytes);
        $status = $media->nextChunk($chunk);
    }

    // The final value of $status will be the data from the API for the object
    // that has been uploaded.
    $result = false;
    if ($status != false) {
        $result = $status;
    }

    fclose($handle);
}

function readVideoChunk($handle, $chunkSize)
{
    $byteCount = 0;
    $giantChunk = "";
    while (!feof($handle)) {
        // fread will never return more than 8192 bytes if the stream is read
        // buffered and it does not represent a plain file
        $chunk = fread($handle, 8192);
        $byteCount += strlen($chunk);
        $giantChunk .= $chunk;
        if ($byteCount >= $chunkSize) {
            return $giantChunk;
        }
    }
    return $giantChunk;
}
?>

<div class="box">
<?php if (isset($authUrl)) : ?>
  <div class="request">
    <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
  </div>
<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
  <div class="shortened">
    <p>Your call was successful! Check your drive for this file:</p>
    <p><a href="https://drive.google.com/open?id=<?= $result->id ?>" target="_blank"><?= $result->name ?></a></p>
    <p>Now try <a href="/large-file-download.php">downloading a large file from Drive</a>.
  </div>
<?php else : ?>
  <form method="POST">
    <input type="submit" value="Click here to upload a large (20MB) test file" />
  </form>
<?php endif ?>
</div>

<?= pageFooter(__FILE__);
