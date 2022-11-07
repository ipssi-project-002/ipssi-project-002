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

/*
$key = $_ENV['SECRET_KEY'];
$payload = [
    'sub' => 'username',
    'iat' => time(),
    'exp' => time() + (60 * 60)
];
$jwt = Firebase\JWT\JWT::encode($payload, $key, 'HS512');
var_dump($jwt);
$decoded = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key($key, 'HS512'));
var_dump($decoded);
*/

session_start();
$_SESSION['session'] = new Session();

(new Router($routes))->route();

?>
