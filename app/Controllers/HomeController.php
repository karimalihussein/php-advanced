<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;

class HomeController
{
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
}
