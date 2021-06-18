Google API Client Upgrade Guide
===============================

2.x to 2.10.0
-------------

### Namespaces

The Google API Client for PHP now uses namespaces for all classes. Code using
the legacy classnames will continue to work, but it is advised to upgrade to the
underspaced names, as the legacy classnames will be deprecated some time in the
future.

**Before**

```php
$client = new Google_Client();
$service = new Google_Service_Books($client);
```

**After**
```php
$client = new Google\Client();
$service = new Google\Service\Books($client);
```

### Service class constructors

Service class constructors now accept an optional `Google\Client|array` parameter
as their first argument, rather than requiring an instance of `Google\Client`.

**Before**

```php
$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("YOUR_APP_KEY");

$service = new Google_Service_Books($client);
```

**After**

```php
$service = new Google\Service\Books([
    'application_name' => "Client_Library_Examples",
    'developer_key'    => "YOUR_APP_KEY",
]);
```

1.0 to 2.0
----------

The Google API Client for PHP has undergone major internal changes in `2.0`. Please read through
the list below in order to upgrade to the latest version:

## Installation now uses `Composer`

**Before**

The project was cloned in your project and you would run the autoloader from wherever:

```php
// the autoload file was included
require_once 'google-api-php-client/src/Google/autoload.php'; // or wherever autoload.php is located
// OR classes were added one-by-one
require_once 'Google/Client.php';
require_once 'Google/Service/YouTube.php';
```

**After**

