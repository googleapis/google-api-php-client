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

use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class Google_HTTP_RESTTest extends BaseTest
{
  /**
   * @var Google_Http_REST $rest
   */
  private $rest;

  public function setUp()
  {
    $this->rest = new Google_Http_REST();
  }

  public function testDecodeResponse()
  {
    $client = $this->getClient();
    $response = new Response(204);
    $decoded = $this->rest->decodeHttpResponse($response);
    $this->assertEquals(null, $decoded);

    foreach (array(200, 201) as $code) {
      $headers = array('foo', 'bar');
      $stream = Stream::factory('{"a": 1}');
      $response = new Response($code, $headers, $stream);

      $decoded = $this->rest->decodeHttpResponse($response);
      $this->assertEquals(array("a" => 1), $decoded);
    }
  }

  /** @expectedException Google_Service_Exception */
  public function testDecode500ResponseThrowsException()
  {
    $response = new Response(500);
    $this->rest->decodeHttpResponse($response);
  }


  public function testDecodeEmptyResponse()
  {
    $stream = Stream::factory('{}');
    $response = new Response(200, array(), $stream);
    $decoded = $this->rest->decodeHttpResponse($response);
    $this->assertEquals(array(), $decoded);
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function testBadErrorFormatting()
  {
    $stream = Stream::factory(
        '{
         "error": {
          "code": 500,
          "message": null
         }
        }'
    );
    $response = new Response(500, array(), $stream);
    $this->rest->decodeHttpResponse($response);
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function tesProperErrorFormatting()
  {
    $stream = Stream::factory(
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
    $this->rest->decodeHttpResponse($response);
  }
}
