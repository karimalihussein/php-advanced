<?php

declare(strict_types=1);

namespace App\Models;

class SignUp extends Model
{
    public function __construct(protected User $user,protected Invoice $invoice)
    {
        parent::__construct();
    }

    public function register(array $userInfo,array $invoiceInfo) : int
    {
        try{
            $this->db->beginTransaction();
            $userId = $this->user->create($userInfo['full_name'],$userInfo['email']);
            $invoiceId = $this->invoice->create($invoiceInfo['amount'],$userId);
            $this->db->commit();
        }catch(\PDOException $e){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            throw $e;
        }
        return $invoiceId;
    }
}