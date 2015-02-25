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

// PHP 5.2 compatibility: E_USER_DEPRECATED was added in 5.3
if (!defined('E_USER_DEPRECATED')) {
  define('E_USER_DEPRECATED', E_USER_WARNING);
}

$error = "google-api-php-client's autoloader was moved to src/Google/autoload.php in 1.1.3. This ";
$error .= "redirect will be removed in 1.2. Please adjust your code to use the new location.";
trigger_error($error, E_USER_DEPRECATED);
require_once dirname(__FILE__) . '/src/Google/autoload.php';
