<?php

namespace framework;


use Laminas\Diactoros\ServerRequest;

class Controller
{
    /**
     * @var View
     */
    public $view;
    public $request;
    public $response;
    public $defaultLayout = 'layout.php';

    public function __construct(ServerRequest $request, Response $response)
    {

        $this->request = $request;
        $this->response = $response;
        $this->view = (new View())->setLayout($this->defaultLayout);

    }
}