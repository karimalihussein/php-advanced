<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Attributes\Route;
use App\Enums\HttpMethod;
use App\Models\Invoice;
use App\Models\SignUp;
use App\Services\InvoiceService;
use App\View;

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    #[Get('/')]
    #[Get(routePath: '/home')]
    public function index(): string
    {
        return View::make('index', ['foo' => 'bar'])->render();
    }

    public function about(): string
    {
        return View::make('about', $_GET)->render();
    }

    public function form(): string
    {
        return View::make('form', $_GET)->render();
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
        header('Location: /');
    }

    public function download()
    {
        $filePath = STORAGE_PATH . '/' . $_GET['file'];
        if (!file_exists($filePath)) {
            throw new \Exception('File not found');
        }
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
    }

    public function invoice() : View
    {
        $email = 'fakeemail@gmail.com';
        $amount = 100;
        $name = 'John Doe';
        $userModel = new \App\Models\User();
        $invoiceModel = new \App\Models\Invoice();
        $signUpModel = (new SignUp($userModel, $invoiceModel))->register([
            'email' => $email,
            'full_name' => $name
        ], [            
            'amount' => $amount
        ]);
        return View::make('invoice', [
            'invoice' => $invoiceModel->find($signUpModel)
        ]);
        
    }
    #[Post('/')]
    public function store()
    {

    }

    #[Put('/')]
    public function update(int $id)
    {

    }
}
