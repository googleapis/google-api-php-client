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

require_once 'Google/Client.php';

class BaseTest extends PHPUnit_Framework_TestCase {
  const KEY = "AIzaSyBmnN4x83ZZYZQeuNGznC_CbROFD33HQx0";
  private $token;
  private $memcacheHost;
  private $memcachePort;
  
  public function __construct()
  {
    parent::__construct();
    // Fill in a token JSON here and you can test the oauth token 
    // requiring functions.
    $this->token = '{"access_token":"ya29.1.AADtN_UXfAyuNs4M55QvYe_pXCVynoockn5JECBOL_QfNO0TG8FjQDJYjQDBj1Z5r9LX","token_type":"Bearer","expires_in":3600,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6ImI4M2ZkOGUzMTc4NmFjNGQxY2Q0NGUxZWUxYjM2OWQ3ZmNmNzc3YmMifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwidG9rZW5faGFzaCI6Im1iTzdsN0I3ZkVXTjB4LVpJdVBrWWciLCJhdF9oYXNoIjoibWJPN2w3QjdmRVdOMHgtWkl1UGtZZyIsImF1ZCI6Ijc5Mjk3MDYzODg4Ni5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImlkIjoiMTA0ODI0ODU4MjYxMjM2ODExMzYyIiwic3ViIjoiMTA0ODI0ODU4MjYxMjM2ODExMzYyIiwiY2lkIjoiNzkyOTcwNjM4ODg2LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXpwIjoiNzkyOTcwNjM4ODg2LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiaWF0IjoxMzg2MzgyNTgyLCJleHAiOjEzODYzODY0ODJ9.NH8C3DMqZCaFmE7dYI6B_mjbkNRKPR1m4GbRzdxya7gbo-93P8cngGd-3b915yyqnty0kn7HCPFFk3TksVyjxf00UTJ0-Sc-bNY3ketvt5WH3z-DRawgIXnaBjxhWf07ApoVFOJOsPntpJZhBI7S_NqmT2pr4nutKHpvgXAYNwA","created":1386382882}';
    
    // Fill in memcache values to test the memcache class.
    // $this->memcacheHost = '127.0.0.1';
    // $this->memcachePort = '11211';
  }
  
  public function getClient() {
      $client = new Google_Client();
      $client->setDeveloperKey(self::KEY);
      if (strlen($this->token)) {
          $client->setAccessToken($this->token);
      }
      if (strlen($this->memcacheHost)) {
        $client->setClassConfig('Google_Cache_Memcache', 'host', $this->memcacheHost);
        $client->setClassConfig('Google_Cache_Memcache', 'port', $this->memcachePort);
      }
      return $client;
  }
  
  public function testClientConstructor()
  {
    $this->assertInstanceOf('Google_Client', $this->getClient());
  }
  
  public function testIncludes() {
    $prefix = dirname(dirname(__FILE__)) . '/src/';
    $path = dirname(dirname(__FILE__)) . '/src/Google/Service';
    foreach(glob($path . "/*.php") as $file) {
      // Munge prefix so we don't double require.
      $this->assertEquals(1, require_once(str_replace($prefix, '', $file)));
    }
  }
  
  public function checkToken()
  {
    if (!strlen($this->token)) {
      $this->markTestSkipped('Test requires access token');
      return false;
    }
    return true;
  }

}
