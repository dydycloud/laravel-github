<?php
require_once (__DIR__ . '/libraries/curl.php');
require_once (__DIR__ . '/libraries/github.php');
Autoloader::namespaces(array(
    'gitHub' => Bundle::path('gitHub').'models',
));