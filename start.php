<?php
require_once (__DIR__ . '/libraries/curl.php');
require_once (__DIR__ . '/libraries/github.php');
require_once (__DIR__ . '/helpers/chars.php');
require_once (__DIR__ . '/helpers/markdown.php');

Autoloader::namespaces(array(
    'gitHub' => Bundle::path('gitHub').'models',
));