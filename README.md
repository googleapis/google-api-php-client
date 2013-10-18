# Google APIs Client Library for PHP #

## Description ##
The Google API Client Library enables you to work with Google APIs such as Google+, Drive, or YouTube on your server.

## Requirements ##
* [PHP 5.2.x or higher](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)

## Developer Documentation ##
http://developers.google.com/api-client-library/php

## Basic Example ##
See the examples/ directory for examples of the key client features.
```PHP
<?php
  require_once 'Google/Client.php';
  require_once 'Google/Service/Books.php';
  $client = new Google_Client();
  $client->setApplicationName("Client_Library_Examples");
  $client->setDeveloperKey("YOUR_APP_KEY");
  $service = new Google_Service_Books($client);
  $optParams = array('filter' => 'free-ebooks');
  $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
  
  foreach ($results as $item) {
    echo $item['volumeInfo']['title'], "<br /> \n";
  }
```

## Code Quality ##

Copy the ruleset.xml in style to GAPI in your /usr/share/php/PHP/CodeSniffer/Standards (or appropriate equivalent directory), and run code sniffs with:

        phpcs --standard=GAPI src/
