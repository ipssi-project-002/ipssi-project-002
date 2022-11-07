-<?php

$routes = [
    [
        '_GET' => [
            'page' => 'booking',
            'action' => 'create'
        ],
        'controller' => \App\Controller\BookingController::class,
        'method' => 'create'
    ],
    [
        '_GET' => [
            'page' => 'cart',
            'action' => 'view'
        ],
        'controller' => \App\Controller\CartController::class,
        'method' => 'view'
    ],
    [
        '_GET' => [
            'page' => 'booking',
            'action' => 'createSubmit'
        ],
        'controller' => \App\Controller\BookingController::class,
        'method' => 'createSubmit'
    ],
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'index'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'index'
    ],
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'view',
            'ref' => '/.*/'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'view'
    ],
    [
        '_GET' => [
            'page' => 'dish',
            'action' => 'edit',
            'ref' => '/.*/'
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
            'ref' => '/.*/'
        ],
        'controller' => \App\Controller\DishController::class,
        'method' => 'delete'
    ],
    [
        '_GET' => [
            'page' => 'user',
            'action' => 'index'
        ],
        'controller' => \App\Controller\UserController::class,
        'method' => 'index'
    ],
    [
        '_GET' => [
            'page' => 'user',
            'action' => 'logout'
        ],
        'controller' => \App\Controller\UserController::class,
        'method' => 'logout'
    ],
    [
        '_GET' => [
            'page' => 'user',
            'action' => 'login'
        ],
        'controller' => \App\Controller\UserController::class,
        'method' => 'login'
    ],
    [
        '_GET' => [
            'page' => 'user',
            'action' => 'loginSubmit'
        ],
        'controller' => \App\Controller\UserController::class,
        'method' => 'loginSubmit'
    ],
    [
        '_GET' => [
            'page' => 'user',
            'action' => 'signup'
        ],
        'controller' => \App\Controller\UserController::class,
        'method' => 'signup'
    ],
    [
        '_GET' => [
            'page' => 'user',
            'action' => 'test'
        ],
        'controller' => \App\Controller\UserController::class,
        'method' => 'test'
    ],
    [
        '_GET' => [
            'page' => 'contact',
            'action' => 'create'
        ],
        'controller' => \App\Controller\ContactController::class,
        'method' => 'contact'
    ],
    [
        '_GET' => [
            'page' => 'contact',
            'action' => 'submit'
        ],
        'controller' => \App\Controller\ContactController::class,
        'method' => 'contactSubmit'
    ],
    // homepage
    [
        '_GET' => [],
        'controller' => \App\Controller\HomeController::class,
        'method' => 'home'
    ]
];

?>
