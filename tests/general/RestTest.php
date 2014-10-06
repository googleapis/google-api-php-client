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

require_once 'BaseTest.php';
require_once realpath(dirname(__FILE__) . '/../../autoload.php');

class RestTest extends BaseTest
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
    $url = 'http://localhost';
    $client = $this->getClient();
    $response = new Google_Http_Request($url);
    $response->setResponseHttpCode(204);
    $decoded = $this->rest->decodeHttpResponse($response);
    $this->assertEquals(null, $decoded);


    foreach (array(200, 201) as $code) {
      $headers = array('foo', 'bar');
      $response = new Google_Http_Request($url, 'GET', $headers);
      $response->setResponseBody('{"a": 1}');

      $response->setResponseHttpCode($code);
      $decoded = $this->rest->decodeHttpResponse($response);
      $this->assertEquals(array("a" => 1), $decoded);
    }

    $response = new Google_Http_Request($url);
    $response->setResponseHttpCode(500);

    $error = "";
    try {
      $this->rest->decodeHttpResponse($response);
    } catch (Exception $e) {
      $error = $e->getMessage();

    }
    $this->assertEquals(trim($error), "Error calling GET http://localhost: (500)");
  }


  public function testDecodeEmptyResponse()
  {
    $url = 'http://localhost';

    $response = new Google_Http_Request($url, 'GET', array());
    $response->setResponseBody('{}');

    $response->setResponseHttpCode(200);
    $decoded = $this->rest->decodeHttpResponse($response);
    $this->assertEquals(array(), $decoded);
  }

  public function testCreateRequestUri()
  {
    $basePath = "http://localhost";
    $restPath = "/plus/{u}";
    
    // Test Path
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'path';
    $params['u']['value'] = 'me';
    $value = $this->rest->createRequestUri($basePath, $restPath, $params);
    $this->assertEquals("http://localhost/plus/me", $value);

    // Test Query
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'query';
    $params['u']['value'] = 'me';
    $value = $this->rest->createRequestUri($basePath, '/plus', $params);
    $this->assertEquals("http://localhost/plus?u=me", $value);

    // Test Booleans
    $params = array();
    $params['u']['type'] = 'boolean';
    $params['u']['location'] = 'path';
    $params['u']['value'] = '1';
    $value = $this->rest->createRequestUri($basePath, $restPath, $params);
    $this->assertEquals("http://localhost/plus/true", $value);

    $params['u']['location'] = 'query';
    $value = $this->rest->createRequestUri($basePath, '/plus', $params);
    $this->assertEquals("http://localhost/plus?u=true", $value);
    
    // Test encoding
    $params = array();
    $params['u']['type'] = 'string';
    $params['u']['location'] = 'query';
    $params['u']['value'] = '@me/';
    $value = $this->rest->createRequestUri($basePath, '/plus', $params);
    $this->assertEquals("http://localhost/plus?u=%40me%2F", $value);
  }
  
  /**
   * @expectedException Google_Service_Exception
   */
  public function testBadErrorFormatting()
  {
    $request = new Google_Http_Request("/a/b");
    $request->setResponseHttpCode(500);
    $request->setResponseBody(
        '{
         "error": {
          "code": 500,
          "message": null
         }
        }'
    );
    Google_Http_Rest::decodeHttpResponse($request);
  }
  
  /**
   * @expectedException Google_Service_Exception
   */
  public function tesProperErrorFormatting()
  {
    $request = new Google_Http_Request("/a/b");
    $request->setResponseHttpCode(401);
    $request->setResponseBody(
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
    Google_Http_Rest::decodeHttpResponse($request);
  }
}
