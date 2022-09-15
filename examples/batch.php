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

echo pageHeader("Batching Queries");

/************************************************
  We're going to use the simple access to the
  books API again as an example, but this time we
  will batch up two queries into a single call.
 ************************************************/

/************************************************
  We create the client and set the simple API
  access key. If you comment out the call to
  setDeveloperKey, the request may still succeed
  using the anonymous quota.
 ************************************************/
$client = new Google\Client();
$client->setApplicationName("Client_Library_Examples");

// Warn if the API key isn't set.
if (!$apiKey = getApiKey()) {
    echo missingApiKeyWarning();
    return;
}
$client->setDeveloperKey($apiKey);

$service = new Google\Service\Books($client);

/************************************************
  To actually make the batch call we need to
  enable batching on the client - this will apply
  globally until we set it to false. This causes
  call to the service methods to return the query
  rather than immediately executing.
 ************************************************/
$client->setUseBatch(true);

/************************************************
 We then create a batch, and add each query we
 want to execute with keys of our choice - these
 keys will be reflected in the returned array.
************************************************/

// NOTE: Some services use `new Google\Http\Batch($client);` instead
$batch = $service->createBatch();

$query = 'Henry David Thoreau';
$optParams = ['filter' => 'free-ebooks'];
$req1 = $service->volumes->listVolumes($query, $optParams);
$batch->add($req1, "thoreau");
$query = 'George Bernard Shaw';
$req2 = $service->volumes->listVolumes($query, $optParams);
$batch->add($req2, "shaw");

/************************************************
  Executing the batch will send all requests off
  at once.
 ************************************************/

$results = $batch->execute();
?>

<h3>Results Of Call 1:</h3>
<?php foreach ($results['response-thoreau'] as $item) : ?>
    <?= $item['volumeInfo']['title'] ?>
  <br />
<?php endforeach ?>

<h3>Results Of Call 2:</h3>
<?php foreach ($results['response-shaw'] as $item) : ?>
    <?= $item['volumeInfo']['title'] ?>
  <br />
<?php endforeach ?>

<?= pageFooter(__FILE__);