This library now uses [composer](https://getcomposer.org) (We suggest installing
composer [globally](http://symfony.com/doc/current/cookbook/composer.html)). Add this library by
running the following in the root of your project:

```
$ composer require google/apiclient:~2.0
```

This will install this library and generate an autoload file in `vendor/autoload.php` in the root
of your project. You can now include this library with the following code:

```php
require_once 'vendor/autoload.php';
```

## Access Tokens are passed around as arrays instead of JSON strings

**Before**

```php
$accessToken = $client->getAccessToken();
print_r($accessToken);
// would output:
// string(153) "{"access_token":"ya29.FAKsaByOPoddfzvKRo_LBpWWCpVTiAm4BjsvBwxtN7IgSNoUfcErBk_VPl4iAiE1ntb_","token_type":"Bearer","expires_in":3593,"created":1445548590}"
file_put_contents($credentialsPath, $accessToken);
```

**After**

```php
$accessToken = $client->getAccessToken();
print_r($accessToken);
// will output:
// array(4) {
//   ["access_token"]=>
//   string(73) "ya29.FAKsaByOPoddfzvKRo_LBpWWCpVTiAm4BjsvBwxtN7IgSNoUfcErBk_VPl4iAiE1ntb_"
//   ["token_type"]=>
//   string(6) "Bearer"
//   ["expires_in"]=>
//   int(3593)
//   ["created"]=>
//   int(1445548590)
// }
file_put_contents($credentialsPath, json_encode($accessToken));
```

## ID Token data is returned as an array

**Before**

```php
$ticket = $client->verifyIdToken($idToken);
$data = $ticket->getAttributes();
$userId = $data['payload']['sub'];
```

**After**

```php
$userData = $client->verifyIdToken($idToken);
$userId = $userData['sub'];
```

## `Google_Auth_AssertionCredentials` has been removed

For service accounts, we now use `setAuthConfig` or `useApplicationDefaultCredentials`

**Before**

```php
$client_email = '1234567890-a1b2c3d4e5f6g7h8i@developer.gserviceaccount.com';
$private_key = file_get_contents('MyProject.p12');
$scopes = array('https://www.googleapis.com/auth/sqlservice.admin');
$credentials = new Google_Auth_AssertionCredentials(
    $client_email,
    $scopes,
    $private_key
);
```

**After**

```php
$client->setAuthConfig('/path/to/service-account.json');

// OR use environment variables (recommended)

putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json');
$client->useApplicationDefaultCredentials();
```

> Note: P12s are deprecated in favor of service account JSON, which can be generated in the
> Credentials section of Google Developer Console.

In order to impersonate a user, call `setSubject` when your service account
credentials are being used.

**Before**

```php
$user_to_impersonate = 'user@example.org';
$credentials = new Google_Auth_AssertionCredentials(
    $client_email,
    $scopes,
    $private_key,
    'notasecret',                                 // Default P12 password
    'http://oauth.net/grant_type/jwt/1.0/bearer', // Default grant type
    $user_to_impersonate,
);
```

**After**

```php
$user_to_impersonate = 'user@example.org';
$client->setSubject($user_to_impersonate);
```

Additionally, `Google_Client::loadServiceAccountJson` has been removed in favor
of `Google_Client::setAuthConfig`:

**Before**

```php
$scopes = [ Google_Service_Books::BOOKS ];
$client->loadServiceAccountJson('/path/to/service-account.json', $scopes);
```

**After**

```php
$scopes = [ Google_Service_Books::BOOKS ];
$client->setAuthConfig('/path/to/service-account.json');
$client->setScopes($scopes);
```

## `Google_Auth_AppIdentity` has been removed

For App Engine authentication, we now use the underlying [`google/auth`][Google Auth] and
call `useApplicationDefaultCredentials`:

**Before**

```php
$client->setAuth(new Google_Auth_AppIdentity($client));
$client->getAuth()
    ->authenticateForScope('https://www.googleapis.com/auth/sqlservice.admin')
```

**After**

```php
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/sqlservice.admin');
```

This will detect when the App Engine environment is present, and use the appropriate credentials.

## `Google_Auth_Abstract` classes have been removed

[`google/auth`][Google Auth] is now used for authentication. As a result, all
`Google_Auth`-related functionality has been removed. The methods that were a part of
`Google_Auth_Abstract` have been moved into the `Google_Client` object.

**Before**

```php
$request = new Google_Http_Request();
$client->getAuth()->sign($request);
```

**After**

```php
// create an authorized HTTP client
$httpClient = $client->authorize();

// OR add authorization to an existing client
$httpClient = new GuzzleHttp\Client();
$httpClient = $client->authorize($httpClient);
```

**Before**

```php
$request = new Google_Http_Request();
$response = $client->getAuth()->authenticatedRequest($request);
```

**After**

```php
$httpClient = $client->authorize();
$request = new GuzzleHttp\Psr7\Request('POST', $url);
$response = $httpClient->send($request);
```

> NOTE: `$request` can be any class implementing
> `Psr\Http\Message\RequestInterface`

In addition, other methods that were callable on `Google_Auth_OAuth2` are now called
on the `Google_Client` object:

**Before**

```php
$client->getAuth()->refreshToken($token);
$client->getAuth()->refreshTokenWithAssertion();
$client->getAuth()->revokeToken($token);
$client->getAuth()->isAccessTokenExpired();
```

**After**

```php
$client->refreshToken($token);
$client->refreshTokenWithAssertion();
$client->revokeToken($token);
$client->isAccessTokenExpired();
```

## PHP 5.6 is now the minimum supported PHP version

This was previously `PHP 5.2`. If you still need to use PHP 5.2, please continue to use
the [v1-master](https://github.com/google/google-api-php-client/tree/v1-master) branch.

## Guzzle and PSR-7 are used for HTTP Requests

The HTTP library Guzzle is used for all HTTP Requests. By default, [`Guzzle 6`][Guzzle 6]
is used, but this library is also compatible with [`Guzzle 5`][Guzzle 5]. As a result,
all `Google_IO`-related functionality and `Google_Http`-related functionality has been
changed or removed.

1. Removed `Google_Http_Request`
1. Removed `Google_IO_Abstract`, `Google_IO_Exception`, `Google_IO_Curl`, and `Google_IO_Stream`
1. Removed methods `Google_Client::getIo` and `Google_Client::setIo`
1. Refactored `Google_Http_Batch` and `Google_Http_MediaFileUpload` for Guzzle
1. Added `Google_Client::getHttpClient` and `Google_Client::setHttpClient` for getting and
setting the Guzzle `GuzzleHttp\ClientInterface` object.

> NOTE: `PSR-7`-compatible libraries can now be used with this library.

## Other Changes

 - [`PSR 3`][PSR 3] `LoggerInterface` is now supported, and [Monolog][Monolog] is used for all
 logging. As a result, all `Google_Logger`-related functionality has been removed:
    1. Removed `Google_Logger_Abstract`, `Google_Logger_Exception`, `Google_Logger_File`,
    `Google_Logger_Null`, and `Google_Logger_Psr`
    1. `Google_Client::setLogger` now requires `Psr\Log\LoggerInterface`
 - [`firebase/jwt`][Firebase JWT] is now used for all JWT signing and verifying. As a result, the
 following classes have been changed or removed:
    1. Removed `Google_Signer_P12`
    1. Removed `Google_Verifier_Pem`
    1. Removed `Google_Auth_LoginTicket` (see below)
 - The following classes and methods have been removed in favor of [`google/auth`][Google Auth]:
    1. Removed methods `Google_Client::getAuth` and `Google_Client::setAuth`
    1. Removed `Google_Auth_Abstract`
        - `Google_Auth_Abstract::sign` and `Google_Auth_Abstract::authenticatedRequest` have been
        replaced by `Google_Client::authorize`. See the above examples for more details.
    1. Removed `Google_Auth_AppIdentity`. This is now supported in [`google/auth`][Google Auth AppIdentity]
    and is used automatically when `Google_Client::useApplicationDefaultCredentials` is called.
    1. Removed `Google_Auth_AssertionCredentials`. Use `Google_Client::setAuthConfig` instead.
    1. Removed `Google_Auth_ComputeEngine`. This is now supported in
    [`google/auth`][Google Auth GCE], and is used automatically when
    `Google_Client::useApplicationDefaultCredentials` is called.
    1. Removed `Google_Auth_Exception`
    1. Removed `Google_Auth_LoginTicket`. Calls to `Google_Client::verifyIdToken` now returns
    the payload of the ID Token as an array if the verification is successful.
    1. Removed `Google_Auth_OAuth2`. This functionality is now supported in [`google/auth`][Google Auth OAuth2] and wrapped in `Google_Client`. These changes will only affect applications calling `Google_Client::getAuth`,
    as the methods on `Google_Client` have not changed.
    1. Removed `Google_Auth_Simple`. This is now supported in [`google/auth`][Google Auth Simple]
    and is used automatically when `Google_Client::setDeveloperKey` is called.
 - `Google_Client::sign` has been replaced by `Google_Client::authorize`. This function
    now takes a `GuzzleHttp\ClientInterface` object and uses the following decision tree for
    authentication:
    1. Uses Application Default Credentials when
    `Google_Client::useApplicationDefaultCredentials` is called
      - Looks for `GOOGLE_APPLICATION_CREDENTIALS` environment variable if set
      - Looks in `~/.config/gcloud/application_default_credentials.json`
      - Otherwise, uses `GCECredentials`
    1. Uses API Key if set (see `Client::setDeveloperKey`)
    1. Uses Access Token if set (call `Client::setAccessToken`)
    1. Automatically refreshes access tokens if one is set and the access token is expired
 - Removed `Google_Config`
 - Removed `Google_Utils`
 - [`PSR-6`][PSR 6] cache is used for all caching. As a result:
    1. Removed `Google_Cache_Abstract`
    1. Classes `Google_Cache_Apc`, `Google_Cache_File`, `Google_Cache_Memcache`, and
    `Google_Cache_Null` now implement `Google\Auth\CacheInterface`.
    1. Google Auth provides simple [caching utilities][Google Auth Cache] which
   are used by default unless you provide alternatives.
 - Removed `$boundary` constructor argument for `Google_Http_MediaFileUpload`

[PSR 3]: https://www.php-fig.org/psr/psr-3/
[PSR 6]: https://www.php-fig.org/psr/psr-6/
[Guzzle 5]: https://github.com/guzzle/guzzle
[Guzzle 6]: http://docs.guzzlephp.org/en/latest/psr7.html
[Monolog]: https://github.com/Seldaek/monolog
[Google Auth]: https://github.com/google/google-auth-library-php
[Google Auth Cache]: https://github.com/googleapis/google-auth-library-php/tree/master/src/Cache
[Google Auth GCE]: https://github.com/google/google-auth-library-php/blob/master/src/GCECredentials.php
[Google Auth OAuth2]: https://github.com/google/google-auth-library-php/blob/master/src/OAuth2.php
[Google Auth Simple]: https://github.com/google/google-auth-library-php/blob/master/src/Simple.php
[Google Auth AppIdentity]: https://github.com/google/google-auth-library-php/blob/master/src/AppIdentityCredentials.php
[Firebase JWT]: https://github.com/firebase/php-jwt
