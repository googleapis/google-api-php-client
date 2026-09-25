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
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

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

    public function testParseResponseMatchesResponsesToRequestsByContentId()
    {
        // The API is not required to return the parts in the order they were
        // sent, so each part must be matched to its request via its Content-ID.
        $client = $this->getClient();
        $batch = new Batch($client);
        $batch->add(
            (new Request('GET', 'http://foo.bar/volume'))
                ->withHeader('X-Php-Expected-Class', Books\Volume::class),
            'key1'
        );
        $batch->add(
            (new Request('GET', 'http://foo.bar/bookshelf'))
                ->withHeader('X-Php-Expected-Class', Books\Bookshelf::class),
            'key2'
        );

        $boundary = 'batch_boundary';
        $classes = [
            'response-key1' => Books\Volume::class,
            'response-key2' => Books\Bookshelf::class,
        ];

        // The parts come back in the reverse order of the requests.
        $body = '';
        foreach (['key2', 'key1'] as $key) {
            $body .= "--$boundary\r\n"
                . "Content-Type: application/http\r\n"
                . "Content-ID: response-$key\r\n"
                . "\r\n"
                . "HTTP/1.1 200 OK\r\n"
                . "Content-Type: application/json\r\n"
                . "\r\n"
                . '{"id": "' . $key . '"}' . "\r\n";
        }
        $body .= "--$boundary--";

        $response = new Response(
            200,
            ['Content-Type' => "multipart/mixed; boundary=$boundary"],
            $body
        );

        $result = $batch->parseResponse($response, $classes);

        $this->assertInstanceOf(Books\Volume::class, $result['response-key1']);
        $this->assertEquals('key1', $result['response-key1']->id);
        $this->assertInstanceOf(Books\Bookshelf::class, $result['response-key2']);
        $this->assertEquals('key2', $result['response-key2']->id);
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
