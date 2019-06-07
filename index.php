<?php
require_once 'config.php';
require_once 'Core/helper.php';
require_once 'Core' . DS . 'System' . DS .'Application.php';

use System\Application;
$app = Application::getInstance();
$app->run();
