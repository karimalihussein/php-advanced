<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Interfaces\PaymentGatewayServiceInterface;
use App\Services\InvoiceService;
use App\Services\PaddlePaymentService;
use App\Services\PaymentGatewayService;
use Symfony\Component\Mailer\MailerInterface;

class App
{
    private static DB $db;
    private Config $config;

    public function __construct(protected Container $container,protected ?Router $router = null, protected array $request = [])
    {
       

    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function boot() : static
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->config = new Config($_ENV);
        static::$db = new DB($this->config->db ?? []);
        $this->container->set(PaymentGatewayServiceInterface::class, PaddlePaymentService::class);
        $this->container->set(MailerInterface::class, fn() => new CustomMailer($this->config->mailer['dns']));
        return $this;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo View::make('error/404');
        }
    }
}
