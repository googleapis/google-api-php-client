# Appning API Client Library for PHP

<dl>
  <dt>License</dt><dd>Apache 2.0</dd>
</dl>

The Appning API Library enables you to work with Appning APIs on your server. This documentation and the included examples focus on the **Android Publisher** API.

This library is based on the Google API PHP Library and maintains compatibility with the original library's structure and features, adapted for use with Appning services.

## Requirements ##
* [PHP 8.1 or higher](https://www.php.net/)

## Developer Documentation ##

The [docs folder](docs/) provides detailed guides for using this library.

## Installation ##

### Composer

The preferred method is via [composer](https://getcomposer.org/). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require appning/apiclient
```

If you're facing a timeout error then either increase the timeout for composer by adding the env flag as `COMPOSER_PROCESS_TIMEOUT=600 composer install` or you can put this in the `config` section of the composer schema:
```json
{
    "config": {
        "process-timeout": 600
    }
}
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

This library relies on `google/apiclient-services`. That library provides up-to-date API wrappers for a large number of Google APIs. In order that users may make use of the latest API clients, this library does not pin to a specific version of `google/apiclient-services`. **In order to prevent the accidental installation of API wrappers with breaking changes**, it is highly recommended that you pin to the [latest version](https://github.com/googleapis/google-api-php-client-services/releases) yourself prior to using this library in production.

<!--
#### Cleaning up unused services

There are over 200 Google API services available in `google/apiclient-services`. If you don't need all of them, you can reduce the package size by running the `Appning\Task\Composer::cleanup` task and specifying only the services you want to keep in `composer.json`:

```json
{
    "require": {
        "appning/apiclient": "^2.0"
    },
    "scripts": {
        "pre-autoload-dump": "Appning\\Task\\Composer::cleanup"
    },
    "extra": {
        "google/apiclient-services": [
            "AndroidPublisher"
        ]
    }
}
```

This example will remove all services other than "AndroidPublisher" when
`composer update` or a fresh `composer install` is run.

**IMPORTANT**: If you add any services back in `composer.json`, you will need to
remove the `vendor/google/apiclient-services` directory explicitly for the
change you made to have effect:

```sh
rm -r vendor/google/apiclient-services
composer update
```

**NOTE**: This command performs an exact match on the service name, so if you need multiple related services, you'd need to add each of them explicitly.
-->

## Authentication with JWT Bearer (Appning) ##

Appning services use JWT Bearer authentication. To authenticate, you need to obtain credentials through the developer portal. The credentials will be provided as a JSON file - `serviceAccount.json` - containing `kid` and `privateKeyPem` fields.

### Service Account File Format

Use the credentials obtained through the developer portal. The `serviceAccount.json` file should have the following structure:

```json
{
  "kid": "the-key-id",
  "privateKeyPem": "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----\n",
  "clientId": "the-client-id"
}
```

### Basic Usage Example

See [`examples/androidpublisher-batch-update.php`](examples/androidpublisher-batch-update.php) for a complete working example.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Appning\Client;
use Google\Service\AndroidPublisher\AndroidPublisher;
use Appning\Exception as AppningException;

// Check if serviceAccount.json exists
$serviceAccountFile = __DIR__ . '/serviceAccount.json';
if (!file_exists($serviceAccountFile)) {
    echo "Error: serviceAccount.json not found.\n";
    echo "Please obtain credentials through the developer portal.\n";
    exit(1);
}

try {
    // 1. Load client from serviceAccount.json
    $client = new Client();
    $client->fromServiceAccountFile($serviceAccountFile);

    // 2. Create the AndroidPublisher service
    $service = new AndroidPublisher($client);

    // 3. Build the request body for batch update
    $packageName = "com.example.app";
    
    $batchRequestBody = [
        "oneTimeProduct" => [
            "packageName" => $packageName,
            "productId" => "coin_pack_etc_" . time(),
            "listings" => [
                [
                    "languageCode" => "pt-BR",
                    "title" => "300 Moedas",
                    "description" => "Receba 300 moedas instantaneamente"
                ],
                [
                    "languageCode" => "en-US",
                    "title" => "300 Coins",
                    "description" => "Receive 300 coins instantly"
                ]
            ],
            "purchaseOptions" => [
                [
                    "purchaseOptionId" => "default",
                    "buyOption" => [
                        "legacyCompatible" => true,
                        "multiQuantityEnabled" => false
                    ],
                    "regionalPricingAndAvailabilityConfigs" => [
                        [
                            "regionCode" => "US",
                            "price" => [
                                "currencyCode" => "USD",
                                "units" => "1",
                                "nanos" => 880000000
                            ],
                            "availability" => "AVAILABLE"
                        ]
                    ]
                ]
            ],
            "regionsVersion" => [
                "version" => "2025/03"
            ]
        ],
        "updateMask" => "listings,purchaseOptions",
        "allowMissing" => true,
        "latencyTolerance" => "PRODUCT_UPDATE_LATENCY_TOLERANCE_LATENCY_TOLERANT",
        "regionsVersion" => [
            "version" => "2025/03"
        ]
    ];

    // 4. Call batchUpdate
    echo "Calling batchUpdate for package: {$packageName}\n";
    $response = $service->monetization_onetimeproducts->batchUpdate(
        $packageName,
        ['requests'=>$batchRequestBody]
    );

    // Success: HTTP status code is in 2XX range
    echo "✅ Success\n";
} catch (AppningException $e) {
    // Error: HTTP status code is not in 2XX range
    echo "❌ Error (HTTP {$e->getCode()}): {$e->getMessage()}\n";
    if ($e->getErrors()) {
        echo "Errors:\n";
        print_r($e->getErrors());
    }
} catch (Exception $e) {
    echo "❌ Unexpected error: {$e->getMessage()}\n";
    exit(1);
}
```

## Examples ##

See the [`examples/`](examples) directory for examples of the key client features. The main example is:

- **AndroidPublisher Batch Update**: [`examples/androidpublisher-batch-update.php`](examples/androidpublisher-batch-update.php) - Demonstrates how to use the AndroidPublisher service with JWT Bearer authentication to perform batch updates of one-time products.


## Code Quality ##

Run the PHPUnit tests with PHPUnit.

    php vendor/bin/phpunit tests

## Frequently Asked Questions ##

### What do I do if something isn't working? ###

For support with the library the best place to ask is via email appsmarket.pay@forvia.com.

If there is a specific bug with the library, please [file an issue](https://github.com/appning/appning-api-php-client/issues) in the GitHub issues tracker, including an example of the failing code and any specific errors retrieved. Feature requests can also be filed, as long as they are core library requests, and not-API specific: for those, refer to the documentation for the individual APIs for the best place to file requests. Please try to provide a clear statement of the problem that the feature would address.