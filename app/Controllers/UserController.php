<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Models\Email;
use App\View;

use Symfony\Component\Mime\Address;

class UserController
{   
    #[Get('/users/create')]
    public function store()
    {
        return View::make('users/create');
    }

    #[Post('/users')]
    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $firstName = explode(' ', $name)[0];

        $text = <<<Body
        Hello {$firstName},

        Thank you for registering with us. We will get back to you soon.
        Body;

        $html = <<<Body
        <h1>Hello {$firstName}</h1>
        <p>Thank you for registering with us. We will get back to you soon.</p>
        Body;

        (new Email())->queue(
            new Address($email),
            new Address($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']),
            'Welcome to our website',
            $html,
            $text
        );

    }
}
