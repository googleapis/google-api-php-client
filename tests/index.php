<?php

/**
 * This file fields the OAuth2 authorization callback,
 * and exchanges the auth code for an access token.
 * Responses are logged to a specified OAUTH_LOG_FILE
 */
require_once __DIR__ . '/bootstrap.php';

$test = new BaseTest();
$client = $test->getClient();
$logFile = getenv('OAUTH_LOG_FILE');

if (isset($_GET['code'])) {
    if ($accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code'])) {
        // save accessToken to log file
        error_log(json_encode($accessToken), 3, $logFile);

        // redirect to auth success page
        if (isset($accessToken['access_token'])) {
            header('Location: https://cloud.google.com/sdk/auth_success');
        }

        exit;
    }
}

// request not successful
error_log('1', 3, $logFile);