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

namespace Google\Task;

use Composer\Script\Event;
use InvalidArgumentException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class Composer
{
    /**
     * @param Event $event Composer event passed in for any script method
     * @param Filesystem $filesystem Optional. Used for testing.
     */
    public static function cleanup(
        Event $event,
        ?Filesystem $filesystem = null
    ) {
        $composer = $event->getComposer();
        $extra = $composer->getPackage()->getExtra();
        $servicesToKeep = $extra['google/apiclient-services'] ?? [];
        if (empty($servicesToKeep)) {
            return;
        }
        $vendorDir = $composer->getConfig()->get('vendor-dir');
        $serviceDir = sprintf(
            '%s/google/apiclient-services/src/Google/Service',
            $vendorDir
        );
        if (!is_dir($serviceDir)) {
            // path for google/apiclient-services >= 0.200.0
            $serviceDir = sprintf(
                '%s/google/apiclient-services/src',
                $vendorDir
            );
        }
        self::verifyServicesToKeep($serviceDir, $servicesToKeep);
        $finder = self::getServicesToRemove($serviceDir, $servicesToKeep);
        $filesystem = $filesystem ?: new Filesystem();
        $servicesToRemoveCount = $finder->count();
        if (0 === $servicesToRemoveCount) {
            return;
        }
        $event->getIO()->write(
            sprintf('Removing %d google services', $servicesToRemoveCount)
        );
        $pathsToRemove = iterator_to_array($finder);
        foreach ($pathsToRemove as $pathToRemove) {
            $realpath = $pathToRemove->getRealPath();
            $filesystem->remove($realpath);
            $filesystem->remove($realpath . '.php');
        }
    }

    /**
     * @throws InvalidArgumentException when the service doesn't exist
     */
    private static function verifyServicesToKeep(
        $serviceDir,
        array $servicesToKeep
    ) {
        $finder = (new Finder())
            ->directories()
            ->depth('== 0');

        foreach ($servicesToKeep as $service) {
            if (!preg_match('/^[a-zA-Z0-9]*$/', $service)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Invalid Google service name "%s"',
                        $service
                    )
                );
            }
            try {
                $finder->in($serviceDir . '/' . $service);
            } catch (InvalidArgumentException $e) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Google service "%s" does not exist or was removed previously',
                        $service
                    )
                );
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
            ->exclude($servicesToKeep);
    }
}
