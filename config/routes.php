<?php

use app\controllers\HomeController;
use framework\Router;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/test', HomeController::class, 'index');
