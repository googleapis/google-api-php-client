<?php
/*
 * Copyright 2020 Google LLC
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

class Google_Task_ComposerTest extends BaseTest
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Google service "Foo" does not exist
     */
    public function testInvalidServiceName()
    {
        Google_Task_Composer::cleanup($this->createMockEvent(['Foo']));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid Google service name "../YouTube"
     */
    public function testRelatePathServiceName()
    {
        Google_Task_Composer::cleanup($this->createMockEvent(['../YouTube']));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Google service "" does not exist
     */
    public function testEmptyServiceName()
    {
        Google_Task_Composer::cleanup($this->createMockEvent(['']));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid Google service name "YouTube*"
     */
    public function testWildcardServiceName()
    {
        Google_Task_Composer::cleanup($this->createMockEvent(['YouTube*']));
    }

    public function testRemoveServices()
    {
        $vendorDir = sys_get_temp_dir() . '/rand-' . rand();
        $serviceDir = sprintf(
            '%s/google/apiclient-services/src/Google/Service/',
            $vendorDir
        );
        $dirs = [
            'ServiceToKeep',
            'ServiceToDelete1',
            'ServiceToDelete2',
        ];
        $files = [
            'ServiceToKeep/ServiceFoo.php',
            'ServiceToKeep.php',
            'SomeRandomFile.txt',
            'ServiceToDelete1/ServiceFoo.php',
            'ServiceToDelete1.php',
            'ServiceToDelete2/ServiceFoo.php',
            'ServiceToDelete2.php',
        ];
        foreach ($dirs as $dir) {
            @mkdir($serviceDir . $dir, 0777, true);
        }
        foreach ($files as $file) {
            touch($serviceDir . $file);
        }
        $print = 'Removing 2 google services';
        Google_Task_Composer::cleanup(
            $this->createMockEvent(['ServiceToKeep'], $vendorDir, $print),
            $this->createMockFilesystem([
                'ServiceToDelete2',
                'ServiceToDelete2.php',
                'ServiceToDelete1',
                'ServiceToDelete1.php',
            ], $serviceDir)
        );
    }

    private function createMockFilesystem(array $files, $serviceDir)
    {
        $mockFilesystem = $this->prophesize('Symfony\Component\Filesystem\Filesystem');
        foreach ($files as $filename) {
            $file = new \SplFileInfo($serviceDir . $filename);
            $mockFilesystem->remove($file->getRealPath())
                ->shouldBeCalledTimes(1);
        }

        return $mockFilesystem->reveal();
    }

    private function createMockEvent(
        array $servicesToKeep,
        $vendorDir = '',
        $print = null
    ) {
        $mockPackage = $this->prophesize('Composer\Package\RootPackage');
        $mockPackage->getExtra()
            ->shouldBeCalledTimes(1)
            ->willReturn(['google/apiclient-services' => $servicesToKeep]);

        $mockConfig = $this->prophesize('Composer\Config');
        $mockConfig->get('vendor-dir')
            ->shouldBeCalledTimes(1)
            ->willReturn($vendorDir);

        $mockComposer = $this->prophesize('Composer\Composer');
        $mockComposer->getPackage()
            ->shouldBeCalledTimes(1)
            ->willReturn($mockPackage->reveal());
        $mockComposer->getConfig()
            ->shouldBeCalledTimes(1)
            ->willReturn($mockConfig->reveal());

        $mockEvent = $this->prophesize('Composer\Script\Event');
        $mockEvent->getComposer()
            ->shouldBeCalledTimes(1)
            ->willReturn($mockComposer);

        if ($print) {
            $mockIO = $this->prophesize('Composer\IO\ConsoleIO');
            $mockIO->write($print)
                ->shouldBeCalledTimes(1);

            $mockEvent->getIO()
                ->shouldBeCalledTimes(1)
                ->willReturn($mockIO->reveal());
        }

        return $mockEvent->reveal();
    }

    public function testE2E()
    {
        $composerJson = json_encode([
            'require' => [
                'google/apiclient' => 'dev-master'
            ],
            'scripts' => [
                'post-update-cmd' => 'Google_Task_Composer::cleanup'
            ],
            'extra' => [
                'google/apiclient-services' => [
                    'Drive',
                    'YouTube'
                ]
            ]
        ]);

        $tmpDir = sys_get_temp_dir() . '/test-' . rand();
        $serviceDir = $tmpDir . '/vendor/google/apiclient-services/src/Google/Service';

        mkdir($tmpDir);
        file_put_contents($tmpDir . '/composer.json', $composerJson);
        passthru('composer install -d ' . $tmpDir);

        $this->assertFileExists($serviceDir . '/Drive.php');
        $this->assertFileExists($serviceDir . '/Drive');
        $this->assertFileExists($serviceDir . '/YouTube.php');
        $this->assertFileExists($serviceDir . '/YouTube');
        $this->assertFileNotExists($serviceDir . '/YouTubeReporting.php');
        $this->assertFileNotExists($serviceDir . '/YouTubeReporting');

        $composerJson = json_encode([
            'require' => [
                'google/apiclient' => 'dev-master'
            ],
            'scripts' => [
                'post-update-cmd' => 'Google_Task_Composer::cleanup'
            ],
            'extra' => [
                'google/apiclient-services' => [
                    'Drive',
                    'YouTube',
                    'YouTubeReporting',
                ]
            ]
        ]);

        file_put_contents($tmpDir . '/composer.json', $composerJson);
        passthru('rm -r ' . $tmpDir . '/vendor/google/apiclient-services');
        passthru('composer update -d ' . $tmpDir);

        $this->assertFileExists($serviceDir . '/Drive.php');
        $this->assertFileExists($serviceDir . '/Drive');
        $this->assertFileExists($serviceDir . '/YouTube.php');
        $this->assertFileExists($serviceDir . '/YouTube');
        $this->assertFileExists($serviceDir . '/YouTubeReporting.php');
        $this->assertFileExists($serviceDir . '/YouTubeReporting');
    }
}
