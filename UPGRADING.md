Google API Client Upgrade Guide
===============================

1.0 to 2.0
----------

The Google API Client for PHP has undergone major internal changes in `2.0`. Please read through
the list below in order to upgrade to the latest version:

 - `PHP 5.4` is now the minimum supported PHP version (previously `PHP 5.2`).
 - [`Guzzle 5`][Guzzle 5] is used for all HTTP Requests. As a result, all `Google_IO`-related
 functionality and `Google_Http`-related functionality has been changed or removed:
    1. Removed `Google_Http_Request`
    1. Removed `Google_IO_Abstract`, `Google_IO_Exception`, `Google_IO_Curl`, and `Google_IO_Stream`
    1. Removed methods `Google_Client::getIo` and `Google_Client::setIo`
    1. Refactored `Google_Http_Batch` and `Google_Http_MediaFileUpload` for Guzzle 5
    1. Added `Google_Http_Pool` for HTTP Pooling via Guzzle 5
    1. Added `Google_Client::getHttpClient` and `Google_Client::setHttpClient` for getting and
    setting the Guzzle 5 `GuzzleHttp\ClientInterface` object.
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
 - [`google/auth`][Google Auth] is used for all authentication. As a result, all
 `Google_Auth`-related functionality has been removed:
    1. Removed methods `Google_Client::getAuth` and `Google_Client::setAuth`
    1. Removed `Google_Auth_Abstract`
    1. Removed `Google_Auth_AppIdentity`. This will be added to [`google/auth`][Google Auth] (TBD).
    1. Removed `Google_Auth_AssertionCredentials`. Use `Google_Client::setAuthConfig` instead.
    1. Removed `Google_Auth_ComputeEngine`. This is now supported in
    [`google/auth`][Google Auth GCE], and will work automatically when
    `Google_Client::useApplicationDefaultCredentials` is called.
    1. Removed `Google_Auth_Exception`
    1. Removed `Google_Auth_LoginTicket`. Calls to `Google_Client::verifyIdToken` now returns
    the payload of the ID Token as an array if the verification is successful.
    1. Removed `Google_Auth_OAuth2`. This functionality is now supported in [`google/auth`][Google Auth OAuth2] and wrapped in `Google_Client`. The changes below will only affect applications calling `Google_Client::getAuth`. For those making these calls directly to `Google_Client`, all but `Google_Client::sign` will continue to function, but will issue `E_DEPRECATED` warnings.
      - `Google_Auth_OAuth2::sign` has been replaced by `Google_Client::authorize` (see below)
      - `Google_Auth_OAuth2::refreshToken` has been replaced by
        `Google_Client::fetchAccessTokenWithRefreshToken`
      - `Google_Auth_OAuth2::refreshTokenWithAssertion` has been replaced by
        `Google_Client::fetchAccessTokenWithAssertion`
      - `Google_Auth_OAuth2::revokeToken` has been replaced by
        `Google_Client::revokeToken`
      - `Google_Auth_OAuth2::isAccessTokenExpired` has been replaced by
        `Google_Client::isAccessTokenExpired`
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
 - [`Google\Auth\CacheInterface`][Google Auth CacheInterface] is used for all caching. As a result:
    1. Removed `Google_Cache_Abstract`
    1. Classes `Google_Cache_Apc`, `Google_Cache_File`, `Google_Cache_Memcache`, and
    `Google_Cache_Null` now implement `Google\Auth\CacheInterface`.

[PSR 3]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md
[Guzzle 5]: https://github.com/guzzle/guzzle
[Monolog]: https://github.com/Seldaek/monolog
[Google Auth]: https://github.com/google/google-auth-library-php
[Google Auth GCE]: https://github.com/google/google-auth-library-php/blob/master/src/GCECredentials.php
[Google Auth OAuth2]: https://github.com/google/google-auth-library-php/blob/master/src/OAuth2.php
[Google Auth Simple]: https://github.com/google/google-auth-library-php/blob/master/src/Simple.php
[Google Auth CacheInterface]: https://github.com/google/google-auth-library-php/blob/master/src/CacheInterface.php
[Firebase JWT]: https://github.com/firebase/php-jwt