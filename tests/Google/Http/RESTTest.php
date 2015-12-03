<?php
/*
 * Copyright 2011 Google Inc.
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

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class Google_HTTP_RESTTest extends BaseTest
{
  /**
   * @var Google_Http_REST $rest
   */
  private $rest;

  public function setUp()
  {
    $this->rest = new Google_Http_REST();
    $this->request = new Request('GET', '/');
  }

  public function testDecodeResponse()
  {
    $client = $this->getClient();
    $response = new Response(204);
    $decoded = $this->rest->decodeHttpResponse($response, $this->request);
    $this->assertEquals($response, $decoded);

    foreach (array(200, 201) as $code) {
      $headers = array('foo', 'bar');
      $stream = Psr7\stream_for('{"a": 1}');
      $response = new Response($code, $headers, $stream);

      $decoded = $this->rest->decodeHttpResponse($response, $this->request);
      $this->assertEquals('{"a": 1}', (string) $decoded->getBody());
    }
  }

  public function testDecodeMediaResponse()
  {
    $client = $this->getClient();

    $request =  new Request('GET', 'http://www.example.com?alt=media');
    $headers = array();
    $stream = Psr7\stream_for('thisisnotvalidjson');
    $response = new Response(200, $headers, $stream);

    $decoded = $this->rest->decodeHttpResponse($response, $request);
    $this->assertEquals('thisisnotvalidjson', (string) $decoded->getBody());
  }


  /** @expectedException Google_Service_Exception */
  public function testDecode500ResponseThrowsException()
  {
    $response = new Response(500);
    $this->rest->decodeHttpResponse($response, $this->request);
  }


  public function testDecodeEmptyResponse()
  {
    $stream = Psr7\stream_for('{}');
    $response = new Response(200, array(), $stream);
    $decoded = $this->rest->decodeHttpResponse($response, $this->request);
    $this->assertEquals('{}', (string) $decoded->getBody());
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function testBadErrorFormatting()
  {
    $stream = Psr7\stream_for(
        '{
         "error": {
          "code": 500,
          "message": null
         }
        }'
    );
    $response = new Response(500, array(), $stream);
    $this->rest->decodeHttpResponse($response, $this->request);
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function tesProperErrorFormatting()
  {
    $stream = Psr7\stream_for(
        '{
          error: {
           errors: [
            {
             "domain": "global",
             "reason": "authError",
             "message": "Invalid Credentials",
             "locationType": "header",
             "location": "Authorization",
            }
           ],
          "code": 401,
          "message": "Invalid Credentials"
        }'
    );
    $response = new Response(401, array(), $stream);
    $this->rest->decodeHttpResponse($response, $this->request);
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function testNotJson404Error()
  {
    $stream = Psr7\stream_for('Not Found');
    $response = new Response(404, array(), $stream);
    $this->rest->decodeHttpResponse($response, $this->request);
  }
}
