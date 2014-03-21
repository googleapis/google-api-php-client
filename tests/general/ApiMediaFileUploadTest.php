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

require_once 'BaseTest.php';
require_once 'Google/Http/MediaFileUpload.php';

class ApiMediaFileUploadTest extends BaseTest
{
  public function testMediaFile()
  {
    $client = $this->getClient();
    $request = new Google_Http_Request('http://www.example.com', 'POST');
    $media = new Google_Http_MediaFileUpload(
        $client,
        $request,
        'image/png',
        base64_decode('data:image/png;base64,a')
    );

    $this->assertEquals(0, $media->getProgress());
    $this->assertGreaterThan(0, strlen($request->getPostBody()));
  }

  public function testGetUploadType()
  {
    $client = $this->getClient();
    $request = new Google_Http_Request('http://www.example.com', 'POST');

    // Test resumable upload
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', true);
    $params = array('mediaUpload' => array('value' => $media));
    $this->assertEquals('resumable', $media->getUploadType(null));
        
    // Test data *only* uploads
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', false);
    $this->assertEquals('media', $media->getUploadType(null));
    
    // Test multipart uploads
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', false);
    $this->assertEquals('multipart', $media->getUploadType(array('a' => 'b')));
  }
    
  public function testResultCode()
  {
    $client = $this->getClient();
    $request = new Google_Http_Request('http://www.example.com', 'POST');

    // Test resumable upload
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', 'a', true);
    $this->assertEquals(null, $media->getHttpResultCode());
  }
  
  public function testProcess()
  {
    $client = $this->getClient();
    $data = 'foo';
      
    // Test data *only* uploads.
    $request = new Google_Http_Request('http://www.example.com', 'POST');
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', $data, false);
    $this->assertEquals($data, $request->getPostBody());
    
    // Test resumable (meta data) - we want to send the metadata, not the app data.
    $request = new Google_Http_Request('http://www.example.com', 'POST');
    $reqData = json_encode("hello");
    $request->setPostBody($reqData);
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', $data, true);
    $this->assertEquals(json_decode($reqData), $request->getPostBody());
    
    // Test multipart - we are sending encoded meta data and post data
    $request = new Google_Http_Request('http://www.example.com', 'POST');
    $reqData = json_encode("hello");
    $request->setPostBody($reqData);
    $media = new Google_Http_MediaFileUpload($client, $request, 'image/png', $data, false);
    $this->assertContains($reqData, $request->getPostBody());
    $this->assertContains(base64_encode($data), $request->getPostBody());
  }
}
