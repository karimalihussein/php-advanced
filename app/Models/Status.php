<?php

namespace App\Models;

class Status
{
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';

    public const STATUSES = [
        self::PAID,
        self::PENDING,
        self::DECLINED,
    ];
}