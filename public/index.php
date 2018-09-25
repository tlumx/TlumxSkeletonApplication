<?php
/**
 * Tlumx (https://tlumx.com/)
 *
 * @author    Yaroslav Kharitonchuk <yarik.proger@gmail.com>
 * @link      https://github.com/tlumx/framework
 * @copyright Copyright (c) 2016-2018 Yaroslav Kharitonchuk
 * @license   https://github.com/tlumx/framework/blob/master/LICENSE.md  (MIT License)
 */

define('ROOT_PATH', dirname(__DIR__));
define('TEMPLATES_PATH', ROOT_PATH . '/templates');

chdir(dirname(__DIR__));

require __DIR__ . '/../vendor/autoload.php';

use Tlumx\Application\Application;

$config = include 'configs/main.php';

$app = new Application($config);
$app->run();
