# Using OAuth 2.0 for Web Server Applications

This document explains how web server applications use the Google API Client Library for PHP to implement OAuth 2.0 authorization to access Google APIs. OAuth 2.0 allows users to share specific data with an application while keeping their usernames, passwords, and other information private. For example, an application can use OAuth 2.0 to obtain permission from users to store files in their Google Drives.

This OAuth 2.0 flow is specifically for user authorization. It is designed for applications that can store confidential information and maintain state. A properly authorized web server application can access an API while the user interacts with the application or after the user has left the application.

Web server applications frequently also use [service accounts](oauth-server.md) to authorize API requests, particularly when calling Cloud APIs to access project-based data rather than user-specific data. Web server applications can use service accounts in conjunction with user authorization.

## Prerequisites

### Enable APIs for your project

Any application that calls Google APIs needs to enable those APIs in the API Console. To enable the appropriate APIs for your project:

1.  Open the [Library](https://console.developers.google.com/apis/library) page in the API Console.
2.  Select the project associated with your application. Create a project if you do not have one already.
3.  Use the **Library** page to find each API that your application will use. Click on each API and enable it for your project.

### Create authorization credentials

Any application that uses OAuth 2.0 to access Google APIs must have authorization credentials that identify the application to Google's OAuth 2.0 server. The following steps explain how to create credentials for your project. Your applications can then use the credentials to access APIs that you have enabled for that project.

1.  Open the [Credentials page](https://console.developers.google.com/apis/credentials) in the API Console.
2.  Click **Create credentials > OAuth client ID**.
3.  Complete the form. Set the application type to `Web application`. Applications that use languages and frameworks like PHP, Java, Python, Ruby, and .NET must specify authorized **redirect URIs**. The redirect URIs are the endpoints to which the OAuth 2.0 server can send responses.  
      
    For testing, you can specify URIs that refer to the local machine, such as `http://localhost:8080`. With that in mind, please note that all of the examples in this document use `http://localhost:8080` as the redirect URI.  
      
    We recommend that you design your app's auth endpoints so that your application does not expose authorization codes to other resources on the page.

After creating your credentials, download the **client_secret.json** file from the API Console. Securely store the file in a location that only your application can access.

> **Important:** Do not store the **client_secret.json** file in a publicly-accessible location. In addition, if you share the source code to your application—for example, on GitHub—store the **client_secret.json** file outside of your source tree to avoid inadvertently sharing your client credentials.

### Identify access scopes

Scopes enable your application to only request access to the resources that it needs while also enabling users to control the amount of access that they grant to your application. Thus, there may be an inverse relationship between the number of scopes requested and the likelihood of obtaining user consent.

Before you start implementing OAuth 2.0 authorization, we recommend that you identify the scopes that your app will need permission to access.

We also recommend that your application request access to authorization scopes via an [incremental authorization](#incremental-authorization) process, in which your application requests access to user data in context. This best practice helps users to more easily understand why your application needs the access it is requesting.

The [OAuth 2.0 API Scopes](https://developers.google.com/identity/protocols/googlescopes) document contains a full list of scopes that you might use to access Google APIs.

> If your public application uses scopes that permit access to certain user data, it must pass review. If you see **unverified app** on the screen when testing your application, you must submit a verification request to remove it. Find out more about [unverified apps](https://support.google.com/cloud/answer/7454865) and get answers to [frequently asked questions about app verification](https://support.google.com/cloud/answer/9110914) in the Help Center.

### Language-specific requirements

To run any of the code samples in this document, you'll need a Google account, access to the Internet, and a web browser. If you are using one of the API client libraries, also see the language-specific requirements below.

To run the PHP code samples in this document, you'll need:

*   PHP 5.4 or greater with the command-line interface (CLI) and JSON extension installed.
*   The [Composer](https://getcomposer.org/) dependency management tool.
*   The Google APIs Client Library for PHP:
    ```sh
    php composer.phar require google/apiclient:^2.0
    ```
    
## Obtaining OAuth 2.0 access tokens

The following steps show how your application interacts with Google's OAuth 2.0 server to obtain a user's consent to perform an API request on the user's behalf. Your application must have that consent before it can execute a Google API request that requires user authorization.

The list below quickly summarizes these steps:

1.  Your application identifies the permissions it needs.
2.  Your application redirects the user to Google along with the list of requested permissions.
3.  The user decides whether to grant the permissions to your application.
4.  Your application finds out what the user decided.
5.  If the user granted the requested permissions, your application retrieves tokens needed to make API requests on the user's behalf.

### Step 1: Set authorization parameters

Your first step is to create the authorization request. That request sets parameters that identify your application and define the permissions that the user will be asked to grant to your application.

The code snippet below creates a `Google_Client()` object, which defines the parameters in the authorization request.

That object uses information from your **client_secret.json** file to identify your application. The object also identifies the scopes that your application is requesting permission to access and the URL to your application's auth endpoint, which will handle the response from Google's OAuth 2.0 server. Finally, the code sets the optional access_type and include_granted_scopes parameters.

For example, this code requests read-only, offline access to a user's Google Drive:

```php
$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
$client->setAccessType('offline');        // offline access
$client->setIncludeGrantedScopes(true);   // incremental auth
```

The request specifies the following information:

#### Parameters

##### `client_id`

**Required**. The client ID for your application. You can find this value in the [API Console](https://console.developers.google.com/). In PHP, call the `setAuthConfig` function to load authorization credentials from a **client_secret.json** file.

```php
$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
```

##### `redirect_uri`

**Required**. Determines where the API server redirects the user after the user completes the authorization flow. The value must exactly match one of the authorized redirect URIs for the OAuth 2.0 client, which you configured in the [API Console](https://console.developers.google.com/). If this value doesn't match an authorized URI, you will get a 'redirect_uri_mismatch' error. Note that the `http` or `https` scheme, case, and trailing slash ('`/`') must all match.  
  
To set this value in PHP, call the `setRedirectUri` function. Note that you must specify a valid redirect URI for your API Console project.

```php
$client->setRedirectUri('http://localhost:8080/oauth2callback.php');
```

##### `scope`

**Required**. A space-delimited list of scopes that identify the resources that your application could access on the user's behalf. These values inform the consent screen that Google displays to the user.  
  
Scopes enable your application to only request access to the resources that it needs while also enabling users to control the amount of access that they grant to your application. Thus, there is an inverse relationship between the number of scopes requested and the likelihood of obtaining user consent. To set this value in PHP, call the `addScope` function:

```php
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
```

The [OAuth 2.0 API Scopes](https://developers.google.com/identity/protocols/googlescopes) document provides a full list of scopes that you might use to access Google APIs.  
  
We recommend that your application request access to authorization scopes in context whenever possible. By requesting access to user data in context, via [incremental authorization](#Incremental-authorization), you help users to more easily understand why your application needs the access it is requesting.

##### `access_type`

**Recommended**. Indicates whether your application can refresh access tokens when the user is not present at the browser. Valid parameter values are `online`, which is the default value, and `offline`.  
  
Set the value to `offline` if your application needs to refresh access tokens when the user is not present at the browser. This is the method of refreshing access tokens described later in this document. This value instructs the Google authorization server to return a refresh token _and_ an access token the first time that your application exchanges an authorization code for tokens.  
  
To set this value in PHP, call the `setAccessType` function:

```php
$client->setAccessType('offline');
```

##### `state`

**Recommended**. Specifies any string value that your application uses to maintain state between your authorization request and the authorization server's response. The server returns the exact value that you send as a `name=value` pair in the hash (`#`) fragment of the `redirect_uri` after the user consents to or denies your application's access request.  
  
You can use this parameter for several purposes, such as directing the user to the correct resource in your application, sending nonces, and mitigating cross-site request forgery. Since your `redirect_uri` can be guessed, using a `state` value can increase your assurance that an incoming connection is the result of an authentication request. If you generate a random string or encode the hash of a cookie or another value that captures the client's state, you can validate the response to additionally ensure that the request and response originated in the same browser, providing protection against attacks such as cross-site request forgery. See the [OpenID Connect](https://developers.google.com/identity/protocols/OpenIDConnect#createxsrftoken) documentation for an example of how to create and confirm a `state` token.  
  
To set this value in PHP, call the `setState` function:

```php
$client->setState($sample_passthrough_value);
```

##### `include_granted_scopes`

**Optional**. Enables applications to use incremental authorization to request access to additional scopes in context. If you set this parameter's value to `true` and the authorization request is granted, then the new access token will also cover any scopes to which the user previously granted the application access. See the [incremental authorization](#Incremental-authorization) section for examples.  
  
To set this value in PHP, call the `setIncludeGrantedScopes` function:

```php
$client->setIncludeGrantedScopes(true);
```

##### `login_hint`

**Optional**. If your application knows which user is trying to authenticate, it can use this parameter to provide a hint to the Google Authentication Server. The server uses the hint to simplify the login flow either by prefilling the email field in the sign-in form or by selecting the appropriate multi-login session.  
  
Set the parameter value to an email address or `sub` identifier, which is equivalent to the user's Google ID.  
  
To set this value in PHP, call the `setLoginHint` function:

```php
$client->setLoginHint('timmerman@google.com');
```

##### `prompt`

**Optional**. A space-delimited, case-sensitive list of prompts to present the user. If you don't specify this parameter, the user will be prompted only the first time your app requests access.  
  
To set this value in PHP, call the `setApprovalPrompt` function:

```php
$client->setApprovalPrompt('consent');
```

Possible values are:

`none`

Do not display any authentication or consent screens. Must not be specified with other values.

`consent`

Prompt the user for consent.

`select_account`

Prompt the user to select an account.

### Step 2: Redirect to Google's OAuth 2.0 server

Redirect the user to Google's OAuth 2.0 server to initiate the authentication and authorization process. Typically, this occurs when your application first needs to access the user's data. In the case of [incremental authorization](#incremental-authorization), this step also occurs when your application first needs to access additional resources that it does not yet have permission to access.

1.  Generate a URL to request access from Google's OAuth 2.0 server:
    
    ```php
    $auth_url = $client->createAuthUrl();
    ```
    
2.  Redirect the user to `$auth_url`:
    
    ```php
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    ```    

Google's OAuth 2.0 server authenticates the user and obtains consent from the user for your application to access the requested scopes. The response is sent back to your application using the redirect URL you specified.

### Step 3: Google prompts user for consent

In this step, the user decides whether to grant your application the requested access. At this stage, Google displays a consent window that shows the name of your application and the Google API services that it is requesting permission to access with the user's authorization credentials. The user can then consent or refuse to grant access to your application.

Your application doesn't need to do anything at this stage as it waits for the response from Google's OAuth 2.0 server indicating whether the access was granted. That response is explained in the following step.

### Step 4: Handle the OAuth 2.0 server response

The OAuth 2.0 server responds to your application's access request by using the URL specified in the request.

If the user approves the access request, then the response contains an authorization code. If the user does not approve the request, the response contains an error message. The authorization code or error message that is returned to the web server appears on the query string, as shown below:

An error response:

    https://oauth2.example.com/auth?error=access_denied

An authorization code response:

    https://oauth2.example.com/auth?code=4/P7q7W91a-oMsCeLvIaQm6bTrgtp7

> **Important**: If your response endpoint renders an HTML page, any resources on that page will be able to see the authorization code in the URL. Scripts can read the URL directly, and the URL in the `Referer` HTTP header may be sent to any or all resources on the page.  
>
> Carefully consider whether you want to send authorization credentials to all resources on that page (especially third-party scripts such as social plugins and analytics). To avoid this issue, we recommend that the server first handle the request, then redirect to another URL that doesn't include the response parameters.

#### Sample OAuth 2.0 server response

You can test this flow by clicking on the following sample URL, which requests read-only access to view metadata for files in your Google Drive:

```
https://accounts.google.com/o/oauth2/v2/auth?
 scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fdrive.metadata.readonly&
 access_type=offline&
 include_granted_scopes=true&
 state=state_parameter_passthrough_value&
 redirect_uri=http%3A%2F%2Foauth2.example.com%2Fcallback&
 response_type=code&
 client_id=client_id
```

After completing the OAuth 2.0 flow, you should be redirected to `http://localhost/oauth2callback`, which will likely yield a `404 NOT FOUND` error unless your local machine serves a file at that address. The next step provides more detail about the information returned in the URI when the user is redirected back to your application.

### Step 5: Exchange authorization code for refresh and access tokens

After the web server receives the authorization code, it can exchange the authorization code for an access token.

To exchange an authorization code for an access token, use the `authenticate` method:

```php
$client->authenticate($_GET['code']);
```

You can retrieve the access token with the `getAccessToken` method:

```php
$access_token = $client->getAccessToken();
```

[](#top_of_page)Calling Google APIs
-----------------------------------

Use the access token to call Google APIs by completing the following steps:

1.  If you need to apply an access token to a new `Google_Client` object—for example, if you stored the access token in a user session—use the `setAccessToken` method:
    
    ```php
    $client->setAccessToken($access_token);
    ```
    
2.  Build a service object for the API that you want to call. You build a a service object by providing an authorized `Google_Client` object to the constructor for the API you want to call. For example, to call the Drive API:
    
    ```php
    $drive = new Google_Service_Drive($client);
    ```
    
3.  Make requests to the API service using the [interface provided by the service object](start.md). For example, to list the files in the authenticated user's Google Drive:
    
    ```php
    $files = $drive->files->listFiles(array())->getItems();
    ```    

[](#top_of_page)Complete example
--------------------------------

The following example prints a JSON-formatted list of files in a user's Google Drive after the user authenticates and gives consent for the application to access the user's Drive files.

To run this example:

1.  In the API Console, add the URL of the local machine to the list of redirect URLs. For example, add `http://localhost:8080`.
2.  Create a new directory and change to it. For example:
    
    ```sh
    mkdir ~/php-oauth2-example
    cd ~/php-oauth2-example
    ```
    
3.  Install the [Google API Client Library](https://github.com/google/google-api-php-client) for PHP using [Composer](https://getcomposer.org):
    
    ```sh
    composer require google/apiclient:^2.0
    ```
    
4.  Create the files `index.php` and `oauth2callback.php` with the content below.
5.  Run the example with a web server configured to serve PHP. If you use PHP 5.4 or newer, you can use PHP's built-in test web server:
    
    ```sh
    php -S localhost:8080 ~/php-oauth2-example
    ```    

#### index.php

```php
<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $drive = new Google_Service_Drive($client);
  $files = $drive->files->listFiles(array())->getItems();
  echo json_encode($files);
} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
```

#### oauth2callback.php

```php
<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfigFile('client_secrets.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);

if (! isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
```

## Incremental authorization

In the OAuth 2.0 protocol, your app requests authorization to access resources, which are identified by scopes. It is considered a best user-experience practice to request authorization for resources at the time you need them. To enable that practice, Google's authorization server supports incremental authorization. This feature lets you request scopes as they are needed and, if the user grants permission, add those scopes to your existing access token for that user.

For example, an app that lets people sample music tracks and create mixes might need very few resources at sign-in time, perhaps nothing more than the name of the person signing in. However, saving a completed mix would require access to their Google Drive. Most people would find it natural if they only were asked for access to their Google Drive at the time the app actually needed it.

In this case, at sign-in time the app might request the `profile` scope to perform basic sign-in, and then later request the `https://www.googleapis.com/auth/drive.file` scope at the time of the first request to save a mix.

To implement incremental authorization, you complete the normal flow for requesting an access token but make sure that the authorization request includes previously granted scopes. This approach allows your app to avoid having to manage multiple access tokens.

The following rules apply to an access token obtained from an incremental authorization:

*   The token can be used to access resources corresponding to any of the scopes rolled into the new, combined authorization.
*   When you use the refresh token for the combined authorization to obtain an access token, the access token represents the combined authorization and can be used for any of its scopes.
*   The combined authorization includes all scopes that the user granted to the API project even if the grants were requested from different clients. For example, if a user granted access to one scope using an application's desktop client and then granted another scope to the same application via a mobile client, the combined authorization would include both scopes.
*   If you revoke a token that represents a combined authorization, access to all of that authorization's scopes on behalf of the associated user are revoked simultaneously.

The example for [setting authorization parameters](#Step-1-Set-authorization-parameters) demonstrates how to ensure authorization requests follow this best practice. The code snippet below also shows the code that you need to add to use incremental authorization.

```php
$client->setIncludeGrantedScopes(true);
```

## Refreshing an access token (offline access)

Access tokens periodically expire. You can refresh an access token without prompting the user for permission (including when the user is not present) if you requested offline access to the scopes associated with the token.

If you use a Google API Client Library, the [client object](#Step-1-Set-authorization-parameters) refreshes the access token as needed as long as you configure that object for offline access.

Requesting offline access is a requirement for any application that needs to access a Google API when the user is not present. For example, an app that performs backup services or executes actions at predetermined times needs to be able to refresh its access token when the user is not present. The default style of access is called `online`.

Server-side web applications, installed applications, and devices all obtain refresh tokens during the authorization process. Refresh tokens are not typically used in client-side (JavaScript) web applications.

If your application needs offline access to a Google API, set the API client's access type to `offline`:

```php
$client->setAccessType("offline");
```

After a user grants offline access to the requested scopes, you can continue to use the API client to access Google APIs on the user's behalf when the user is offline. The client object will refresh the access token as needed.

## Revoking a token

In some cases a user may wish to revoke access given to an application. A user can revoke access by visiting [Account Settings](https://security.google.com/settings/security/permissions). It is also possible for an application to programmatically revoke the access given to it. Programmatic revocation is important in instances where a user unsubscribes or removes an application. In other words, part of the removal process can include an API request to ensure the permissions granted to the application are removed.

To programmatically revoke a token, call `revokeToken()`:

```php
$client->revokeToken();
```

**Note:** Following a successful revocation response, it might take some time before the revocation has full effect.

Except as otherwise noted, the content of this page is licensed under the [Creative Commons Attribution 4.0 License](https://creativecommons.org/licenses/by/4.0/), and code samples are licensed under the [Apache 2.0 License](https://www.apache.org/licenses/LICENSE-2.0). For details, see our [Site Policies](https://developers.google.com/terms/site-policies). Java is a registered trademark of Oracle and/or its affiliates.