<?php

define('ROOT', __DIR__);
define('TEMPLATE_PATH', ROOT . '/src/Template');

require_once ROOT . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

App\Router\Router::route();

?>
