<?php

$classMap = [
    'Google\\Client' => 'Google_Client',
    'Google\\Service' => 'Google_Service',
    'Google\\AccessToken\\Revoke' => 'Google_AccessToken_Revoke',
    'Google\\AccessToken\\Verify' => 'Google_AccessToken_Verify',
    'Google\\Model' => 'Google_Model',
    'Google\\Utils\\UriTemplate' => 'Google_Utils_UriTemplate',
    'Google\\AuthHandler\\Guzzle6AuthHandler' => 'Google_AuthHandler_Guzzle6AuthHandler',
    'Google\\AuthHandler\\Guzzle7AuthHandler' => 'Google_AuthHandler_Guzzle7AuthHandler',
    'Google\\AuthHandler\\Guzzle5AuthHandler' => 'Google_AuthHandler_Guzzle5AuthHandler',
    'Google\\AuthHandler\\AuthHandlerFactory' => 'Google_AuthHandler_AuthHandlerFactory',
    'Google\\Http\\Batch' => 'Google_Http_Batch',
    'Google\\Http\\MediaFileUpload' => 'Google_Http_MediaFileUpload',
    'Google\\Http\\REST' => 'Google_Http_REST',
    'Google\\Task\\Composer' => 'Google_Task_Composer',
    'Google\\Task\\Retryable' => 'Google_Task_Retryable',
    'Google\\Task\\Exception' => 'Google_Task_Exception',
    'Google\\Task\\Runner' => 'Google_Task_Runner',
    'Google\\Collection' => 'Google_Collection',
    'Google\\Service\\Exception' => 'Google_Service_Exception',
    'Google\\Service\\Resource' => 'Google_Service_Resource',
    'Google\\Exception' => 'Google_Exception',
];

foreach ($classMap as $class => $alias) {
    class_alias($class, $alias);
}
