<?php

include_once __DIR__ . '/bootstrap.php';
$test = new BaseTest();
$cacheItem = $test->getCache()->getItem('access_token');
print_r($cacheItem->get());
$test->getCache()->deleteItem('access_token');

echo "SUCCESS\n";
