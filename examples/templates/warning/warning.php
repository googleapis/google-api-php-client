<?php
class Warning
{
  public static function missingApiKeyWarning()
  {
    $ret = "
      <h3 class='warn'>
        Warning: You need to set a Simple API Access key from the
        <a href='http://developers.google.com/console'>Google API console</a>
      </h3>";

    return $ret;
  }

  public static function  missingClientSecretsWarning()
  {
    $ret = "
      <h3 class='warn'>
        Warning: You need to set Client ID, Client Secret and Redirect URI from the
        <a href='http://developers.google.com/console'>Google API console</a>
      </h3>";

    return $ret;
  }

  public static function  missingServiceAccountDetailsWarning()
  {
    $ret = "
      <h3 class='warn'>
        Warning: You need download your Service Account Credentials JSON from the
        <a href='http://developers.google.com/console'>Google API console</a>.
      </h3>
      <p>
        Once downloaded, move them into the root directory of this repository and
        rename them 'service-account-credentials.json'.
      </p>
      <p>
        In your application, you should set the GOOGLE_APPLICATION_CREDENTIALS environment variable
        as the path to this file, but in the context of this example we will do this for you.
      </p>";

    return $ret;
  }

  public static function  missingOAuth2CredentialsWarning()
  {
    $ret = "
      <h3 class='warn'>
        Warning: You need to set the location of your OAuth2 Client Credentials from the
        <a href='http://developers.google.com/console'>Google API console</a>.
      </h3>
      <p>
        Once downloaded, move them into the root directory of this repository and
        rename them 'oauth-credentials.json'.
      </p>";

    return $ret;
  }

  public static function  invalidCsrfTokenWarning()
  {
    $ret = "
      <h3 class='warn'>
        The CSRF token is invalid, your session probably expired. Please refresh the page.
      </h3>";

    return $ret;
  }
}
