<?php

declare(strict_types=1);

namespace App\Enums;

enum HttpMethod: string
{
    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case PATCH = 'patch';
    case DELETE = 'delete';
    case OPTIONS = 'options';
    case HEAD = 'head';
    case TRACE = 'trace';
    case CONNECT = 'connect';

    

}