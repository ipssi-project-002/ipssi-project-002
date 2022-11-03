<?php

namespace App\Router;

class Router {
    private const ROUTES = [
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

    public static function getRoute(): array {
        foreach (self::ROUTES as $route) {
            $match = true;
            $route['parameters'] = array();
            foreach ($route['_GET'] as $key => $value) {
                if (
                    array_key_exists($key, $_GET)
                    && (
                        $_GET[$key] === $value
                        || preg_match($value, $_GET[$key])
                    )
                ) {
                    $route['parameters'][$key] = $_GET[$key];
                } else {
                    $match = false;
                    break;
                }
            }
            if ($match) {
                return $route;
            }
        }
        return null;
    }

    public static function route() {
        $route = self::getRoute();
        if ($route) {
            $method = $route['method'];
            $controller = new $route['controller']();
            $controller->$method($route['parameters']);
        } else {
            throw new \Exception('No matching route found');
        }
    }
}

?>
