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
require_once realpath(dirname(__FILE__) . '/../../autoload.php');

class URITemplateTest extends BaseTest
{
  public function testLevelOne()
  {
    $var = "value";
    $hello = "Hello World!";

    $urit = new Google_Utils_URITemplate();
    $this->assertEquals(
        "value",
        $urit->parse("{var}", array("var" => $var))
    );
    $this->assertEquals(
        "Hello%20World%21",
        $urit->parse("{hello}", array("hello" => $hello))
    );
  }

  public function testLevelTwo()
  {
    $var = "value";
    $hello = "Hello World!";
    $path = "/foo/bar";

    $urit = new Google_Utils_URITemplate();
    $this->assertEquals(
        "value",
        $urit->parse("{+var}", array("var" => $var))
    );
    $this->assertEquals(
        "Hello%20World!",
        $urit->parse("{+hello}", array("hello" => $hello))
    );
    $this->assertEquals(
        "/foo/bar/here",
        $urit->parse("{+path}/here", array("path" => $path))
    );
    $this->assertEquals(
        "here?ref=/foo/bar",
        $urit->parse("here?ref={+path}", array("path" => $path))
    );
    $this->assertEquals(
        "X#value",
        $urit->parse("X{#var}", array("var" => $var))
    );
    $this->assertEquals(
        "X#Hello%20World!",
        $urit->parse("X{#hello}", array("hello" => $hello))
    );
  }

  public function testLevelThree()
  {
    $var = "value";
    $hello = "Hello World!";
    $empty = '';
    $path = "/foo/bar";
    $x = "1024";
    $y = "768";

    $urit = new Google_Utils_URITemplate();
    $this->assertEquals(
        "map?1024,768",
        $urit->parse("map?{x,y}", array("x" => $x, "y" => $y))
    );
    $this->assertEquals(
        "1024,Hello%20World%21,768",
        $urit->parse("{x,hello,y}", array("x" => $x, "y" => $y, "hello" => $hello))
    );

    $this->assertEquals(
        "1024,Hello%20World!,768",
        $urit->parse("{+x,hello,y}", array("x" => $x, "y" => $y, "hello" => $hello))
    );
    $this->assertEquals(
        "/foo/bar,1024/here",
        $urit->parse("{+path,x}/here", array("x" => $x, "path" => $path))
    );

    $this->assertEquals(
        "#1024,Hello%20World!,768",
        $urit->parse("{#x,hello,y}", array("x" => $x, "y" => $y, "hello" => $hello))
    );
    $this->assertEquals(
        "#/foo/bar,1024/here",
        $urit->parse("{#path,x}/here", array("x" => $x, "path" => $path))
    );

    $this->assertEquals(
        "X.value",
        $urit->parse("X{.var}", array("var" => $var))
    );
    $this->assertEquals(
        "X.1024.768",
        $urit->parse("X{.x,y}", array("x" => $x, "y" => $y))
    );

    $this->assertEquals(
        "X.value",
        $urit->parse("X{.var}", array("var" => $var))
    );
    $this->assertEquals(
        "X.1024.768",
        $urit->parse("X{.x,y}", array("x" => $x, "y" => $y))
    );

    $this->assertEquals(
        "/value",
        $urit->parse("{/var}", array("var" => $var))
    );
    $this->assertEquals(
        "/value/1024/here",
        $urit->parse("{/var,x}/here", array("x" => $x, "var" => $var))
    );

    $this->assertEquals(
        ";x=1024;y=768",
        $urit->parse("{;x,y}", array("x" => $x, "y" => $y))
    );
    $this->assertEquals(
        ";x=1024;y=768;empty",
        $urit->parse("{;x,y,empty}", array("x" => $x, "y" => $y, "empty" => $empty))
    );

    $this->assertEquals(
        "?x=1024&y=768",
        $urit->parse("{?x,y}", array("x" => $x, "y" => $y))
    );
    $this->assertEquals(
        "?x=1024&y=768&empty=",
        $urit->parse("{?x,y,empty}", array("x" => $x, "y" => $y, "empty" => $empty))
    );

    $this->assertEquals(
        "?fixed=yes&x=1024",
        $urit->parse("?fixed=yes{&x}", array("x" => $x, "y" => $y))
    );
    $this->assertEquals(
        "&x=1024&y=768&empty=",
        $urit->parse("{&x,y,empty}", array("x" => $x, "y" => $y, "empty" => $empty))
    );
  }

