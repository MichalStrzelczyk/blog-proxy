<?php
declare (strict_types=1);
ini_set('display_errors', 'On');

error_reporting(E_ALL);

// initialize time profiling
$start = microtime(true);

// define path constants
define('BASE_PATH', realpath('..'));
define('CONFIG_PATH', realpath('../config'));
define('VENDOR_PATH', realpath('../vendor'));
define('SRC_PATH', realpath('../src'));

// add vendor based autoloading
require_once VENDOR_PATH . '/autoload.php';

$di = new \Di();
Initializer::initializeServices($di);
$app = new \Phalcon\Mvc\Application($di);
$app->handle()->send();