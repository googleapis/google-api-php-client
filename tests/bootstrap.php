<?php
set_include_path(
    dirname(__FILE__) . PATH_SEPARATOR .
    dirname(dirname(__FILE__)) . "/src". PATH_SEPARATOR .
    get_include_path()
);
date_default_timezone_set('UTC');
