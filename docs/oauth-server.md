# OAuth 2.0 for Server-to-Server (Service Accounts)

This library supports server-to-server authentication using **service accounts**. For the **Android Publisher API**, this is the standard approach: your application uses a service account (credentials with `kid` and `privateKeyPem`) and JWT Bearer authentication. No user consent is required.

## Overview

1. Obtain service account credentials (e.g. `serviceAccount.json`) from the developer portal.
2. Load the client with those credentials.
3. Build the Android Publisher service and call the API.

## Using the credentials

Set the client to use the service account file:

```php
$client = new Appning\Client();
$client->fromServiceAccountFile('/path/to/serviceAccount.json');
```

For the traditional Google Cloud style (environment variable):

```php
putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json');
$client = new Appning\Client();
$client->useApplicationDefaultCredentials();
```

## Calling the Android Publisher API

Build the service object and make requests:

```php
$service = new Appning\Service\AndroidPublisher\AndroidPublisher($client);
$response = $service->monetization_onetimeproducts->batchUpdate(
    $packageName,
    ['requests' => $batchRequestBody]
);
```

## Complete example

See [examples/androidpublisher-batch-update.php](../examples/androidpublisher-batch-update.php) for a full working example, including the expected format of `serviceAccount.json` (`kid`, `privateKeyPem`, optional `clientId`) and error handling.
