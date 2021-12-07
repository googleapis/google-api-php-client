<?php

// Adds PRS-0 aliases for PRS-4 classes
if (!class_exists('Google_Client')) {
    $iterator = new RegexIterator(
        new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                __DIR__,
                RecursiveDirectoryIterator::UNIX_PATHS
            )
        ),
        '/((?:[A-Z][a-zA-Z\d]+\/)*[A-Z][a-zA-Z\d]+)\.php$/',
        RegexIterator::GET_MATCH,
        RegexIterator::USE_KEY
    );
    foreach ($iterator as $value) {
        if ($value[1] !== 'Task/Composer') {
            $class = 'Google\\' . str_replace('/', '\\', $value[1]);
            class_alias($class, str_replace('\\', '_', $class), false);
        }
    }
    unset($iterator, $value, $class);
}

/**
 * This class needs to be defined explicitly as scripts must be recognized by
 * the autoloader. `Google\Task\Composer` autoloads only in development mode.
 */
if (!class_exists('Google_Task_Composer') && class_exists('Google\Task\Composer'))
    class Google_Task_Composer extends Google\Task\Composer
    {
    }
}
