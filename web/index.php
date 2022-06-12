<?php
use framework\Application;

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../config/config.php');
require(__DIR__ . '/../config/routes.php');

$application = new Application();
$application->run();

