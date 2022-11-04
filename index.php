<?php

define('ROOT', __DIR__);
define('TEMPLATE_PATH', ROOT . '/src/Template');

require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/src/Routes.php';

use App\Utils;
use App\Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


$airtable = new App\Airtable\Airtable(
    $_ENV['AIRTABLE_API_KEY'],
    $_ENV['AIRTABLE_BASE_ID']
);

$formula = $airtable::formula([
    'username' => 'super.admin'
]);

$res = $airtable->get('Users', [
    'filterByFormula' => $formula
]);

var_dump($res->getRecords()[0]->id, $res->getRecords()[0]->fields->username);

(new Router($routes))->route();

?>
