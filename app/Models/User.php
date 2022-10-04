<?php

declare(strict_types=1);

namespace App\Models;

class User extends Model
{
    public function create(string $full_name, string $email, bool $isActive = true) : int
    {
        $newUserStatement = $this->db->prepare('INSERT INTO users (full_name,email,is_active) VALUES (:full_name, :email, :is_active)');
        $newUserStatement->execute([
            'full_name' => $full_name,
            'email' => $email,
            'is_active' => $isActive,
        ]);
        return (int) $this->db->lastInsertId();
    }
}