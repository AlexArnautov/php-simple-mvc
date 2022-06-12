<?php

namespace framework;

use Exception;

class Router
{
    public static $routes = [];
    public static $activeRoute;

    public function any($pattern, $controller, $action): void
    {
        self::add('GET', $pattern, $controller, $action);
        self::add('POST', $pattern, $controller, $action);
    }

    public function get($pattern, $controller, $action): void
    {
        self::add('GET', $pattern, $controller, $action);
    }

    public function post($pattern, $controller, $action): void
    {
        self::add('POST', $pattern, $controller, $action);
    }

    public static function add($requestMethod, $pattern, $controller, $action): void
    {
        self::$routes[$pattern . '@' . $requestMethod] = [
            'controller' => $controller,
            'action' => $action
        ];
    }


}