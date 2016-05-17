<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__DIR__));
define('TEMPLATES_PATH', ROOT_PATH . DS . 'templates');

chdir(dirname(__DIR__));
require 'load.php';

use Tlumx\Application;
          
$app = new Application(include ROOT_PATH . DS . 'configs' . DS . 'main.php');
$app->run();