<?php

include_once __DIR__ . '/bootstrap.php';
$test = new BaseTest();
print_r($test->getCache()->get('access_token'));
$test->getCache()->delete('access_token');

echo "SUCCESS\n";
