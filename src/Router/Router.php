<?php

namespace App\Router;

class Router {
    private array $routes;

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function getRoute(): array {
        foreach ($this->routes as $route) {
            $match = true;
            $route['parameters'] = array();
            foreach ($route['_GET'] as $key => $value) {
                if (
                    array_key_exists($key, $_GET)
                    && (
                        $_GET[$key] === $value
                        || @preg_match($value, $_GET[$key])
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

    public function route(): void {
        $route = $this->getRoute();
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
