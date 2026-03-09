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

/**
 * Example: AndroidPublisher Batch Update with JWT Bearer Authentication
 *
 * This example demonstrates how to use the AndroidPublisher service
 * to perform batch updates of one-time products using JWT Bearer authentication.
 *
 * Usage:
 *   php examples/androidpublisher-batch-update.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Appning\Client;
use Appning\Service\AndroidPublisher\AndroidPublisher;
use Appning\Exception as AppningException;

// Check if serviceAccount.json exists
$serviceAccountFile = __DIR__ . '/../serviceAccount.json';
if (!file_exists($serviceAccountFile)) {
    echo "Error: serviceAccount.json not found.\n";
    echo "Please create a serviceAccount.json file with 'kid' and 'privateKeyPem'.\n";
    exit(1);
}

try {
    // 1. Load client from serviceAccount.json
    $client = new Client();

    $client->fromServiceAccountFile($serviceAccountFile);

    // 2. Create the AndroidPublisher service
    $service = new AndroidPublisher($client);

    // 3. Build the request body for batch update
    $packageName = "com.example.app";

    $batchRequestBody = [
        "oneTimeProduct" => [
            "packageName" => $packageName,
            "productId" => "coin_pack_etc_" . time(),
            "listings" => [
                [
                    "languageCode" => "pt-BR",
                    "title" => "300 Moedas",
                    "description" => "Receba 300 moedas instantaneamente"
                ],
                [
                    "languageCode" => "en-US",
                    "title" => "300 Coins",
                    "description" => "Receive 300 coins instantly"
                ]
            ],
            "purchaseOptions" => [
                [
                    "purchaseOptionId" => "default",
                    "buyOption" => [
                        "legacyCompatible" => true,
                        "multiQuantityEnabled" => false
                    ],
                    "regionalPricingAndAvailabilityConfigs" => [
                        [
                            "regionCode" => "US",
                            "price" => [
                                "currencyCode" => "USD",
                                "units" => "1",
                                "nanos" => 880000000
                            ],
                            "availability" => "AVAILABLE"
                        ]
                    ]
                ]
            ],
            "regionsVersion" => [
                "version" => "2025/03"
            ]
        ],
        "updateMask" => "listings,purchaseOptions",
        "allowMissing" => true,
        "latencyTolerance" => "PRODUCT_UPDATE_LATENCY_TOLERANCE_LATENCY_TOLERANT",
        "regionsVersion" => [
            "version" => "2025/03"
        ]
    ];

    // 4. Call batchUpdate
    echo "Calling batchUpdate for package: {$packageName}\n";
    $response = $service->monetization_onetimeproducts->batchUpdate(
        $packageName,
        ['requests'=>$batchRequestBody]
    );

    // Success: HTTP status code is in 2XX range
    echo "✅ Success\n";
} catch (AppningException $e) {
    // Error: HTTP status code is not in 2XX range
    echo "❌ Error (HTTP {$e->getCode()}): {$e->getMessage()}\n";
    if ($e->getErrors()) {
        echo "Errors:\n";
        print_r($e->getErrors());
    }
} catch (Exception $e) {
    echo "❌ Unexpected error: {$e->getMessage()}\n";
    exit(1);
}