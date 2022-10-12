<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\InvoiceStatus;

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
        SELECT invoices.id, amount
        FROM invoices
        LEFT JOIN users ON invoices.user_id = users.id
        WHERE invoices.id = :id
        ');
        $stmt->execute(['id' => $id]);
        $invoice = $stmt->fetch();
        return $invoice ?: [];
    }

    public function all(InvoiceStatus $status) : array 
    {
        $stmt = $this->db->prepare('
            SELECT invoices.id, amount
            FROM invoices
            WHERE status = :status
        ');
        $stmt->execute(['status' => $status->value]);
        $invoices = $stmt->fetchAll();
        return $invoices ?: [];
    }
}