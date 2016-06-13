<?php
/*
 * Copyright 2014 Google Inc.
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

class Google_Task_RunnerTest extends BaseTest
{
  private $client;

  private $mockedCallsCount = 0;
  private $currentMockedCall = 0;
  private $mockedCalls = array();
  private $retryMap;
  private $retryConfig;

  protected function setUp()
  {
    $this->client = new Google_Client();
  }

  /**
   * @dataProvider defaultRestErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testRestRetryOffByDefault($errorCode, $errorBody = '{}')
  {
    $this->setNextResponse($errorCode, $errorBody)->makeRequest();
  }

  /**
   * @dataProvider defaultRestErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testOneRestRetryWithError($errorCode, $errorBody = '{}')
  {
    $this->setRetryConfig(array('retries' => 1));
    $this->setNextResponses(2, $errorCode, $errorBody)->makeRequest();
  }

  /**
   * @dataProvider defaultRestErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testMultipleRestRetriesWithErrors(
      $errorCode,
      $errorBody = '{}'
  ) {
    $this->setRetryConfig(array('retries' => 5));
    $this->setNextResponses(6, $errorCode, $errorBody)->makeRequest();
  }

  /**
   * @dataProvider defaultRestErrorProvider
   */
  public function testOneRestRetryWithSuccess($errorCode, $errorBody = '{}')
  {
    $this->setRetryConfig(array('retries' => 1));
    $result = $this->setNextResponse($errorCode, $errorBody)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

    $this->assertEquals('{"success": true}', (string) $result->getBody());
  }

  /**
   * @dataProvider defaultRestErrorProvider
   */
  public function testMultipleRestRetriesWithSuccess(
      $errorCode,
      $errorBody = '{}'
  ) {
    $this->setRetryConfig(array('retries' => 5));
    $result = $this->setNextResponses(2, $errorCode, $errorBody)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

    $this->assertEquals('{"success": true}', (string) $result->getBody());
  }

  /**
   * @dataProvider defaultRestErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testCustomRestRetryMapReplacesDefaults(
      $errorCode,
      $errorBody = '{}'
  ) {
    $this->setRetryMap(array());

    $this->setRetryConfig(array('retries' => 5));
    $this->setNextResponse($errorCode, $errorBody)->makeRequest();
  }

  public function testCustomRestRetryMapAddsNewHandlers()
  {
    $this->setRetryMap(
        array('403' => Google_Task_Runner::TASK_RETRY_ALWAYS)
    );

    $this->setRetryConfig(array('retries' => 5));
    $result = $this->setNextResponses(2, 403)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

    $this->assertEquals('{"success": true}', (string) $result->getBody());
  }

  /**
   * @expectedException Google_Service_Exception
   * @dataProvider customLimitsProvider
   */
  public function testCustomRestRetryMapWithCustomLimits($limit)
  {
    $this->setRetryMap(
        array('403' => $limit)
    );

    $this->setRetryConfig(array('retries' => 5));
    $this->setNextResponses($limit + 1, 403)->makeRequest();
  }

  /**
   * @dataProvider timeoutProvider
   */
  public function testRestTimeouts($config, $minTime)
  {
    $this->setRetryConfig($config);
    $this->setNextResponses($config['retries'], 500)
         ->setNextResponse(200, '{"success": true}');

    $this->assertTaskTimeGreaterThanOrEqual(
        $minTime,
        array($this, 'makeRequest'),
        $config['initial_delay'] / 10
    );
  }

  /**
   * @requires extension curl
   * @dataProvider defaultCurlErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testCurlRetryOffByDefault($errorCode, $errorMessage = '')
  {
    $this->setNextResponseThrows($errorMessage, $errorCode)->makeRequest();
  }

  /**
   * @requires extension curl
   * @dataProvider defaultCurlErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testOneCurlRetryWithError($errorCode, $errorMessage = '')
  {
    $this->setRetryConfig(array('retries' => 1));
    $this->setNextResponsesThrow(2, $errorMessage, $errorCode)->makeRequest();
  }

  /**
   * @requires extension curl
   * @dataProvider defaultCurlErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testMultipleCurlRetriesWithErrors(
      $errorCode,
      $errorMessage = ''
  ) {
    $this->setRetryConfig(array('retries' => 5));
    $this->setNextResponsesThrow(6, $errorMessage, $errorCode)->makeRequest();
  }

  /**
   * @requires extension curl
   * @dataProvider defaultCurlErrorProvider
   */
  public function testOneCurlRetryWithSuccess($errorCode, $errorMessage = '')
  {
    $this->setRetryConfig(array('retries' => 1));
    $result = $this->setNextResponseThrows($errorMessage, $errorCode)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

    $this->assertEquals('{"success": true}', (string) $result->getBody());
  }

  /**
   * @requires extension curl
   * @dataProvider defaultCurlErrorProvider
   */
  public function testMultipleCurlRetriesWithSuccess(
      $errorCode,
      $errorMessage = ''
  ) {
    $this->setRetryConfig(array('retries' => 5));
    $result = $this->setNextResponsesThrow(2, $errorMessage, $errorCode)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

    $this->assertEquals('{"success": true}', (string) $result->getBody());
  }

  /**
   * @requires extension curl
   * @dataProvider defaultCurlErrorProvider
   * @expectedException Google_Service_Exception
   */
  public function testCustomCurlRetryMapReplacesDefaults(
      $errorCode,
      $errorMessage = ''
  ) {
    $this->setRetryMap(array());

    $this->setRetryConfig(array('retries' => 5));
    $this->setNextResponseThrows($errorMessage, $errorCode)->makeRequest();
  }

  /**
   * @requires extension curl
   */
  public function testCustomCurlRetryMapAddsNewHandlers()
  {
    $this->setRetryMap(
        array(CURLE_COULDNT_RESOLVE_PROXY => Google_Task_Runner::TASK_RETRY_ALWAYS)
    );

    $this->setRetryConfig(array('retries' => 5));
    $result = $this->setNextResponsesThrow(2, '', CURLE_COULDNT_RESOLVE_PROXY)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

    $this->assertEquals('{"success": true}', (string) $result->getBody());
  }

  /**
   * @requires extension curl
   * @expectedException Google_Service_Exception
   * @dataProvider customLimitsProvider
   */
  public function testCustomCurlRetryMapWithCustomLimits($limit)
  {
    $this->setRetryMap(
        array(CURLE_COULDNT_RESOLVE_PROXY => $limit)
    );

    $this->setRetryConfig(array('retries' => 5));
    $this->setNextResponsesThrow($limit + 1, '', CURLE_COULDNT_RESOLVE_PROXY)
         ->makeRequest();
  }

  /**
   * @requires extension curl
   * @dataProvider timeoutProvider
   */
  public function testCurlTimeouts($config, $minTime)
  {
    $this->setRetryConfig($config);
    $this->setNextResponsesThrow($config['retries'], '', CURLE_GOT_NOTHING)
         ->setNextResponse(200, '{"success": true}');

    $this->assertTaskTimeGreaterThanOrEqual(
        $minTime,
        array($this, 'makeRequest'),
        $config['initial_delay'] / 10
    );
  }

  /**
   * @dataProvider badTaskConfigProvider
   */
  public function testBadTaskConfig($config, $message)
  {
    $this->setExpectedException('Google_Task_Exception', $message);
    $this->setRetryConfig($config);

    new Google_Task_Runner(
        $this->retryConfig,
        '',
        array($this, 'testBadTaskConfig')
    );
  }

  /**
   * @expectedException Google_Task_Exception
   * @expectedExceptionMessage must be a valid callable
   */
  public function testBadTaskCallback()
  {
    $config = [];
    new Google_Task_Runner($config, '', 5);
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function testTaskRetryOffByDefault()
  {
    $this->setNextTaskAllowedRetries(Google_Task_Runner::TASK_RETRY_ALWAYS)
         ->runTask();
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function testOneTaskRetryWithError()
  {
    $this->setRetryConfig(array('retries' => 1));
    $this->setNextTasksAllowedRetries(2, Google_Task_Runner::TASK_RETRY_ALWAYS)
         ->runTask();
  }

  /**
   * @expectedException Google_Service_Exception
   */
  public function testMultipleTaskRetriesWithErrors()
  {
    $this->setRetryConfig(array('retries' => 5));
    $this->setNextTasksAllowedRetries(6, Google_Task_Runner::TASK_RETRY_ALWAYS)
         ->runTask();
  }

  public function testOneTaskRetryWithSuccess()
  {
    $this->setRetryConfig(array('retries' => 1));
    $result = $this->setNextTaskAllowedRetries(Google_Task_Runner::TASK_RETRY_ALWAYS)
                   ->setNextTaskReturnValue('success')
                   ->runTask();

    $this->assertEquals('success', $result);
  }

  public function testMultipleTaskRetriesWithSuccess()
  {
    $this->setRetryConfig(array('retries' => 5));
    $result = $this->setNextTasksAllowedRetries(2, Google_Task_Runner::TASK_RETRY_ALWAYS)
                   ->setNextTaskReturnValue('success')
                   ->runTask();

    $this->assertEquals('success', $result);
  }

  /**
   * @expectedException Google_Service_Exception
   * @dataProvider customLimitsProvider
   */
  public function testTaskRetryWithCustomLimits($limit)
  {
    $this->setRetryConfig(array('retries' => 5));
    $this->setNextTasksAllowedRetries($limit + 1, $limit)
         ->runTask();
  }

  /**
   * @dataProvider timeoutProvider
   */
  public function testTaskTimeouts($config, $minTime)
  {
    $this->setRetryConfig($config);
    $this->setNextTasksAllowedRetries($config['retries'], $config['retries'] + 1)
         ->setNextTaskReturnValue('success');

    $this->assertTaskTimeGreaterThanOrEqual(
        $minTime,
        array($this, 'runTask'),
        $config['initial_delay'] / 10
    );
  }

  public function testTaskWithManualRetries()
  {
    $this->setRetryConfig(array('retries' => 2));
    $this->setNextTasksAllowedRetries(2, Google_Task_Runner::TASK_RETRY_ALWAYS);

    $task = new Google_Task_Runner(
        $this->retryConfig,
        '',
        array($this, 'runNextTask')
    );

    $this->assertTrue($task->canAttempt());
    $this->assertTrue($task->attempt());

    $this->assertTrue($task->canAttempt());
    $this->assertTrue($task->attempt());

    $this->assertTrue($task->canAttempt());
    $this->assertTrue($task->attempt());

    $this->assertFalse($task->canAttempt());
    $this->assertFalse($task->attempt());
  }

  /**
   * Provider for backoff configurations and expected minimum runtimes.
   *
   * @return array
   */
  public function timeoutProvider()
  {
    $config = array('initial_delay' => .001, 'max_delay' => .01);

    return array(
        array(array_merge($config, array('retries' => 1)), .001),
        array(array_merge($config, array('retries' => 2)), .0015),
        array(array_merge($config, array('retries' => 3)), .00225),
        array(array_merge($config, array('retries' => 4)), .00375),
        array(array_merge($config, array('retries' => 5)), .005625)
    );
  }

  /**
   * Provider for custom retry limits.
   *
   * @return array
   */
  public function customLimitsProvider()
  {
    return array(
        array(Google_Task_Runner::TASK_RETRY_NEVER),
        array(Google_Task_Runner::TASK_RETRY_ONCE),
    );
  }

  /**
   * Provider for invalid task configurations.
   *
   * @return array
   */
  public function badTaskConfigProvider()
  {
    return array(
        array(array('initial_delay' => -1), 'must not be negative'),
        array(array('max_delay' => 0), 'must be greater than 0'),
        array(array('factor' => 0), 'must be greater than 0'),
        array(array('jitter' => 0), 'must be greater than 0'),
        array(array('retries' => -1), 'must not be negative')
    );
  }

  /**
   * Provider for the default REST errors.
   *
   * @return array
   */
  public function defaultRestErrorProvider()
  {
    return array(
        array(500),
        array(503),
        array(403, '{"error":{"errors":[{"reason":"rateLimitExceeded"}]}}'),
        array(403, '{"error":{"errors":[{"reason":"userRateLimitExceeded"}]}}'),
    );
  }

  /**
   * Provider for the default cURL errors.
   *
   * @return array
   */
  public function defaultCurlErrorProvider()
  {
    return array(
        array(6),  // CURLE_COULDNT_RESOLVE_HOST
        array(7),  // CURLE_COULDNT_CONNECT
        array(28), // CURLE_OPERATION_TIMEOUTED
        array(35), // CURLE_SSL_CONNECT_ERROR
        array(52), // CURLE_GOT_NOTHING
    );
  }

  /**
   * Assert the minimum amount of time required to run a task.
   *
   * NOTE: Intentionally crude for brevity.
   *
   * @param float $expected The expected minimum execution time
   * @param callable $callback The task to time
   * @param float $delta Allowable relative error
   *
   * @throws PHPUnit_Framework_ExpectationFailedException
   */
  public static function assertTaskTimeGreaterThanOrEqual(
      $expected,
      $callback,
      $delta = 0.0
  ) {
    $time = microtime(true);

    call_user_func($callback);

    self::assertThat(
        microtime(true) - $time,
        self::logicalOr(
            self::greaterThan($expected),
            self::equalTo($expected, $delta)
        )
    );
  }

  /**
   * Sets the task runner configurations.
   *
   * @param array $config The task runner configurations
   */
  private function setRetryConfig(array $config)
  {
    $config += array(
        'initial_delay' => .0001,
        'max_delay' => .001,
        'factor' => 2,
        'jitter' => .5,
        'retries' => 1
    );
    $this->retryConfig = $config;
  }

  private function setRetryMap(array $retryMap)
  {
    $this->retryMap = $retryMap;
  }

  /**
   * Sets the next responses.
   *
   * @param integer $count The number of responses
   * @param string $code The response code
   * @param string $body The response body
   * @param array $headers The response headers
   *
   * @return TaskTest
   */
  private function setNextResponses(
      $count,
      $code = '200',
      $body = '{}',
      array $headers = array()
  ) {
    while ($count-- > 0) {
      $this->setNextResponse($code, $body, $headers);
    }

    return $this;
  }

  /**
   * Sets the next response.
   *
   * @param string $code The response code
   * @param string $body The response body
   * @param array $headers The response headers
   *
   * @return TaskTest
   */
  private function setNextResponse(
      $code = '200',
      $body = '{}',
      array $headers = array()
  ) {
    $this->mockedCalls[$this->mockedCallsCount++] = array(
        'code' => (string) $code,
        'headers' => $headers,
        'body' => is_string($body) ? $body : json_encode($body)
    );

    return $this;
  }

  /**
   * Forces the next responses to throw an IO exception.
   *
   * @param integer $count The number of responses
   * @param string $message The exception messages
   * @param string $code The exception code
   *
   * @return TaskTest
   */
  private function setNextResponsesThrow($count, $message, $code)
  {
    while ($count-- > 0) {
      $this->setNextResponseThrows($message, $code);
    }

    return $this;
  }

  /**
   * Forces the next response to throw an IO exception.
   *
   * @param string $message The exception messages
   * @param string $code The exception code
   *
   * @return TaskTest
   */
  private function setNextResponseThrows($message, $code)
  {
    $this->mockedCalls[$this->mockedCallsCount++] = new Google_Service_Exception(
        $message,
        $code,
        null,
        array()
    );

    return $this;
  }

  /**
   * Runs the defined request.
   *
   * @return array
   */
  private function makeRequest()
  {
    $request = new Request('GET', '/test');
    $http = $this->getMock('GuzzleHttp\ClientInterface');
    $http->expects($this->exactly($this->mockedCallsCount))
       ->method('send')
       ->will($this->returnCallback(array($this, 'getNextMockedCall')));

    if ($this->isGuzzle5()) {
      $http->expects($this->exactly($this->mockedCallsCount))
       ->method('createRequest')
       ->will($this->returnValue(new GuzzleHttp\Message\Request('GET', '/test')));
    }

    return Google_Http_REST::execute($http, $request, '', $this->retryConfig, $this->retryMap);
  }

  /**
   * Gets the next mocked response.
   *
   * @param Google_Http_Request $request The mocked request
   *
   * @return Google_Http_Request
   */
  public function getNextMockedCall($request)
  {
    $current = $this->mockedCalls[$this->currentMockedCall++];

    if ($current instanceof Exception) {
      throw $current;
    }

    $stream = Psr7\stream_for($current['body']);
    $response = new Response($current['code'], $current['headers'], $stream);

    return $response;
  }

  /**
   * Sets the next task return value.
   *
   * @param mixed $value The next return value
   *
   * @return TaskTest
   */
  private function setNextTaskReturnValue($value)
  {
    $this->mockedCalls[$this->mockedCallsCount++] = $value;
    return $this;
  }

  /**
   * Sets the next exception `allowedRetries()` return value.
   *
   * @param boolean $allowedRetries The next `allowedRetries()` return value.
   *
   * @return TaskTest
   */
  private function setNextTaskAllowedRetries($allowedRetries)
  {
    $this->mockedCalls[$this->mockedCallsCount++] = $allowedRetries;
    return $this;
  }

  /**
   * Sets multiple exception `allowedRetries()` return value.
   *
   * @param integer $count The number of `allowedRetries()` return values.
   * @param boolean $allowedRetries The `allowedRetries()` return value.
   *
   * @return TaskTest
   */
  private function setNextTasksAllowedRetries($count, $allowedRetries)
  {
    while ($count-- > 0) {
      $this->setNextTaskAllowedRetries($allowedRetries);
    }

    return $this;
  }

  /**
   * Runs the defined task.
   *
   * @return mixed
   */
  private function runTask()
  {
    $task = new Google_Task_Runner(
        $this->retryConfig,
        '',
        array($this, 'runNextTask')
    );

    if (null !== $this->retryMap) {
      $task->setRetryMap($this->retryMap);
    }

    $exception = $this->getMockBuilder('Google_Service_Exception')
      // HHVM blows up unless this is set
      // @see https://github.com/sebastianbergmann/phpunit-mock-objects/issues/207
      ->setMethods(array('setTraceOptions'))
      ->disableOriginalConstructor()
      ->getMock();
    $exceptionCount = 0;
    $exceptionCalls = array();

    for ($i = 0; $i < $this->mockedCallsCount; $i++) {
      if (is_int($this->mockedCalls[$i])) {
        $exceptionCalls[$exceptionCount++] = $this->mockedCalls[$i];
        $this->mockedCalls[$i] = $exception;
      }
    }

    $task->setRetryMap($exceptionCalls);

    return $task->run();
  }

  /**
   * Gets the next task return value.
   *
   * @return mixed
   */
  public function runNextTask()
  {
    $current = $this->mockedCalls[$this->currentMockedCall++];

    if ($current instanceof Exception) {
      throw $current;
    }

    return $current;
  }
}
