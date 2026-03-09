<?php
/*
 * Copyright 2026 Appning Lda.
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

namespace Appning\Service\AndroidPublisher;

use Appning\Service;
use Appning\Service\AndroidPublisher\Resource\MonetizationOneTimeProducts;

/**
 * Service definition for AndroidPublisher (v3).
 *
 * This is a custom implementation that replaces the AndroidPublisher service from
 * google/apiclient-services. It uses a custom endpoint and JWT Bearer authentication.
 *
 * Note: This class uses the same namespace as google/apiclient-services, so it will
 * take precedence when both packages are installed (due to autoloader order).
 */
class AndroidPublisher extends Service
{
    public $rootUrl = 'https://product.faa.faurecia-aptoide.com/api/8.20240517';
    public $rootUrlTemplate = 'https://product.faa.faurecia-aptoide.com/api/8.20240517';
    public $servicePath = '';
    public $version = 'v3';
    public $serviceName = 'androidpublisher';

    /** @var MonetizationOneTimeProducts */
    public $monetization_onetimeproducts;

    /**
     * Constructs the internal representation of the AndroidPublisher service.
     *
     * @param \Appning\Client|array $clientOrConfig The client used to deliver requests, or a
     *                                             config array to pass to a new Client instance.
     */
    public function __construct($clientOrConfig = [])
    {
        parent::__construct($clientOrConfig);
        
        // Override monetization_onetimeproducts resource with custom JWT Bearer authentication
        $this->monetization_onetimeproducts = new MonetizationOneTimeProducts(
            $this,
            $this->serviceName,
            'monetization_onetimeproducts',
            [
                'methods' => [
                    'batchUpdate' => [
                        'path' => '/androidpublisher/v3/applications/{packageName}/oneTimeProducts:batchUpdate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'packageName' => [
                                'type' => 'string',
                                'location' => 'path',
                                'required' => true,
                            ],
                        ],
                    ],
                ],
            ]
        );
    }
}
