<?php

$classMap = [
    'Google_Client' => 'Google\\Client',
    'Google_Service' => 'Google\\Service',
    'Google_AccessToken_Revoke' => 'Google\\AccessToken\\Revoke',
    'Google_AccessToken_Verify' => 'Google\\AccessToken\\Verify',
    'Google_Model' => 'Google\\Model',
    'Google_Utils_UriTemplate' => 'Google\\Utils\\UriTemplate',
    'Google_AuthHandler_Guzzle6AuthHandler' => 'Google\\AuthHandler\\Guzzle6AuthHandler',
    'Google_AuthHandler_Guzzle7AuthHandler' => 'Google\\AuthHandler\\Guzzle7AuthHandler',
    'Google_AuthHandler_Guzzle5AuthHandler' => 'Google\\AuthHandler\\Guzzle5AuthHandler',
    'Google_AuthHandler_AuthHandlerFactory' => 'Google\\AuthHandler\\AuthHandlerFactory',
    'Google_Http_Batch' => 'Google\\Http\\Batch',
    'Google_Http_MediaFileUpload' => 'Google\\Http\\MediaFileUpload',
    'Google_Http_REST' => 'Google\\Http\\REST',
    'Google_Task_Composer' => 'Google\\Task\\Composer',
    'Google_Task_Retryable' => 'Google\\Task\\Retryable',
    'Google_Task_Exception' => 'Google\\Task\\Exception',
    'Google_Task_Runner' => 'Google\\Task\\Runner',
    'Google_Collection' => 'Google\\Collection',
    'Google_Service_Exception' => 'Google\\Service\\Exception',
    'Google_Service_Resource' => 'Google\\Service\\Resource',
    'Google_Exception' => 'Google\\Exception',
];

foreach ($classMap as $alias => $class) {
    class_alias($class, $alias);
}
