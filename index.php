<?php

define('ROOT', __DIR__);
define('TEMPLATE_PATH', ROOT . '/src/Template');

require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/src/Routes.php';

use App\Utils;
use App\Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


/* 
$airtable = new App\Airtable\Airtable(
    $_ENV['AIRTABLE_API_KEY'],
    $_ENV['AIRTABLE_BASE_ID']
);

$formula = $airtable::formula([
    'username' => 'super.admin'
]);

$res = $airtable->get($_ENV['TABLE_USERS'], [
    'filterByFormula' => $formula
]);

var_dump($res->getRecords()[0]->id, $res->getRecords()[0]->fields->username);

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


(new Router($routes))->route();

?>
