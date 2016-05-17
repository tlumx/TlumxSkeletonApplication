<?php

chdir(dirname(__DIR__));
require 'load.php';

use Tlumx\Application;
          
$app = new Application();
$app->run();