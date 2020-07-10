<?php
/*
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

use Composer\Script\Event;
use Composer\IO\IOInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;


class Google_Task_Composer
{
    public static function cleanup(Event $event)
    {
        $extra = $event->getComposer()->getPackage()->getExtra();
        $servicesToKeep = $extra['google/apiclient-services'] ?? [];
        if ($servicesToKeep) {
            $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
            $serviceDir = $vendorDir . '/google/apiclient-services/src/Google/Service';
            self::verifyServicesToKeep($serviceDir, $servicesToKeep, $event->getIO());
            $finder = self::getServicesToRemove($serviceDir, $servicesToKeep);
            $filesystem = new Filesystem();
            if (0 !== $count = count($finder)) {
                $event->getIO()->write(sprintf(
                    'Removing %s google services', $count
                ));
                foreach ($finder as $file) {
                    $realpath = $file->getRealPath();
                    $filesystem->remove($realpath);
                    $filesystem->remove($realpath . '.php');
                }
            }
        }
    }

    private static function verifyServicesToKeep(
        $serviceDir,
        array $servicesToKeep,
        IOInterface $io
    ) {
        $finder = (new Finder())
            ->directories()
            ->depth('== 0');

        foreach ($servicesToKeep as $service) {
            try {
                $finder->in($serviceDir . '/' . $service);
            } catch (\InvalidArgumentException $e) {
                $io->write(sprintf(
                    'Google service "%s" does not exist', $service
                ));
            }
        }
    }

    private static function getServicesToRemove(
        $serviceDir,
        array $servicesToKeep
    ) {
        // find all files in the current directory
        return (new Finder())
            ->directories()
            ->depth('== 0')
            ->in($serviceDir)
            ->exclude($servicesToKeep)
        ;
    }
}
