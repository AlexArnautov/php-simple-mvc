<?php

namespace app\controllers;

use framework\Config;
use framework\Controller;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $this->response = $this->response->withHeader('sdfdf','sdfsdf');
        $this->response = $this->response->withStatus(403);

        $d =1;
        $test = Config::get('db_name');
        return $this->view->render('home/index.php', ['test_value' => $test]);
    }

}