  public function testLevelFour()
  {
    $values = array(
      'var'   => "value",
      'hello' => "Hello World!",
      'path'  => "/foo/bar",
      'list'  => array("red", "green", "blue"),
      'keys'  => array("semi" => ";", "dot" => ".", "comma" => ","),
    );

    $tests = array(
      "{var:3}" => "val",
      "{var:30}" => "value",
      "{list}" => "red,green,blue",
      "{list*}" => "red,green,blue",
      "{keys}" => "semi,%3B,dot,.,comma,%2C",
      "{keys*}" => "semi=%3B,dot=.,comma=%2C",
      "{+path:6}/here" => "/foo/b/here",
      "{+list}" => "red,green,blue",
      "{+list*}" => "red,green,blue",
      "{+keys}" => "semi,;,dot,.,comma,,",
      "{+keys*}" => "semi=;,dot=.,comma=,",
      "{#path:6}/here" => "#/foo/b/here",
      "{#list}" => "#red,green,blue",
      "{#list*}" => "#red,green,blue",
      "{#keys}" => "#semi,;,dot,.,comma,,",
      "{#keys*}" => "#semi=;,dot=.,comma=,",
      "X{.var:3}" => "X.val",
      "X{.list}" => "X.red,green,blue",
      "X{.list*}" => "X.red.green.blue",
      "X{.keys}" => "X.semi,%3B,dot,.,comma,%2C",
      "X{.keys*}" => "X.semi=%3B.dot=..comma=%2C",
      "{/var:1,var}" => "/v/value",
      "{/list}" => "/red,green,blue",
      "{/list*}" => "/red/green/blue",
      "{/list*,path:4}" => "/red/green/blue/%2Ffoo",
      "{/keys}" => "/semi,%3B,dot,.,comma,%2C",
      "{/keys*}" => "/semi=%3B/dot=./comma=%2C",
      "{;hello:5}" => ";hello=Hello",
      "{;list}" => ";list=red,green,blue",
      "{;list*}" => ";list=red;list=green;list=blue",
      "{;keys}" => ";keys=semi,%3B,dot,.,comma,%2C",
      "{;keys*}" => ";semi=%3B;dot=.;comma=%2C",
      "{?var:3}" => "?var=val",
      "{?list}" => "?list=red,green,blue",
      "{?list*}" => "?list=red&list=green&list=blue",
      "{?keys}" => "?keys=semi,%3B,dot,.,comma,%2C",
      "{?keys*}" => "?semi=%3B&dot=.&comma=%2C",
      "{&var:3}" => "&var=val",
      "{&list}" => "&list=red,green,blue",
      "{&list*}" => "&list=red&list=green&list=blue",
      "{&keys}" => "&keys=semi,%3B,dot,.,comma,%2C",
      "{&keys*}" => "&semi=%3B&dot=.&comma=%2C",
      "find{?list*}" => "find?list=red&list=green&list=blue",
      "www{.list*}" => "www.red.green.blue"

    );

    $urit = new Google_Utils_URITemplate();

    foreach ($tests as $input => $output) {
      $this->assertEquals($output, $urit->parse($input, $values), $input . " failed");
    }
  }

  public function testMultipleAnnotations()
  {
    $var = "value";
    $hello = "Hello World!";
    $urit = new Google_Utils_URITemplate();
    $this->assertEquals(
        "http://www.google.com/Hello%20World!?var=value",
        $urit->parse(
            "http://www.google.com/{+hello}{?var}",
            array("var" => $var, "hello" => $hello)
        )
    );
    $params = array(
      "playerId" => "me",
      "leaderboardId" => "CgkIhcG1jYEbEAIQAw",
      "timeSpan" => "ALL_TIME",
      "other" => "irrelevant"
    );
    $this->assertEquals(
        "players/me/leaderboards/CgkIhcG1jYEbEAIQAw/scores/ALL_TIME",
        $urit->parse(
            "players/{playerId}/leaderboards/{leaderboardId}/scores/{timeSpan}",
            $params
        )
    );
  }

  /**
   * This test test against the JSON files defined in
   * https://github.com/uri-templates/uritemplate-test
   *
   * We don't ship these tests with it, so they'll just silently
   * skip unless provided - this is mainly for use when
   * making specific URI template changes and wanting
   * to do a full regression check.
   */
  public function testAgainstStandardTests()
  {
    $location = "../../uritemplate-test/*.json";

    $urit = new Google_Utils_URITemplate();
    foreach (glob($location) as $file) {
      $test = json_decode(file_get_contents($file), true);
      foreach ($test as $title => $testsets) {
        foreach ($testsets['testcases'] as $cases) {
          $input = $cases[0];
          $output = $cases[1];
          if ($output == false) {
            continue; // skipping negative tests for now
          } else if (is_array($output)) {
            $response = $urit->parse($input, $testsets['variables']);
            $this->assertContains(
                $response,
                $output,
                $input . " failed from " . $title
            );
          } else {
            $this->assertEquals(
                $output,
                $urit->parse($input, $testsets['variables']),
                $input . " failed."
            );
          }
        }
      }
    }
  }
}
