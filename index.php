<?php

define('ROOT', __DIR__);
define('TEMPLATE_PATH', ROOT . '/src/Template');

require_once ROOT . '/vendor/autoload.php';

use App\Router\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$routes = [
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'view',
            'ref' => '.*'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'view'
    ],
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'edit',
            'ref' => '.*'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'edit'
    ],
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'add'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'add'
    ],
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'delete',
            'ref' => '.*'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'delete'
    ],
    // fallback route
    [
        '_GET' => [],
        'controller' => \App\Controller\DefaultController::class,
        'method' => 'render404'
    ]
];

$airtable = new App\Airtable\Airtable(
    $_ENV['AIRTABLE_API_KEY'],
    $_ENV['AIRTABLE_BASE_ID']
);

$airtable->makeRequest('/Users', 'GET');

(new Router($routes))->route();

?>
