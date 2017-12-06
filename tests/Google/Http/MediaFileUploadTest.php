<?php

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;

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

class Google_Http_MediaFileUploadTest extends BaseTest
{
  public function testMediaFile()
  {
    $client = $this->getClient();
    $request = new Request('POST', 'http://www.example.com');
    $media = new Google_Http_MediaFileUpload(
        $client,
        $request,
        'image/png',
        base64_decode('data:image/png;base64,a')
    );
    $request = $media->getRequest();

    $this->assertEquals(0, $media->getProgress());
    $this->assertGreaterThan(0, strlen($request->getBody()));
  }

  public function testGetUploadType()
  {
    $client = $this->getClient();
    $request = new Request('POST', 'http://www.example.com');

    // Test resumable upload
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', true);
    $this->assertEquals('resumable', $media->getUploadType(null));

    // Test data *only* uploads
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', false);
    $this->assertEquals('media', $media->getUploadType(null));

    // Test multipart uploads
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', false);
    $this->assertEquals('multipart', $media->getUploadType(array('a' => 'b')));
  }

  public function testProcess()
  {
    $client = $this->getClient();
    $data = 'foo';

    // Test data *only* uploads.
    $request = new Request('POST', 'http://www.example.com');
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', $data, false);
    $request = $media->getRequest();
    $this->assertEquals($data, (string) $request->getBody());

    // Test resumable (meta data) - we want to send the metadata, not the app data.
    $request = new Request('POST', 'http://www.example.com');
    $reqData = json_encode("hello");
    $request = $request->withBody(Psr7\stream_for($reqData));
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', $data, true);
    $request = $media->getRequest();
    $this->assertEquals(json_decode($reqData), (string) $request->getBody());

    // Test multipart - we are sending encoded meta data and post data
    $request = new Request('POST', 'http://www.example.com');
    $reqData = json_encode("hello");
    $request = $request->withBody(Psr7\stream_for($reqData));
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', $data, false);
    $request = $media->getRequest();
    $this->assertContains($reqData, (string) $request->getBody());
    $this->assertContains(base64_encode($data), (string) $request->getBody());
  }

  public function testGetResumeUri()
  {
    $this->checkToken();

    $client = $this->getClient();
    $client->addScope("https://www.googleapis.com/auth/drive");
    $service = new Google_Service_Drive($client);
    $file = new Google_Service_Drive_DriveFile();
    $file->name = 'TESTFILE-testGetResumeUri';
    $chunkSizeBytes = 1 * 1024 * 1024;

    // Call the API with the media upload, defer so it doesn't immediately return.
    $client->setDefer(true);
    $request = $service->files->create($file);

    // Create a media file upload to represent our upload process.
    $media = new Google_Http_MediaFileUpload(
      $client,
      $request,
      'text/plain',
      null,
      true,
      $chunkSizeBytes
    );

    // request the resumable url
    $uri = $media->getResumeUri();
    $this->assertInternalType('string', $uri);

    // parse the URL
    $parts = parse_url($uri);
    $this->assertArrayHasKey('query', $parts);

    // parse the querystring
    parse_str($parts['query'], $query);
    $this->assertArrayHasKey('uploadType', $query);
    $this->assertArrayHasKey('upload_id', $query);
    $this->assertEquals('resumable', $query['uploadType']);
  }

  public function testNextChunk()
  {
    $this->checkToken();

    $client = $this->getClient();
    $client->addScope("https://www.googleapis.com/auth/drive");
    $service = new Google_Service_Drive($client);

    $data = 'foo';
    $file = new Google_Service_Drive_DriveFile();
    $file->name = $name = 'TESTFILE-testNextChunk';

    // Call the API with the media upload, defer so it doesn't immediately return.
    $client->setDefer(true);
    $request = $service->files->create($file);

    // Create a media file upload to represent our upload process.
    $media = new Google_Http_MediaFileUpload(
      $client,
      $request,
      'text/plain',
      null,
      true
    );
    $media->setFileSize(strlen($data));

    // upload the file
    $file = $media->nextChunk($data);
    $this->assertInstanceOf('Google_Service_Drive_DriveFile', $file);
    $this->assertEquals($name, $file->name);

    // remove the file
    $client->setDefer(false);
    $response = $service->files->delete($file->id);
    $this->assertEquals(204, $response->getStatusCode());
  }

  public function testNextChunkWithMoreRemaining()
  {
    $this->checkToken();

    $client = $this->getClient();
    $client->addScope("https://www.googleapis.com/auth/drive");
    $service = new Google_Service_Drive($client);

    $chunkSizeBytes = 262144; // smallest chunk size allowed by APIs
    $data = str_repeat('.', $chunkSizeBytes+1);
    $file = new Google_Service_Drive_DriveFile();
    $file->name = $name = 'TESTFILE-testNextChunkWithMoreRemaining';

    // Call the API with the media upload, defer so it doesn't immediately return.
    $client->setDefer(true);
    $request = $service->files->create($file);

    // Create a media file upload to represent our upload process.
    $media = new Google_Http_MediaFileUpload(
      $client,
      $request,
      'text/plain',
      $data,
      true,
      $chunkSizeBytes
    );
    $media->setFileSize(strlen($data));

    // upload the file
    $file = $media->nextChunk();
    // false means we aren't done uploading, which is exactly what we expect!
    $this->assertFalse($file);
  }
}
