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

/*
 * Class aliases for vendor compatibility.
 * google/apiclient-services expects these Google\* base classes to exist.
 */

class_alias(\Appning\Service::class, 'Google\Service');
class_alias(\Appning\Client::class, 'Google\Client');
class_alias(\Appning\Service\Resource::class, 'Google\Service\Resource');
class_alias(\Appning\Model::class, 'Google\Model');
class_alias(\Appning\Collection::class, 'Google\Collection');
