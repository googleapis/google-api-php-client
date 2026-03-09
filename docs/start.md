# Getting Started

This document provides the basic information you need to start using the library with the Android Publisher API. It covers important library concepts and gives links to more information.

## Setup

1. Obtain credentials (service account with `kid` and `privateKeyPem`) through the developer portal.
2. [Install](install.md) the library.

## Authentication

This library uses **JWT Bearer** authentication for Appning/Android Publisher. Use a service account JSON file (e.g. `serviceAccount.json`) containing `kid`, `privateKeyPem`, and optionally `clientId`. See the [main README](../README.md#authentication-with-jwt-bearer-appning) for the exact format.

## Building and calling a service

### Build the client object

The client object is the primary container for classes and configuration.

```php
$client = new Appning\Client();
$client->fromServiceAccountFile('serviceAccount.json');
```

### Build the service object

Create the Android Publisher service by passing an instance of `Appning\Client`. The client provides the HTTP and authentication layer.

```php
$service = new Appning\Service\AndroidPublisher\AndroidPublisher($client);
```

### Calling the API

Access resources and methods from the service object in the form `$service->resource->method(args)`. For example, to call the batch update for one-time products:

```php
$packageName = 'com.example.app';
$response = $service->monetization_onetimeproducts->batchUpdate(
    $packageName,
    ['requests' => $batchRequestBody]
);
```

### Handling the result

Responses can be accessed as objects or arrays. See the [example](../examples/androidpublisher-batch-update.php) for a full flow including error handling.

**Properties are hydrated from the response. Missing fields will be null. Use the `fields` parameter in requests when you need specific response fields.**
