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

$client = new App\Mail\Client(
    $_ENV['EMAIL_HOST'],
    $_ENV['EMAIL_PORT'],
    $_ENV['EMAIL_USERNAME'],
    $_ENV['EMAIL_PASSWORD'],
    $_ENV['EMAIL_SMTP_SECURE'],
    'UTF-8',
    'base64',
    true
);

$mail = new App\Mail\Mail($client);
$mail = $client->mail('Test', 'Test', ['ledragonparesseux@thomasleveille.com', 'Le Dragon Paresseux'], [['l.taranne@ecole-ipssi.net', 'Lucas Taranne'], ['a.cano@ecole-ipssi.net', 'Alexandre Cano']], true);
$mail->send();

$airtable = new App\Airtable\Airtable(
    $_ENV['AIRTABLE_API_KEY'],
    $_ENV['AIRTABLE_BASE_ID']
);

$airtable->makeRequest('/Users', 'GET');

(new Router($routes))->route();

?>
