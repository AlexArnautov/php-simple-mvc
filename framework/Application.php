<?php

namespace framework;


use Exception;

use Laminas\Diactoros\ServerRequestFactory;

class Application
{

    /**
     * @var \Laminas\Diactoros\Request
     */
    public $request;
    /**
     * @var Response
     */
    public $response;

    public function __construct()
    {
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        $this->response = new Response();
    }

    /**
     * @throws Exception
     */
    public function run(): void
    {
        Router::$activeRoute = Router::$routes[$this->request->getUri()->getPath() . '@' . $this->request->getMethod()];

        if (empty(Router::$activeRoute)) {
            throw new Exception('Page Not found');
        }

        try {
            $controller = Router::$activeRoute['controller'];
            $action = Router::$activeRoute['action'];
            $reflectedMethod = new \ReflectionMethod($controller, $action);

            if ($reflectedMethod->isPublic()) {
                /** @var Controller $controller */
                $controller = new $controller($this->request, $this->response);
                $controller->response->getBody()->write($controller->$action());
                $controller->response->sendHeaders();
                $controller->response->sendContent();
            }

        } catch (\ReflectionException $reflectionException) {
            throw new Exception('Action Not found');
        }
    }

}