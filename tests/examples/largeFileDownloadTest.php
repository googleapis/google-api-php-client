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

namespace Google\Tests\Examples;

use Google\Tests\BaseTest;

class largeFileDownloadTest extends BaseTest
{
    /**
   * @runInSeparateProcess
   */
    public function testSimpleFileDownloadNoToken()
    {
        $this->checkServiceAccountCredentials();

        $crawler = $this->loadExample('large-file-download.php');

        $nodes = $crawler->filter('h1');
        $this->assertCount(1, $nodes);
        $this->assertEquals('File Download - Downloading a large file', $nodes->first()->text());

        $nodes = $crawler->filter('a.login');
        $this->assertCount(1, $nodes);
        $this->assertEquals('Connect Me!', $nodes->first()->text());
    }

    public function testSimpleFileDownloadWithToken()
    {
        $this->checkToken();

        global $_SESSION;
        $_SESSION['upload_token'] = $this->getClient()->getAccessToken();

        $crawler = $this->loadExample('large-file-download.php');

        $buttonText = 'Click here to download a large (20MB) test file';
        $nodes = $crawler->filter('input');
        $this->assertCount(1, $nodes);
        $this->assertEquals($buttonText, $nodes->first()->attr('value'));
    }
}
