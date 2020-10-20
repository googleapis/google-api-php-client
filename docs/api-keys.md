# API Keys

When calling APIs that do not access private user data, you can use simple API keys. These keys are used to authenticate your application for accounting purposes. The Google Developers Console documentation also describes [API keys](https://developers.google.com/console/help/using-keys).

> Note: If you do need to access private user data, you must use OAuth 2.0. See [Using OAuth 2.0 for Web Server Applications](/docs/oauth-web.md) and [Using OAuth 2.0 for Server to Server Applications](/docs/oauth-server.md) for more information.

## Using API Keys

To use API keys, call the `setDeveloperKey()` method of the `Google\Client` object before making any API calls. For example:

```php
$client->setDeveloperKey($api_key);
```
