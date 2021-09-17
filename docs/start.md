# Getting Started

This document provides all the basic information you need to start using the library. It covers important library concepts, shows examples for various use cases, and gives links to more information.

## Setup

There are a few setup steps you need to complete before you can use this library:

1.  If you don't already have a Google account, [sign up](https://www.google.com/accounts).
2.  If you have never created a Google API project, read the [Managing Projects page](https://developers.google.com/console/help/#managingprojects) and create a project in the [Google Developers Console](https://console.developers.google.com/)
3.  [Install](install.md) the library.

## Authentication and authorization

It is important to understand the basics of how API authentication and authorization are handled. All API calls must use either simple or authorized access (defined below). Many API methods require authorized access, but some can use either. Some API methods that can use either behave differently, depending on whether you use simple or authorized access. See the API's method documentation to determine the appropriate access type.

### 1. Simple API access (API keys)

These API calls do not access any private user data. Your application must authenticate itself as an application belonging to your Google Cloud project. This is needed to measure project usage for accounting purposes.

#### Important concepts

*   **API key**: To authenticate your application, use an [API key](https://cloud.google.com/docs/authentication/api-keys) for your Google Cloud Console project. Every simple access call your application makes must include this key.

> **Warning**: Keep your API key private. If someone obtains your key, they could use it to consume your quota or incur charges against your Google Cloud project.


### 2. Authorized API access (OAuth 2.0)

These API calls access private user data. Before you can call them, the user that has access to the private data must grant your application access. Therefore, your application must be authenticated, the user must grant access for your application, and the user must be authenticated in order to grant that access. All of this is accomplished with [OAuth 2.0](https://developers.google.com/identity/protocols/OAuth2) and libraries written for it.

#### Important concepts

*   **Scope**: Each API defines one or more scopes that declare a set of operations permitted. For example, an API might have read-only and read-write scopes. When your application requests access to user data, the request must include one or more scopes. The user needs to approve the scope of access your application is requesting.
*   **Refresh and access tokens**: When a user grants your application access, the OAuth 2.0 authorization server provides your application with refresh and access tokens. These tokens are only valid for the scope requested. Your application uses access tokens to authorize API calls. Access tokens expire, but refresh tokens do not. Your application can use a refresh token to acquire a new access token.

    > **Warning**: Keep refresh and access tokens private. If someone obtains your tokens, they could use them to access private user data.

*   **Client ID and client secret**: These strings uniquely identify your application and are used to acquire tokens. They are created for your Google Cloud project on the [API Access pane](https://code.google.com/apis/console#:access) of the Google Cloud. There are three types of client IDs, so be sure to get the correct type for your application:

    *   Web application client IDs
    *   Installed application client IDs
    *   [Service Account](https://developers.google.com/identity/protocols/OAuth2ServiceAccount) client IDs

    > **Warning**: Keep your client secret private. If someone obtains your client secret, they could use it to consume your quota, incur charges against your Google Cloud project, and request access to user data.


## Building and calling a service

This section described how to build an API-specific service object, make calls to the service, and process the response.

### Build the client object

The client object is the primary container for classes and configuration in the library.

```php
$client = new Google\Client();
$client->setApplicationName("My Application");
$client->setDeveloperKey("MY_SIMPLE_API_KEY");
```

### Build the service object

Services are called through queries to service specific objects. These are created by constructing the service object, and passing an instance of `Google\Client` to it. `Google\Client` contains the IO, authentication and other classes required by the service to function, and the service informs the client which scopes it uses to provide a default when authenticating a user.

```php
$service = new Google\Service\Books($client);
```

### Calling an API

Each API provides resources and methods, usually in a chain. These can be accessed from the service object in the form `$service->resource->method(args)`. Most method require some arguments, then accept a final parameter of an array containing optional parameters. For example, with the Google Books API, we can make a call to list volumes matching a certain string, and add an optional _filter_ parameter.

```php
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
```

### Handling the result

There are two main types of response - items and collections of items. Each can be accessed either as an object or as an array. Collections implement the `Iterator` interface so can be used in foreach and other constructs.

```php
foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}
```

**Properties are hydrated according to the value in the Response. If a property is not present in the Response it will be set to null. Some fields won't be in the Response if you didn't ask for them in the Request using the `fields` property. Therefore, watchout for null properties, maybe they have a value already but are null because they're not present in the Response.**

## Google App Engine support

This library works well with Google App Engine applications. The Memcache class is automatically used for caching, and the file IO is implemented with the use of the Streams API.
