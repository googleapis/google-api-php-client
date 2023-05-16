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

namespace Google\Tests\Task;

use Google\Client;
use Google\Task\Runner;
use Google\Tests\BaseTest;
use Google\Http\Request as GoogleRequest;
use Google\Http\REST;
use Google\Service\Exception as ServiceException;
use Google\Task\Exception as TaskException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Prophecy\Argument;
use Exception;

class RunnerTest extends BaseTest
{
    private $client;

    private $mockedCallsCount = 0;
    private $currentMockedCall = 0;
    private $mockedCalls = [];
    private $retryMap;
    private $retryConfig;

    public function setUp(): void
    {
        $this->client = new Client();
    }

    /**
     * @dataProvider defaultRestErrorProvider
     */
    public function testRestRetryOffByDefault($errorCode, $errorBody = '{}')
    {
        $this->expectException(ServiceException::class);
        $this->setNextResponse($errorCode, $errorBody)->makeRequest();
    }

    /**
     * @dataProvider defaultRestErrorProvider
     */
    public function testOneRestRetryWithError($errorCode, $errorBody = '{}')
    {
        $this->expectException(ServiceException::class);
        $this->setRetryConfig(['retries' => 1]);
        $this->setNextResponses(2, $errorCode, $errorBody)->makeRequest();
    }

    /**
     * @dataProvider defaultRestErrorProvider
     */
    public function testMultipleRestRetriesWithErrors(
        $errorCode,
        $errorBody = '{}'
    ) {
        $this->expectException(ServiceException::class);

        $this->setRetryConfig(['retries' => 5]);
        $this->setNextResponses(6, $errorCode, $errorBody)->makeRequest();
    }

    /**
     * @dataProvider defaultRestErrorProvider
     */
    public function testOneRestRetryWithSuccess($errorCode, $errorBody = '{}')
    {
        $this->setRetryConfig(['retries' => 1]);
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
        $this->setRetryConfig(['retries' => 5]);
        $result = $this->setNextResponses(2, $errorCode, $errorBody)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

        $this->assertEquals('{"success": true}', (string) $result->getBody());
    }

    /**
     * @dataProvider defaultRestErrorProvider
     */
    public function testCustomRestRetryMapReplacesDefaults(
        $errorCode,
        $errorBody = '{}'
    ) {
        $this->expectException(ServiceException::class);

        $this->setRetryMap([]);

        $this->setRetryConfig(['retries' => 5]);
        $this->setNextResponse($errorCode, $errorBody)->makeRequest();
    }

    public function testCustomRestRetryMapAddsNewHandlers()
    {
        $this->setRetryMap(
            ['403' => Runner::TASK_RETRY_ALWAYS]
        );

        $this->setRetryConfig(['retries' => 5]);
        $result = $this->setNextResponses(2, 403)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

        $this->assertEquals('{"success": true}', (string) $result->getBody());
    }

