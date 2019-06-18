# ID Token Authentication

ID tokens allow authenticating a user securely without requiring a network call (in many cases), and without granting the server access to request user information from the Google APIs.

> For a complete example, see the [idtoken.php](https://github.com/googleapis/google-api-php-client/blob/master/examples/idtoken.php) sample in the examples/ directory of the client library.

This is accomplished because each ID token is a cryptographically signed, base64 encoded JSON structure. The token payload includes the Google user ID, the client ID of the application the user signed in to, and the issuer (in this case, Google). It also contains a cryptographic signature which can be verified with the public Google certificates to ensure that the token was created by Google. If the user has granted permission to view their email address to the application, the ID token will additionally include their email address.

The token can be easily and securely verified with the PHP client library

```php
function getUserFromToken($token) {
  $ticket = $client->verifyIdToken($token);
  if ($ticket) {
    $data = $ticket->getAttributes();
    return $data['payload']['sub']; // user ID
  }
  return false
}
```

The library will automatically download and cache the certificate required for verification, and refresh it if it has expired.
