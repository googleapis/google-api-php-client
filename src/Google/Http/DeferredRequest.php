<?php
/**
 * Copyright 2019 Google LLC
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

use GuzzleHttp\Psr7\Request;

/**
 * Decorates a PSR-7 request with the expected class for response mapping.
 */
class Google_Http_DeferredRequest extends Request
{
    /**
     * @var string|null
     */
    private $expectedClass;

    /**
     * Set the expected response mapping class.
     *
     * @param string $expectedClass
     */
    public function setExpectedClass($expectedClass)
    {
        $this->expectedClass = $expectedClass;
    }

    /**
     * Get the expected response mapping class.
     *
     * @return string|null
     */
    public function getExpectedClass()
    {
        return $this->expectedClass;
    }
}
