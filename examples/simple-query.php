<?php
/*
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

include_once __DIR__ . '/../vendor/autoload.php';
include_once "templates/base.php";

echo pageHeader("Simple API Access");

/************************************************
  We create the client and set the simple API
  access key. If you comment out the call to
  setDeveloperKey, the request may still succeed
  using the anonymous quota.
 ************************************************/
$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");

// Warn if the API key isn't set.
if (!$apiKey = getApiKey()) {
  echo missingApiKeyWarning();
  return;
}
$client->setDeveloperKey($apiKey);

$service = new Google_Service_Books($client);

/************************************************
  We make a call to our service, which will
  normally map to the structure of the API.
  In this case $service is Books API, the
  resource is volumes, and the method is
  listVolumes. We pass it a required parameters
  (the query), and an array of named optional
  parameters.
 ************************************************/
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

 /************************************************
  This is an example of deferring a call.
 ***********************************************/
$client->setDefer(true);
$optParams = array('filter' => 'free-ebooks');
$request = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
$resultsDeferred = $client->execute($request);

/************************************************
  These calls returns a list of volumes, so we
  can iterate over them as normal with any
  array.
  Some calls will return a single item which we
  can immediately use. The individual responses
  are typed as Google_Service_Books_Volume, but
  can be treated as an array.
 ************************************************/
?>

<h3>Results Of Call:</h3>
<?php foreach ($results as $item): ?>
  <?= $item['volumeInfo']['title'] ?>
  <br />
<?php endforeach ?>

<h3>Results Of Deferred Call:</h3>
<?php foreach ($resultsDeferred as $item): ?>
  <?= $item['volumeInfo']['title'] ?>
  <br />
<?php endforeach ?>

<?= pageFooter(__FILE__) ?>
