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

class LoggerTest extends PHPUnit_Framework_TestCase
{
  private $client;

  public function setup()
  {
    $this->client = new Google_Client();
  }

  /**
   * @dataProvider logLevelsProvider
   */
  public function testPsrMethods($key)
  {
    $message = 'This is my log message';
    $context = array('some'=>'context');

    $logger = $this->getLogger('log');
    $logger->expects($this->once())
           ->method('log')
           ->with($key, $message, $context);

    call_user_func(array($logger, $key), $message, $context);
  }

  /**
   * @dataProvider invalidLevelsProvider
   * @expectedException Google_Logger_Exception
   * @expectedExceptionMessage Unknown LogLevel
   */
  public function testSetLabelWithBadValue($level)
  {
    $this->getLogger()->setLevel($level);
  }

  /**
   * @dataProvider invalidLevelsProvider
   * @expectedException Google_Logger_Exception
   * @expectedExceptionMessage Unknown LogLevel
   */
  public function testSetLabelWithBadValueFromConfig($level)
  {
    $this->client->setClassConfig('Google_Logger_Abstract', 'level', $level);
    $this->getLogger();
  }

  /**
   * @dataProvider filterProvider
   */
  public function testShouldHandle($setLevel, $handleLevel, $expected)
  {
    $logger = $this->getLogger();
    $logger->setLevel($setLevel);

    $this->assertEquals($expected, $logger->shouldHandle($handleLevel));
  }

  /**
   * @dataProvider filterProvider
   */
  public function testShouldHandleFromConfig($config, $handleLevel, $expected)
  {
    $this->client->setClassConfig('Google_Logger_Abstract', 'level', $config);
    $logger = $this->getLogger();

    $this->assertEquals($expected, $logger->shouldHandle($handleLevel));
  }

  /**
   * @dataProvider filterProvider
   */
  public function testShouldWrite($setLevel, $logLevel, $expected)
  {
    $logger = $this->getLogger();
    $logger->expects($expected ? $this->once() : $this->never())
           ->method('write');

    $logger->setLevel($setLevel);
    $logger->log($logLevel, 'This is my log message');
  }

  /**
   * @dataProvider filterProvider
   */
  public function testShouldWriteFromConfig($config, $logLevel, $expected)
  {
    $this->client->setClassConfig('Google_Logger_Abstract', 'level', $config);
    $logger = $this->getLogger();
    $logger->expects($expected ? $this->once() : $this->never())
           ->method('write');

    $logger->log($logLevel, 'This is my log message');
  }

  /**
   * @dataProvider formattingProvider
   */
  public function testMessageFormatting(
      $format,
      $date_format,
      $newlines,
      $message,
      $context,
      $expected
  ) {
    $this->client->setClassConfig(
        'Google_Logger_Abstract',
        'log_format',
        $format
    );
    $this->client->setClassConfig(
        'Google_Logger_Abstract',
        'date_format',
        $date_format
    );
    $this->client->setClassConfig(
        'Google_Logger_Abstract',
        'allow_newlines',
        $newlines
    );

    $logger = $this->getLogger();
    $logger->expects($this->once())
           ->method('write')
           ->with($expected);

    $logger->log('debug', $message, $context);
  }

  public function testNullLoggerNeverWrites()
  {
    $logger = $this->getLogger('write', 'Google_Logger_Null');
    $logger->expects($this->never())
           ->method('write');

    $logger->log(
        'emergency',
        'Should not be written',
        array('same' => 'for this')
    );
  }

  public function testNullLoggerNeverHandles()
  {
    $logger = $this->getLogger('write', 'Google_Logger_Null');
    $this->assertFalse($logger->shouldHandle('emergency'));
    $this->assertFalse($logger->shouldHandle(600));
  }

  public function testPsrNeverWrites()
  {
    $logger = $this->getLogger('write', 'Google_Logger_Psr');
    $logger->expects($this->never())
           ->method('write');

    $logger->log(
        'emergency',
        'Should not be written',
        array('same' => 'for this')
    );

    $logger->setLogger($this->getLogger());

    $logger->log(
        'emergency',
        'Should not be written',
        array('same' => 'for this')
    );
  }

  public function testPsrNeverShouldHandleWhenNoLoggerSet()
  {
    $logger = $this->getLogger(null, 'Google_Logger_Psr');
    $this->assertFalse($logger->shouldHandle('emergency'));
    $this->assertFalse($logger->shouldHandle(600));
  }

  public function testPsrShouldHandleWhenLoggerSet()
  {
    $logger = $this->getLogger(null, 'Google_Logger_Psr');
    $logger->setLogger($this->getLogger());

    $this->assertTrue($logger->shouldHandle('emergency'));
    $this->assertTrue($logger->shouldHandle(600));
  }

  /**
   * @dataProvider logLevelsProvider
   */
  public function testPsrDelegates($key)
  {
    $message = 'This is my log message';
    $context = array('some'=>'context');

    $delegate = $this->getLogger('log');
    $delegate->expects($this->once())
             ->method('log')
             ->with($key, $message, $context);

    $logger = $this->getLogger(null, 'Google_Logger_Psr');
    $logger->setLogger($delegate);

    call_user_func(array($logger, $key), $message, $context);
  }

  /**
   * @expectedException Google_Logger_Exception
   * @expectedExceptionMessage File logger requires a filename or a valid file pointer
   */
  public function testLoggerWithBadFileType()
  {
    $this->client->setClassConfig('Google_Logger_File', 'file', false);
    $logger = $this->getLogger(null, 'Google_Logger_File');
  }

