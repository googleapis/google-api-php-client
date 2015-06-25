#!/usr/bin/php
<?php

$binPath = realpath(__DIR__ . '/../vendor/bin');
$fixer = "$binPath/./php-cs-fixer";
$path = array_pop($argv);
$command = sprintf(
    '%s fix --level=symfony --fixers=-concat_without_spaces,-return,unused_use,align_double_arrow,phpdoc_indent,-phpdoc_short_description,-phpdoc_no_package %s',
    $fixer,
    $path
);

echo $command, "\n";

system($command);
