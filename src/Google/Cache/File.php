<?php
/*
 * Copyright 2008 Google Inc.
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

use Google\Auth\CacheInterface;
use Psr\Log\LoggerInterface;

/*
 * This class implements a basic on disk storage. While that does
 * work quite well it's not the most elegant and scalable solution.
 * It will also get you into a heap of trouble when you try to run
 * this in a clustered environment.
 *
 * @author Chris Chabot <chabotc@google.com>
 */
class Google_Cache_File implements CacheInterface
{
  const MAX_LOCK_RETRIES = 10;
  private $path;
  private $fh;

  /**
   * @var use Psr\Log\LoggerInterface logger
   */
  private $logger;

  public function __construct($path, LoggerInterface $logger = null)
  {
    $this->path = $path;
    $this->logger = $logger;
  }

  public function get($key, $expiration = false)
  {
    $storageFile = $this->getCacheFile($key);
    $data = false;

    if (!file_exists($storageFile)) {
      $this->log(
          'debug',
          'File cache miss',
          array('key' => $key, 'file' => $storageFile)
      );
      return false;
    }

    if ($expiration) {
      $mtime = filemtime($storageFile);
      if ((time() - $mtime) >= $expiration) {
        $this->log(
            'debug',
            'File cache miss (expired)',
            array('key' => $key, 'file' => $storageFile)
        );
        $this->delete($key);
        return false;
      }
    }

    if ($this->acquireReadLock($storageFile)) {
      if (filesize($storageFile) > 0) {
        $data = fread($this->fh, filesize($storageFile));
        $data = unserialize($data);
      } else {
        $this->log(
            'debug',
            'Cache file was empty',
            array('file' => $storageFile)
        );
      }
      $this->unlock();
    }

    $this->log(
        'debug',
        'File cache hit',
        array('key' => $key, 'file' => $storageFile, 'var' => $data)
    );

    return $data;
  }

  public function set($key, $value)
  {
    $storageFile = $this->getWriteableCacheFile($key);
    if ($this->acquireWriteLock($storageFile)) {
      // We serialize the whole request object, since we don't only want the
      // responseContent but also the postBody used, headers, size, etc.
      $data = serialize($value);
      fwrite($this->fh, $data);
      $this->unlock();

      $this->log(
          'debug',
          'File cache set',
          array('key' => $key, 'file' => $storageFile, 'var' => $value)
      );
    } else {
      $this->log(
          'notice',
          'File cache set failed',
          array('key' => $key, 'file' => $storageFile)
      );
    }
  }

  public function delete($key)
  {
    $file = $this->getCacheFile($key);
    if (file_exists($file) && !unlink($file)) {
      $this->log(
          'error',
          'File cache delete failed',
          array('key' => $key, 'file' => $file)
      );
      throw new Google_Cache_Exception("Cache file could not be deleted");
    }

    $this->log(
        'debug',
        'File cache delete',
        array('key' => $key, 'file' => $file)
    );
  }

  private function getWriteableCacheFile($file)
  {
    return $this->getCacheFile($file, true);
  }

  private function getCacheFile($file, $forWrite = false)
  {
    return $this->getCacheDir($file, $forWrite) . '/' . md5($file);
  }

  private function getCacheDir($file, $forWrite)
  {
    // use the first 2 characters of the hash as a directory prefix
    // this should prevent slowdowns due to huge directory listings
    // and thus give some basic amount of scalability
    $fileHash = substr(md5($file), 0, 2);
    $processUser = null;
    if (function_exists('posix_geteuid')) {
      $processUser = posix_getpwuid(posix_geteuid())['name'];
    } elseif (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      $processUser = get_current_user();
    }
    if (empty($processUser)) {
      $this->log(
          'notice',
          'Process User get failed'
      );
    }
    $userHash = md5($processUser);
    $dirHash = $userHash . DIRECTORY_SEPARATOR . $fileHash;

    // trim the directory separator from the path to prevent double separators
    $rootCacheDir = rtrim($this->path, DIRECTORY_SEPARATOR);
    $storageDir = $rootCacheDir . DIRECTORY_SEPARATOR . $dirHash;

    if ($forWrite && !is_dir($storageDir)) {
      // create root dir
      if (!is_dir($rootCacheDir)) {
        if (!mkdir($rootCacheDir, 0777, true)) {
          $this->log(
              'error',
              'File cache creation failed',
              array('dir' => $rootCacheDir)
          );
          throw new Google_Cache_Exception("Could not create cache directory: $rootCacheDir");
        }
      }

      // create dir for file
      if (!mkdir($storageDir, 0700, true)) {
        $this->log(
            'error',
            'File cache creation failed',
            array('dir' => $storageDir)
        );
        throw new Google_Cache_Exception("Could not create cache directory: $storageDir");
      }
    }

    return $storageDir;
  }

  private function acquireReadLock($storageFile)
  {
    return $this->acquireLock(LOCK_SH, $storageFile);
  }

  private function acquireWriteLock($storageFile)
  {
    $rc = $this->acquireLock(LOCK_EX, $storageFile);
    if (!$rc) {
      $this->log(
          'notice',
          'File cache write lock failed',
          array('file' => $storageFile)
      );
      $this->delete($storageFile);
    }
    return $rc;
  }

  private function acquireLock($type, $storageFile)
  {
    $mode = $type == LOCK_EX ? "w" : "r";
    $this->fh = fopen($storageFile, $mode);
    if (!$this->fh) {
      $this->log(
          'error',
          'Failed to open file during lock acquisition',
          array('file' => $storageFile)
      );
      return false;
    }
    if ($type == LOCK_EX) {
      chmod($storageFile, 0600);
    }
    $count = 0;
    while (!flock($this->fh, $type | LOCK_NB)) {
      // Sleep for 10ms.
      usleep(10000);
      if (++$count < self::MAX_LOCK_RETRIES) {
        return false;
      }
    }
    return true;
  }

  public function unlock()
  {
    if ($this->fh) {
      flock($this->fh, LOCK_UN);
    }
  }

  private function log($level, $message, $context = array())
  {
    if ($this->logger) {
      $this->logger->log($level, $message, $context);
    }
  }
}
