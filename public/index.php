<?php

declare(strict_types = 1);

use App\Controllers\HomeController;
use App\Router;
use App\View;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'data' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', $root . 'storage' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require APP_PATH . 'Helper.php';



try{
    $router = new Router();
    $router->get('/',[HomeController::class, 'index']);
    $router->get('/about',[HomeController::class, 'about']);
    $router->get('/form',[HomeController::class, 'form']);
    $router->post('/upload',[HomeController::class, 'upload']);
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (Exception $e){
    // header('HTTP/1.0 404 Not Found');
    http_response_code(404);
    echo View::make('error/404', ['message' => $e->getMessage()]);
}















