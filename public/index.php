<?php

declare(strict_types = 1);

use App\App;
use App\Config;
use App\Controllers\CurlController;
use App\Controllers\GaneratorController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Controllers\UserController;
use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
use App\Enums\PaymentStatus;
use App\Models\Address;
use App\Models\Payment;
use App\Router;
use App\Services\Shipping\BillableWeightCalculatorService;
use App\Services\Shipping\PackageDimension;
use App\Services\Shipping\Weight;
use App\View;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Illuminate\Container\Container;

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
$router    = new Router($container);

$router->get('/', [HomeController::class, 'index']);
$router->get('/invoices/new', [InvoiceController::class, 'create']);
$router->get('/curl', [CurlController::class, 'index']);





(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->boot()->run();













