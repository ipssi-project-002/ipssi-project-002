<?php

define('ROOT', __DIR__);
define('TEMPLATE_PATH', ROOT . '/src/Template');

require_once ROOT . '/vendor/autoload.php';

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

(new \App\Router\Router($routes))->route();

?>
