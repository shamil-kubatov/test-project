<?php

define("ROOT", dirname(__DIR__));

$path_site = "http://{$_SERVER['HTTP_HOST']}";
define('PATH_SITE', $path_site);

require_once  ROOT . '/vendor/autoload.php';

require_once  ROOT . '/vendor/ishop/core/libs/debug.php';
