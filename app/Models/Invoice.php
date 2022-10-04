<?php

declare(strict_types=1);

namespace App\Models;

class Invoice extends Model
{
    public function create(float $amount,int $userId) : int
    {
        $newInvoiceStatement = $this->db->prepare('INSERT INTO invoices (amount, user_id) VALUES (:amount, :user_id)');
        $newInvoiceStatement->execute([
            'amount' => $amount,
            'user_id' => $userId
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function find(int $id) : array
    {
        $stmt = $this->db->prepare('
        SELECT invoices.id, amount, full_name
        FROM invoices
        LEFT JOIN users ON invoices.user_id = users.id
        WHERE invoices.id = :id
        ');
        $stmt->execute(['id' => $id]);
        $invoice = $stmt->fetch();
        return $invoice ?: [];
    }
}