    /**
     * @dataProvider customLimitsProvider
     */
    public function testCustomRestRetryMapWithCustomLimits($limit)
    {
        $this->expectException(ServiceException::class);

        $this->setRetryMap(
            ['403' => $limit]
        );

        $this->setRetryConfig(['retries' => 5]);
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
            [$this, 'makeRequest'],
            $config['initial_delay'] / 10
        );
    }

    /**
     * @requires extension curl
     * @dataProvider defaultCurlErrorProvider
     */
    public function testCurlRetryOffByDefault($errorCode, $errorMessage = '')
    {
        $this->expectException(ServiceException::class);

        $this->setNextResponseThrows($errorMessage, $errorCode)->makeRequest();
    }

    /**
     * @requires extension curl
     * @dataProvider defaultCurlErrorProvider
     */
    public function testOneCurlRetryWithError($errorCode, $errorMessage = '')
    {
        $this->expectException(ServiceException::class);

        $this->setRetryConfig(['retries' => 1]);
        $this->setNextResponsesThrow(2, $errorMessage, $errorCode)->makeRequest();
    }

    /**
     * @requires extension curl
     * @dataProvider defaultCurlErrorProvider
     */
    public function testMultipleCurlRetriesWithErrors(
        $errorCode,
        $errorMessage = ''
    ) {
        $this->expectException(ServiceException::class);

        $this->setRetryConfig(['retries' => 5]);
        $this->setNextResponsesThrow(6, $errorMessage, $errorCode)->makeRequest();
    }

    /**
     * @requires extension curl
     * @dataProvider defaultCurlErrorProvider
     */
    public function testOneCurlRetryWithSuccess($errorCode, $errorMessage = '')
    {
        $this->setRetryConfig(['retries' => 1]);
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
        $this->setRetryConfig(['retries' => 5]);
        $result = $this->setNextResponsesThrow(2, $errorMessage, $errorCode)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

        $this->assertEquals('{"success": true}', (string) $result->getBody());
    }

    /**
     * @requires extension curl
     * @dataProvider defaultCurlErrorProvider
     */
    public function testCustomCurlRetryMapReplacesDefaults(
        $errorCode,
        $errorMessage = ''
    ) {
        $this->expectException(ServiceException::class);

        $this->setRetryMap([]);

        $this->setRetryConfig(['retries' => 5]);
        $this->setNextResponseThrows($errorMessage, $errorCode)->makeRequest();
    }

    /**
     * @requires extension curl
     */
    public function testCustomCurlRetryMapAddsNewHandlers()
    {
        $this->setRetryMap(
            [CURLE_COULDNT_RESOLVE_PROXY => Runner::TASK_RETRY_ALWAYS]
        );

        $this->setRetryConfig(['retries' => 5]);
        $result = $this->setNextResponsesThrow(2, '', CURLE_COULDNT_RESOLVE_PROXY)
                   ->setNextResponse(200, '{"success": true}')
                   ->makeRequest();

        $this->assertEquals('{"success": true}', (string) $result->getBody());
    }

    /**
     * @requires extension curl
     * @dataProvider customLimitsProvider
     */
    public function testCustomCurlRetryMapWithCustomLimits($limit)
    {
        $this->expectException(ServiceException::class);

        $this->setRetryMap(
            [CURLE_COULDNT_RESOLVE_PROXY => $limit]
        );

        $this->setRetryConfig(['retries' => 5]);
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
            [$this, 'makeRequest'],
            $config['initial_delay'] / 10
        );
    }

    /**
     * @dataProvider badTaskConfigProvider
     */
    public function testBadTaskConfig($config, $message)
    {
        $this->expectException(TaskException::class);
        $this->expectExceptionMessage($message);
        $this->setRetryConfig($config);

        new Runner(
            $this->retryConfig,
            '',
            [$this, 'testBadTaskConfig']
        );
    }

    /**
     * @expectedExceptionMessage must be a valid callable
     */
    public function testBadTaskCallback()
    {
        $this->expectException(TaskException::class);
        $config = [];
        new Runner($config, '', 5);
    }

    public function testTaskRetryOffByDefault()
    {
        $this->expectException(ServiceException::class);

        $this->setNextTaskAllowedRetries(Runner::TASK_RETRY_ALWAYS)
         ->runTask();
    }

    public function testOneTaskRetryWithError()
    {
        $this->expectException(ServiceException::class);

        $this->setRetryConfig(['retries' => 1]);
        $this->setNextTasksAllowedRetries(2, Runner::TASK_RETRY_ALWAYS)
         ->runTask();
    }

    public function testMultipleTaskRetriesWithErrors()
    {
        $this->expectException(ServiceException::class);

        $this->setRetryConfig(['retries' => 5]);
        $this->setNextTasksAllowedRetries(6, Runner::TASK_RETRY_ALWAYS)
         ->runTask();
    }

    public function testOneTaskRetryWithSuccess()
    {
        $this->setRetryConfig(['retries' => 1]);
        $result = $this->setNextTaskAllowedRetries(Runner::TASK_RETRY_ALWAYS)
                   ->setNextTaskReturnValue('success')
                   ->runTask();

        $this->assertEquals('success', $result);
    }

    public function testMultipleTaskRetriesWithSuccess()
    {
        $this->setRetryConfig(['retries' => 5]);
        $result = $this->setNextTasksAllowedRetries(2, Runner::TASK_RETRY_ALWAYS)
                   ->setNextTaskReturnValue('success')
                   ->runTask();

        $this->assertEquals('success', $result);
    }

    /**
     * @dataProvider customLimitsProvider
     */
    public function testTaskRetryWithCustomLimits($limit)
    {
        $this->expectException(ServiceException::class);

        $this->setRetryConfig(['retries' => 5]);
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
            [$this, 'runTask'],
            $config['initial_delay'] / 10
        );
    }

    public function testTaskWithManualRetries()
    {
        $this->setRetryConfig(['retries' => 2]);
        $this->setNextTasksAllowedRetries(2, Runner::TASK_RETRY_ALWAYS);

        $task = new Runner(
            $this->retryConfig,
            '',
            [$this, 'runNextTask']
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
        $config = ['initial_delay' => .001, 'max_delay' => .01];

        return [
            [array_merge($config, ['retries' => 1]), .001],
            [array_merge($config, ['retries' => 2]), .0015],
            [array_merge($config, ['retries' => 3]), .00225],
            [array_merge($config, ['retries' => 4]), .00375],
            [array_merge($config, ['retries' => 5]), .005625]
        ];
    }

    /**
     * Provider for custom retry limits.
     *
     * @return array
     */
    public function customLimitsProvider()
    {
        return [
            [Runner::TASK_RETRY_NEVER],
            [Runner::TASK_RETRY_ONCE],
        ];
    }

    /**
     * Provider for invalid task configurations.
     *
     * @return array
     */
    public function badTaskConfigProvider()
    {
        return [
            [['initial_delay' => -1], 'must not be negative'],
            [['max_delay' => 0], 'must be greater than 0'],
            [['factor' => 0], 'must be greater than 0'],
            [['jitter' => 0], 'must be greater than 0'],
            [['retries' => -1], 'must not be negative']
        ];
    }

    /**
     * Provider for the default REST errors.
     *
     * @return array
     */
    public function defaultRestErrorProvider()
    {
        return [
            [500],
            [503],
            [403, '{"error":{"errors":[{"reason":"rateLimitExceeded"}]}}'],
            [403, '{"error":{"errors":[{"reason":"userRateLimitExceeded"}]}}'],
        ];
    }

    /**
     * Provider for the default cURL errors.
     *
     * @return array
     */
    public function defaultCurlErrorProvider()
    {
        return [
            [6],  // CURLE_COULDNT_RESOLVE_HOST
            [7],  // CURLE_COULDNT_CONNECT
            [28], // CURLE_OPERATION_TIMEOUTED
            [35], // CURLE_SSL_CONNECT_ERROR
            [52], // CURLE_GOT_NOTHING
        ];
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
        $config += [
            'initial_delay' => .0001,
            'max_delay' => .001,
            'factor' => 2,
            'jitter' => .5,
            'retries' => 1
        ];
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
        array $headers = []
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
        array $headers = []
    ) {
        $this->mockedCalls[$this->mockedCallsCount++] = [
            'code' => (string) $code,
            'headers' => $headers,
            'body' => is_string($body) ? $body : json_encode($body)
        ];

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
        $this->mockedCalls[$this->mockedCallsCount++] = new ServiceException(
            $message,
            $code,
            null,
            []
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
        $http = $this->prophesize('GuzzleHttp\ClientInterface');

        $http->send(Argument::type('Psr\Http\Message\RequestInterface'), [])
            ->shouldBeCalledTimes($this->mockedCallsCount)
            ->will([$this, 'getNextMockedCall']);

        return REST::execute($http->reveal(), $request, '', $this->retryConfig, $this->retryMap);
    }

    /**
     * Gets the next mocked response.
     *
     * @param GoogleRequest $request The mocked request
     *
     * @return GoogleRequest
     */
    public function getNextMockedCall($request)
    {
        $current = $this->mockedCalls[$this->currentMockedCall++];

        if ($current instanceof Exception) {
            throw $current;
        }

        $stream = Psr7\Utils::streamFor($current['body']);
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
        $task = new Runner(
            $this->retryConfig,
            '',
            [$this, 'runNextTask']
        );

        if (null !== $this->retryMap) {
            $task->setRetryMap($this->retryMap);
        }

        $exception = $this->prophesize(ServiceException::class);

        $exceptionCount = 0;
        $exceptionCalls = [];

        for ($i = 0; $i < $this->mockedCallsCount; $i++) {
            if (is_int($this->mockedCalls[$i])) {
                $exceptionCalls[$exceptionCount++] = $this->mockedCalls[$i];
                $this->mockedCalls[$i] = $exception->reveal();
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
