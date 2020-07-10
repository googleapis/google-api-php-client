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
        $consecutive = [];
        foreach ($files as $filename) {
            $file = new \SplFileInfo($serviceDir . $filename);
            $consecutive[] = [$this->equalTo($file->getRealPath())];
        }
        $mockFS = $this->getMockBuilder('Symfony\Component\Filesystem\Filesystem')
            ->disableOriginalConstructor()
             ->setMethods(['remove'])
            ->getMock();

        call_user_func_array(
            [$mockFS->method('remove'), 'withConsecutive'],
            $consecutive
        );

        return $mockFS;
    }

    private function createMockEvent(
        array $servicesToKeep,
        $vendorDir = '',
        $print = null
    ) {
        $mockPackage = $this->getMockBuilder('Composer\Package\RootPackage')
            ->disableOriginalConstructor()
            ->getMock();
        $mockPackage->method('getExtra')
            ->will($this->returnValue([
                'google/apiclient-services' => $servicesToKeep
            ]));

        $mockConfig = $this->getMockBuilder('Composer\Config')->getMock();
        $mockConfig->method('get')
            ->will($this->returnValue($vendorDir));

        $mockComposer = $this->getMockBuilder('Composer\Composer')->getMock();
        $mockComposer->method('getPackage')
            ->will($this->returnValue($mockPackage));
        $mockComposer->method('getConfig')
            ->will($this->returnValue($mockConfig));

        $mockEvent = $this->getMockBuilder('Composer\Script\Event')
            ->disableOriginalConstructor()
            ->getMock();
        $mockEvent->method('getComposer')
            ->will($this->returnValue($mockComposer));

        if ($print) {
            $mockIO = $this->getMockBuilder('Composer\IO\ConsoleIO')
                ->disableOriginalConstructor()
                ->getMock();
            $mockIO->method('write')
                ->with($print);

            $mockEvent->method('getIO')
                ->will($this->returnValue($mockIO));
        }

        return $mockEvent;
    }
}