  /**
   * @expectedException Google_Logger_Exception
   * @expectedExceptionMessage Logger Error
   */
  public function testLoggerWithBadFileValue()
  {
    $this->client->setClassConfig('Google_Logger_File', 'file', 'not://exist');

    $logger = $this->getLogger(null, 'Google_Logger_File');
    $logger->log('emergency', 'will fail');
  }

  /**
   * @expectedException Google_Logger_Exception
   * @expectedExceptionMessage File pointer is no longer available
   */
  public function testLoggerWithClosedFileReference()
  {
    $fp = fopen('php://memory', 'r+');

    $this->client->setClassConfig('Google_Logger_File', 'file', $fp);
    $logger = $this->getLogger(null, 'Google_Logger_File');

    fclose($fp);

    $logger->log('emergency', 'will fail');
  }

  public function testLoggerWithFileReference()
  {
    $fp = fopen('php://memory', 'r+');

    $this->client->setClassConfig('Google_Logger_File', 'file', $fp);
    $this->client->setClassConfig(
        'Google_Logger_Abstract',
        'log_format',
        "%level% - %message%\n"
    );

    $logger = $this->getLogger(null, 'Google_Logger_File');
    $logger->log('emergency', 'test one');
    $logger->log('alert', 'test two');
    $logger->log(500, 'test three');

    rewind($fp);
    $this->assertEquals(
        "EMERGENCY - test one\nALERT - test two\nCRITICAL - test three\n",
        stream_get_contents($fp)
    );

    fclose($fp);
  }

  public function testLoggerWithFile()
  {
    $this->expectOutputString(
        "EMERGENCY - test one\nALERT - test two\nCRITICAL - test three\n"
    );

    $this->client->setClassConfig(
        'Google_Logger_File',
        'file',
        'php://output'
    );
    $this->client->setClassConfig(
        'Google_Logger_Abstract',
        'log_format',
        "%level% - %message%\n"
    );

    $logger = $this->getLogger(null, 'Google_Logger_File');
    $logger->log('emergency', 'test one');
    $logger->log('alert', 'test two');
    $logger->log(500, 'test three');
  }

  public function formattingProvider()
  {
    return array(
        'no interpolation' => array(
            'this is my format',
            'd/M/Y:H:i:s O',
            false,
            'you wont see this',
            array('or' => 'this'),
            'this is my format',
        ),
        'only message interpolation' => array(
            'my format: %message%',
            'd/M/Y:H:i:s O',
            false,
            'you will see this',
            array('but not' => 'this'),
            'my format: you will see this',
        ),
        'message and level interpolation' => array(
            '%level% - my format: %message%',
            'd/M/Y:H:i:s O',
            false,
            'you will see this',
            array('but not' => 'this'),
            'DEBUG - my format: you will see this',
        ),
        'message, level, datetime interpolation' => array(
            '[%datetime%] %level% - my format: %message%',
            '\T\I\M\E',
            false,
            'you will see this',
            array('but not' => 'this'),
            '[TIME] DEBUG - my format: you will see this',
        ),
        'message, level, datetime, context interpolation' => array(
            '[%datetime%] %level% - my format: %message%: %context%',
            '\T\I\M\E',
            false,
            'you will see this',
            array('and' => 'this'),
            '[TIME] DEBUG - my format: you will see this: {"and":"this"}',
        ),
        'reverse JSON in context' => array(
            '%context%',
            'd/M/Y:H:i:s O',
            false,
            'you will not see this',
            array('reverse' => json_encode(array('this' => 'is cool'))),
            '{"reverse":{"this":"is cool"}}',
        ),
        'remove newlines in message' => array(
            '%message%',
            'd/M/Y:H:i:s O',
            false,
            "This \n\n\r\n is \r my \r\n newlines \r\r\r\n\n message",
            array('you wont' => 'see this'),
            'This   is   my   newlines   message',
        ),
        'allow newlines in message' => array(
            '%message%',
            'd/M/Y:H:i:s O',
            true,
            "This \n\n\r\n is \r my \r\n newlines \r\r\r\n\n message",
            array('you wont' => 'see this'),
            "This \n\n\r\n is \r my \r\n newlines \r\r\r\n\n message",
        ),
        'allow newlines in JSON' => array(
            '%context%',
            'd/M/Y:H:i:s O',
            true,
            "wont see this",
            array('you will' => 'see this'),
            version_compare(PHP_VERSION, '5.4.0', '>=') ?
            "{\n    \"you will\": \"see this\"\n}" :
            '{"you will":"see this"}'
        ),
    );
  }

  public function filterProvider()
  {
    return array(
        array('debug', 'debug', true),
        array(100, 'debug', true),
        array('info', 'debug', false),
        array('info', 'notice', true),
        array('notice', 'notice', true),
        array(250, 'notice', true),
        array('notice', 'debug', false),
        array(250, 'alert', true),
        array('error', 'error', true),
        array('error', 'warning', false),
        array('error', 'critical', true),
        array(600, 'alert', false),
        array(600, 'critical', false),
        array(600, 'emergency', true),
        array('emergency', 'emergency', true),
    );
  }

  public function invalidLevelsProvider()
  {
    return array(
        array('100'),
        array('DEBUG'),
        array(100.0),
        array(''),
        array(0),
    );
  }

  public function logLevelsProvider()
  {
    return array(
        array('emergency', 600),
        array('alert', 550),
        array('critical', 500),
        array('error', 400),
        array('warning', 300),
        array('notice', 250),
        array('info', 200),
        array('debug', 100),
    );
  }

  private function getLogger($methods = null, $type = 'Google_Logger_Abstract')
  {
    return $this->getMockBuilder($type)
                ->setMethods((array) $methods)
                ->setConstructorArgs(array($this->client))
                ->getMockForAbstractClass();
  }
}
