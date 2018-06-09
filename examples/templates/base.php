<?php

/* Ad hoc functions to make the examples marginally prettier.*/
function isWebRequest()
{
  return isset($_SERVER['HTTP_USER_AGENT']);
}

function pageHeader($title)
{
  $ret = "<!doctype html>
  <html>
  <head>
    <title>" . $title . "</title>
    <link href='styles/style.css' rel='stylesheet' type='text/css' />
  </head>
  <body>\n";
  if ($_SERVER['PHP_SELF'] != "/index.php") {
    $ret .= "<p><a href='index.php'>Back</a></p>";
  }
  $ret .= "<header><h1>" . $title . "</h1></header>";

 // Start the session (for storing access tokens and things)
  if (!headers_sent()) {
    session_start();
  }

  return $ret;
}


function pageFooter($file = null)
{
  $ret = "";
  if ($file) {
    $ret .= "<h3>Code:</h3>";
    $ret .= "<pre class='code'>";
    $ret .= htmlspecialchars(file_get_contents($file));
    $ret .= "</pre>";
  }
  $ret .= "</html>";

  return $ret;
}

require_once('warning/warning.php');

function checkServiceAccountCredentialsFile()
{
  // service account creds
  $application_creds = __DIR__ . '/../../service-account-credentials.json';

  return file_exists($application_creds) ? $application_creds : false;
}

function getCsrfToken()
{
  if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
  }

  return $_SESSION['csrf_token'];
}

function validateCsrfToken()
{
  return isset($_REQUEST['csrf_token'])
      && isset($_SESSION['csrf_token'])
      && $_REQUEST['csrf_token'] === $_SESSION['csrf_token'];
}

function getOAuthCredentialsFile()
{
  // oauth2 creds
  $oauth_creds = __DIR__ . '/../../oauth-credentials.json';

  if (file_exists($oauth_creds)) {
    return $oauth_creds;
  }

  return false;
}

function setClientCredentialsFile($apiKey)
{
  $file = __DIR__ . '/../../tests/.apiKey';
  file_put_contents($file, $apiKey);
}


function getApiKey()
{
  $file = __DIR__ . '/../../tests/.apiKey';
  if (file_exists($file)) {
    return file_get_contents($file);
  }
}

function setApiKey($apiKey)
{
  $file = __DIR__ . '/../../tests/.apiKey';
  file_put_contents($file, $apiKey);
}
