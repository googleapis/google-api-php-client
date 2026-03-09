# OAuth 2.0 for Web Server Applications

This document describes OAuth 2.0 user authorization for web applications. **For the Android Publisher API with this library, authentication is done via JWT Bearer using a service account** — see [OAuth Server (service accounts)](oauth-server.md) and [Getting Started](start.md).

If you need to call Google APIs that require user consent (e.g. access to user data in a browser flow), the library supports the OAuth 2.0 web server flow.

## Prerequisites

- Enable the required APIs for your project in the [API Console](https://console.developers.google.com/apis/library).
- Create **OAuth 2.0 client credentials** (Web application) in the [Credentials page](https://console.developers.google.com/apis/credentials) and download `client_secret.json`.

## Basic flow

1. **Set authorization parameters** — Create an `Appning\Client`, load credentials, set scopes and redirect URI:

   ```php
   $client = new Appning\Client();
   $client->setAuthConfig('client_secret.json');
   $client->addScope('https://www.googleapis.com/auth/your-scope');
   $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
   $client->setAccessType('offline');
   ```

2. **Redirect the user** to the authorization URL:

   ```php
   $auth_url = $client->createAuthUrl();
   header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
   ```

3. **Handle the callback** — After the user grants or denies access, exchange the authorization code for tokens:

   ```php
   $client->fetchAccessTokenWithAuthCode($_GET['code']);
   $access_token = $client->getAccessToken();
   ```

4. **Call APIs** — Use the authorized client to build service objects and make requests (see [Getting Started](start.md)). For Android Publisher, use a service account and [oauth-server](oauth-server.md) instead.

For full details on parameters (scopes, `state`, `prompt`, incremental authorization, token refresh), see the [Google OAuth 2.0 documentation](https://developers.google.com/identity/protocols/oauth2).
