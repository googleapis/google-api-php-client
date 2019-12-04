# Using OAuth 2.0 for Server to Server Applications

The Google APIs Client Library for PHP supports using OAuth 2.0 for server-to-server interactions such as those between a web application and a Google service. For this scenario you need a service account, which is an account that belongs to your application instead of to an individual end user. Your application calls Google APIs on behalf of the service account, so users aren't directly involved. This scenario is sometimes called "two-legged OAuth," or "2LO." (The related term "three-legged OAuth" refers to scenarios in which your application calls Google APIs on behalf of end users, and in which user consent is sometimes required.)

Typically, an application uses a service account when the application uses Google APIs to work with its own data rather than a user's data. For example, an application that uses [Google Cloud Datastore](https://cloud.google.com/datastore/) for data persistence would use a service account to authenticate its calls to the Google Cloud Datastore API.

If you have a G Suite domain—if you use [G Suite Business](https://gsuite.google.com), for example—an administrator of the G Suite domain can authorize an application to access user data on behalf of users in the G Suite domain. For example, an application that uses the [Google Calendar API](https://developers.google.com/google-apps/calendar/) to add events to the calendars of all users in a G Suite domain would use a service account to access the Google Calendar API on behalf of users. Authorizing a service account to access data on behalf of users in a domain is sometimes referred to as "delegating domain-wide authority" to a service account.

> **Note:** When you use [G Suite Marketplace](https://www.google.com/enterprise/marketplace/) to install an application for your domain, the required permissions are automatically granted to the application. You do not need to manually authorize the service accounts that the application uses.

> **Note:** Although you can use service accounts in applications that run from a G Suite domain, service accounts are not members of your G Suite account and aren't subject to domain policies set by G Suite administrators. For example, a policy set in the G Suite admin console to restrict the ability of Apps end users to share documents outside of the domain would not apply to service accounts.

This document describes how an application can complete the server-to-server OAuth 2.0 flow by using the Google APIs Client Library for PHP.

## Overview

To support server-to-server interactions, first create a service account for your project in the Developers Console. If you want to access user data for users in your G Suite domain, then delegate domain-wide access to the service account.

Then, your application prepares to make authorized API calls by using the service account's credentials to request an access token from the OAuth 2.0 auth server.

Finally, your application can use the access token to call Google APIs.

## Creating a service account

A service account's credentials include a generated email address that is unique, a client ID, and at least one public/private key pair.

If your application runs on Google App Engine, a service account is set up automatically when you create your project.

If your application doesn't run on Google App Engine or Google Compute Engine, you must obtain these credentials in the Google Developers Console. To generate service-account credentials, or to view the public credentials that you've already generated, do the following:

1.  Open the [**Service accounts** section](https://console.developers.google.com/permissions/serviceaccounts?project=_) of the Developers Console's **Permissions** page.
2.  Click **Create service account**.
3.  In the **Create service account** window, type a name for the service account and select **Furnish a new private key**. If you want to [grant G Suite domain-wide authority](https://developers.google.com/identity/protocols/OAuth2ServiceAccount#delegatingauthority) to the service account, also select **Enable G Suite Domain-wide Delegation**. Then, click **Create**.

Your new public/private key pair is generated and downloaded to your machine; it serves as the only copy of this key. You are responsible for storing it securely.

You can return to the [Developers Console](https://console.developers.google.com/) at any time to view the client ID, email address, and public key fingerprints, or to generate additional public/private key pairs. For more details about service account credentials in the Developers Console, see [Service accounts](https://developers.google.com/console/help/service-accounts) in the Developers Console help file.

Take note of the service account's email address and store the service account's private key file in a location accessible to your application. Your application needs them to make authorized API calls.

**Note:** You must store and manage private keys securely in both development and production environments. Google does not keep a copy of your private keys, only your public keys.

### Delegating domain-wide authority to the service account

If your application runs in a G Suite domain and accesses user data, the service account that you created needs to be granted access to the user data that you want to access.

The following steps must be performed by an administrator of the G Suite domain:

1.  Go to your G Suite domain’s [Admin console](http://admin.google.com).
2.  Select **Security** from the list of controls. If you don't see **Security** listed, select **More controls** from the gray bar at the bottom of the page, then select **Security** from the list of controls. If you can't see the controls, make sure you're signed in as an administrator for the domain.
3.  Select **Advanced settings** from the list of options.
4.  Select **Manage third party OAuth Client access** in the **Authentication** section.
5.  In the **Client name** field enter the service account's **Client ID**.
6.  In the **One or More API Scopes** field enter the list of scopes that your application should be granted access to. For example, if your application needs domain-wide access to the Google Drive API and the Google Calendar API, enter: https://www.googleapis.com/auth/drive, https://www.googleapis.com/auth/calendar.
7.  Click **Authorize**.

Your application now has the authority to make API calls as users in your domain (to "impersonate" users). When you prepare to make authorized API calls, you specify the user to impersonate.

[](#top_of_page)Preparing to make an authorized API call
--------------------------------------------------------

After you have obtained the client email address and private key from the Developers Console, set the path to these credentials in the `GOOGLE_APPLICATION_CREDENTIALS` environment variable ( **Note:** This is not required in the App Engine environment):

```php
putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json');
```

Call the `useApplicationDefaultCredentials` to use your service account credentials to authenticate:

```php
$client = new Google_Client();
$client->useApplicationDefaultCredentials();
```

If you have delegated domain-wide access to the service account and you want to impersonate a user account, specify the email address of the user account using the method `setSubject`:

```php
$client->setSubject($user_to_impersonate);
```

Use the authorized `Google_Client` object to call Google APIs in your application.

## Calling Google APIs

Use the authorized `Google_Client` object to call Google APIs by completing the following steps:

1.  Build a service object for the API that you want to call, providing the authorized `Google_Client` object. For example, to call the Cloud SQL Administration API:
    
    ```php
    $sqladmin = new Google_Service_SQLAdmin($client);
    ```
    
2.  Make requests to the API service using the [interface provided by the service object](https://github.com/googleapis/google-api-php-client/blob/master/docs/start.md#build-the-service-object). For example, to list the instances of Cloud SQL databases in the examinable-example-123 project:
    
    ```php
    $response = $sqladmin->instances->listInstances('examinable-example-123')->getItems();
    ```

## Complete example

The following example prints a JSON-formatted list of Cloud SQL instances in a project.

To run this example:

1.  Create a new directory and change to it. For example:
    
    ```sh
    mkdir ~/php-oauth2-example
    cd ~/php-oauth2-example
    ```
    
2.  Install the [Google API Client Library](https://github.com/google/google-api-php-client) for PHP using [Composer](https://getcomposer.org):
    
    ```sh
    composer require google/apiclient:^2.0
    ```
    
3.  Create the file sqlinstances.php with the content below.
4.  Run the example from the command line:
    
    ```
    php ~/php-oauth2-example/sqlinstances.php
    ```

### sqlinstances.php

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json');
$client = new Google_Client();
$client->useApplicationDefaultCredentials();

$sqladmin = new Google_Service_SQLAdmin($client);
$response = $sqladmin->instances
    ->listInstances('examinable-example-123')->getItems();
echo json_encode($response) . "\n";
```
