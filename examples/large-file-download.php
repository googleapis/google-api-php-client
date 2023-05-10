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

echo pageHeader("File Download - Downloading a large file");

/*************************************************
 * Ensure you've downloaded your oauth credentials
 ************************************************/
if (!$oauth_credentials = getOAuthCredentialsFile()) {
    echo missingOAuth2CredentialsWarning();
    return;
}

/************************************************
 * The redirect URI is to the current page, e.g:
 * http://localhost:8080/large-file-download.php
 ************************************************/
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$client = new Google\Client();
$client->setAuthConfig($oauth_credentials);
$client->setRedirectUri($redirect_uri);
$client->addScope("https://www.googleapis.com/auth/drive");
$service = new Google\Service\Drive($client);

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
 * If we're signed in then lets try to download our
 * file.
 ************************************************/
if ($client->getAccessToken()) {
    // Check for "Big File" and include the file ID and size
    $files = $service->files->listFiles([
        'q' => "name='Big File'",
        'fields' => 'files(id,size)'
    ]);

    if (count($files) == 0) {
        echo "
      <h3 class='warn'>
        Before you can use this sample, you need to
        <a href='/large-file-upload.php'>upload a large file to Drive</a>.
      </h3>";
        return;
    }

    // If this is a POST, download the file
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Determine the file's size and ID
        $fileId = $files[0]->id;
        $fileSize = intval($files[0]->size);

        // Get the authorized Guzzle HTTP client
        $http = $client->authorize();

        // Open a file for writing
        $fp = fopen('Big File (downloaded)', 'w');

        // Download in 1 MB chunks
        $chunkSizeBytes = 1 * 1024 * 1024;
        $chunkStart = 0;

        // Iterate over each chunk and write it to our file
        while ($chunkStart < $fileSize) {
            $chunkEnd = $chunkStart + $chunkSizeBytes;
            $response = $http->request(
                'GET',
                sprintf('/drive/v3/files/%s', $fileId),
                [
                'query' => ['alt' => 'media'],
                'headers' => [
                'Range' => sprintf('bytes=%s-%s', $chunkStart, $chunkEnd)
                ]
                ]
            );
            $chunkStart = $chunkEnd + 1;
            fwrite($fp, $response->getBody()->getContents());
        }
        // close the file pointer
        fclose($fp);

        // redirect back to this example
        header('Location: ' . filter_var($redirect_uri . '?downloaded', FILTER_SANITIZE_URL));
    }
}
?>

<div class="box">
<?php if (isset($authUrl)) : ?>
  <div class="request">
    <a class='login' href='<?= $authUrl ?>'>Connect Me!</a>
  </div>
<?php elseif (isset($_GET['downloaded'])) : ?>
  <div class="shortened">
    <p>Your call was successful! Check your filesystem for the file:</p>
    <p><code><?= __DIR__ . DIRECTORY_SEPARATOR ?>Big File (downloaded)</code></p>
  </div>
<?php else : ?>
  <form method="POST">
    <input type="submit" value="Click here to download a large (20MB) test file" />
  </form>
<?php endif ?>
</div>

<?= pageFooter(__FILE__);
