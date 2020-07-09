<?php

function retry($f, $delay = 10, $retries = 3)
{
    try {
        return $f();
    } catch (Exception $e) {
        if ($retries > 0) {
            sleep($delay);
            return retry($f, $delay, $retries - 1);
        } else {
            throw $e;
        }
    }
}

retry(function () {
    global $argv;
    passthru($argv[1], $ret);

    if ($ret != 0) {
        throw new \Exception('err');
    }
}, 1);
