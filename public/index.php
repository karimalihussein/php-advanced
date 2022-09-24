<?php

declare(strict_types = 1);

use App\Controllers\HomeController;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'data' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require APP_PATH . 'Helper.php';



$router = new Router();
$router->get('/',[HomeController::class, 'index']);
echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

session_start();













