<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

use GuzzleHttp\Psr7;

class Google_Http_BatchTest extends BaseTest
{
  public function testBatchRequestWithAuth()
  {
    $this->checkToken();

    $client = $this->getClient();
    $batch = new Google_Http_Batch($client);
    $plus = new Google_Service_Plus($client);

    $client->setUseBatch(true);
    $batch->add($plus->people->get('me'), 'key1');
    $batch->add($plus->people->get('me'), 'key2');
    $batch->add($plus->people->get('me'), 'key3');

    $result = $batch->execute();
    $this->assertArrayHasKey('response-key1', $result);
    $this->assertArrayHasKey('response-key2', $result);
    $this->assertArrayHasKey('response-key3', $result);

  }

  public function testBatchRequest()
  {
    $this->checkKey();
    $client = $this->getClient();
    $plus = new Google_Service_Plus($client);
    $batch = $plus->createBatch();

    $batch->add($plus->people->get('+LarryPage'), 'key1');
    $batch->add($plus->people->get('+LarryPage'), 'key2');
    $batch->add($plus->people->get('+LarryPage'), 'key3');

    $result = $batch->execute();
    $this->assertArrayHasKey('response-key1', $result);
    $this->assertArrayHasKey('response-key2', $result);
    $this->assertArrayHasKey('response-key3', $result);
  }

  public function testBatchRequestWithBooksApi()
  {
    $this->checkKey();
    $client = $this->getClient();
    $plus = new Google_Service_Plus($client);
    $batch = $plus->createBatch();

    $batch->add($plus->people->get('+LarryPage'), 'key1');
    $batch->add($plus->people->get('+LarryPage'), 'key2');
    $batch->add($plus->people->get('+LarryPage'), 'key3');

    $result = $batch->execute();
    $this->assertArrayHasKey('response-key1', $result);
    $this->assertArrayHasKey('response-key2', $result);
    $this->assertArrayHasKey('response-key3', $result);
  }

  public function testBatchRequestWithPostBody()
  {
    $this->checkToken();

    $client = $this->getClient();
    $shortener = new Google_Service_Urlshortener($client);
    $batch = $shortener->createBatch();

    $url1 = new Google_Service_Urlshortener_Url;
    $url2 = new Google_Service_Urlshortener_Url;
    $url3 = new Google_Service_Urlshortener_Url;
    $url1->setLongUrl('http://brentertainment.com');
    $url2->setLongUrl('http://morehazards.com');
    $url3->setLongUrl('http://github.com/bshaffer');

    $batch->add($shortener->url->insert($url1), 'key1');
    $batch->add($shortener->url->insert($url2), 'key2');
    $batch->add($shortener->url->insert($url3), 'key3');

    $result = $batch->execute();
    $this->assertArrayHasKey('response-key1', $result);
    $this->assertArrayHasKey('response-key2', $result);
    $this->assertArrayHasKey('response-key3', $result);
  }

  public function testInvalidBatchRequest()
  {
    $this->checkKey();
    $client = $this->getClient();
    $plus = new Google_Service_Plus($client);

    $batch = $plus->createBatch();

    $batch->add($plus->people->get('123456789987654321'), 'key1');
    $batch->add($plus->people->get('+LarryPage'), 'key2');

    $result = $batch->execute();
    $this->assertArrayHasKey('response-key2', $result);
    $this->assertInstanceOf(
        'Google_Service_Exception',
        $result['response-key1']
    );
  }

  public function testMediaFileBatch()
  {
    $client = $this->getClient();
    $storage = new Google_Service_Storage($client);
    $bucket = 'testbucket';
    $stream = Psr7\stream_for("testbucket-text");
    $params = [
        'data' => $stream,
        'mimeType' => 'text/plain',
    ];

    // Metadata object for new Google Cloud Storage object
    $obj = new Google_Service_Storage_StorageObject();
    $obj->contentType = "text/plain";

    // Batch Upload
    $client->setUseBatch(true);
    $obj->name = "batch";
    /** @var \GuzzleHttp\Psr7\Request $request */
    $request = $storage->objects->insert($bucket, $obj, $params);

    $this->assertContains('multipart/related', $request->getHeaderLine('content-type'));
    $this->assertContains('/upload/', $request->getUri()->getPath());
    $this->assertContains('uploadType=multipart', $request->getUri()->getQuery());
  }
}
