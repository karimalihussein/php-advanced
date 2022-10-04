<?php

declare(strict_types = 1);

use App\App;
use App\Config;
use App\Controllers\HomeController;
use App\Router;
use App\View;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

session_start();

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'data' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', $root . 'storage' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require APP_PATH . 'Helper.php';




$router = new Router();
$router->get('/',[HomeController::class, 'index']);
$router->get('/about',[HomeController::class, 'about']);
$router->get('/form',[HomeController::class, 'form']);
$router->post('/upload',[HomeController::class, 'upload']);
$router->get('/invoice',[HomeController::class, 'invoice']);

(new App($router,['uri' => $_SERVER['REQUEST_URI'],'method' => $_SERVER['REQUEST_METHOD']], new Config($_ENV)))->run();
















