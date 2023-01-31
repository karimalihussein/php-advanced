<?php

declare(strict_types = 1);

namespace App;

/**
 * @property-read ?array $db
 * @property-read ?array $mailer
 */
class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host'     => $env['DB_HOST'],
                'username'     => $env['DB_USER'],
                'password'     => $env['DB_PASS'],
                'database'   => $env['DB_DATABASE'],
                'driver'   => $env['DB_DRIVER'] ?? 'mysql',
                'charset'  => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix'   => '',

            ],
            'mailer' => [
                    'dns'      => $_ENV['MAIL_DRIVER'] . '://' . $_ENV['MAIL_HOST'] . ':' . $_ENV['MAIL_PORT'] 
            ],
            'apiKeys' => [
                'emailable' => $_ENV['EMAILABLE_API_KEY'] ?? null,
            ],
           
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
