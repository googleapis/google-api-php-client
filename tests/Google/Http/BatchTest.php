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

namespace Google\Tests\Http;

use Google\Tests\BaseTest;
use Google\Http\Batch;
use Google\Service\Books;
use Google\Service\Storage;
use Google\Service\Exception as ServiceException;
use GuzzleHttp\Psr7;

class BatchTest extends BaseTest
{
    public function testBatchRequest()
    {
        $this->checkKey();
        $client = $this->getClient();
        $client->setUseBatch(true);
        $books = new Books($client);
        $batch = $books->createBatch();

        $batch->add($books->volumes->listVolumes('Henry David Thoreau'), 'key1');
        $batch->add($books->volumes->listVolumes('Edgar Allen Poe'), 'key2');

        $result = $batch->execute();
        $this->assertArrayHasKey('response-key1', $result);
        $this->assertArrayHasKey('response-key2', $result);
    }

    public function testInvalidBatchRequest()
    {
        $this->checkKey();
        $client = $this->getClient();
        $client->setUseBatch(true);
        $books = new Books($client);
        $batch = $books->createBatch();

        $batch->add($books->volumes->listVolumes(false), 'key1');
        $batch->add($books->volumes->listVolumes('Edgar Allen Poe'), 'key2');

        $result = $batch->execute();
        $this->assertArrayHasKey('response-key1', $result);
        $this->assertArrayHasKey('response-key2', $result);
        $this->assertInstanceOf(
            ServiceException::class,
            $result['response-key1']
        );
    }

    public function testMediaFileBatch()
    {
        $client = $this->getClient();
        $storage = new Storage($client);
        $bucket = 'testbucket';
        $stream = Psr7\Utils::streamFor("testbucket-text");
        $params = [
            'data' => $stream,
            'mimeType' => 'text/plain',
        ];

        // Metadata object for new Google Cloud Storage object
        $obj = new Storage\StorageObject();
        $obj->contentType = "text/plain";

        // Batch Upload
        $client->setUseBatch(true);
        $obj->name = "batch";
        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = $storage->objects->insert($bucket, $obj, $params);

        $this->assertStringContainsString('multipart/related', $request->getHeaderLine('content-type'));
        $this->assertStringContainsString('/upload/', $request->getUri()->getPath());
        $this->assertStringContainsString('uploadType=multipart', $request->getUri()->getQuery());
    }
}
