<?php

declare(strict_types = 1);

use App\App;
use App\Config;
use App\Container;
use App\Controllers\GaneratorController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Enums\PaymentStatus;
use App\Models\Address;
use App\Models\Payment;
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



$container = new Container();
$router = new Router($container);
$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        UserController::class,
    ]
);

(new App($container, $router,['uri' => $_SERVER['REQUEST_URI'],'method' => $_SERVER['REQUEST_METHOD']]))->boot()->run();
// $router->get('/',[HomeController::class, 'index']);
// $router->get('/about',[HomeController::class, 'about']);
// $router->get('/form',[HomeController::class, 'form']);
// $router->post('/upload',[HomeController::class, 'upload']);
// $router->get('/invoice',[HomeController::class, 'invoice']);
// $router->get('/generator',[GaneratorController::class, 'index']);
// $router->get('/test', function () {
//     $payment = new Payment();
//     $payment->updateStatus(PaymentStatus::Failed);
//     // echo $payment->getStatus()->value;
//     $address = new Address('123 Main St', 'Anytown', 'CA', '12345', 'US');
//     echo $address->street;
// });

















