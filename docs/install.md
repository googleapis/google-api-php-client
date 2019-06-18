# Installation

This page contains information about installing the Google APIs Client Library for PHP.

## Requirements

* PHP version 5.4 or greater.

## Obtaining the client library

There are two options for obtaining the files for the client library.

### Using Composer

You can install the library by adding it as a dependency to your composer.json.

```json
"require": {
  "google/apiclient": "^2.0"
}
```

### Downloading from GitHub

Follow [the instructions in the README](https://github.com/google/google-api-php-client#download-the-release) to download the package locally.

### What to do with the files

After obtaining the files, include the autloader. If you used Composer, your require statement will look like this:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

If you downloaded the package separately, your require statement will look like this:

```php
require_once '/path/to/google-api-php-client/vendor/autoload.php';
```