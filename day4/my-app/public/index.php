<?php

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/application');

$loader = require ROOT_PATH . '/vendor/autoload.php';
$loader->add('', APP_PATH . '/controllers');


$app = new Jace\Application();
echo $app->run(APP_PATH . '/config/config.ini');