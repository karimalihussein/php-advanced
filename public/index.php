<?php

declare(strict_types = 1);

use App\App;
use App\Config;
use App\Container;
use App\Controllers\GaneratorController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
use App\Enums\PaymentStatus;
use App\Models\Address;
use App\Models\Payment;
use App\Router;
use App\View;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

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

$connectionParams = [
    'dbname'     => $_ENV['DB_DATABASE'],
    'user'       => $_ENV['DB_USER'],
    'password'   => $_ENV['DB_PASS'],
    'host'       => $_ENV['DB_HOST'],
    'driver'     => $_ENV['DB_CONNECTION'] ?? 'pdo_mysql',
];
$entitymanager = 
EntityManager::create($connectionParams,
 Setup::createAttributeMetadataConfiguration([APP_PATH . 'Entity'], true));
$items = [
    ['Item 1', 1 , 15],
    ['Item 2', 2, 6.66],
    ['Item 3', 3, 20.40],
    ['Item 4', 4, 10]
];

$invoice = (new Invoice())
->setInvoiceNumber('INV-123')
->setAmount(100)
->setStatus(InvoiceStatus::Pending)
->setCreatedAt(new DateTime());

foreach ($items as [$description, $quantity, $price]) {
    $item = (new InvoiceItem())
        ->setDescription($description)
        ->setQuantity($quantity)
        ->setUnitPrice($price);
    $invoice->addItem($item);
    $entitymanager->persist($item);
}


$entitymanager->persist($invoice);
$entitymanager->flush();




















