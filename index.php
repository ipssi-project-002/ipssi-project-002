<?php

define('ROOT', __DIR__);

require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/src/Routes.php';

use App\Utils;
use App\Session\Session;
use App\Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

define('TEMPLATE_PATH', ROOT . '/src/Template');
define('DISPLAY_TIMEZONE', isset($_ENV['TIMEZONE']) ? $_ENV['TIMEZONE'] : 'UTC');

session_start();
$_SESSION['session'] = new Session();

(new Router($routes))->route();

?>
