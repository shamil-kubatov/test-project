<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once  ROOT . '/config/routes.php';

$query = trim($_SERVER['QUERY_STRING'],'/');

session_start();


\ishop\Router::dispatch($query);

