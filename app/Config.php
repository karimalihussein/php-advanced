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
                'user'     => $env['DB_USER'],
                'pass'     => $env['DB_PASS'],
                'dbname'   => $env['DB_DATABASE'],
                'driver'   => $env['DB_CONNECTION'] ?? 'pdo_mysql',
            ],
            'mailer' => [
                    'dns'      => $_ENV['MAIL_DRIVER'] . '://' . $_ENV['MAIL_HOST'] . ':' . $_ENV['MAIL_PORT']
            ]
           
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
