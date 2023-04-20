<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class AccountSaving extends Account
{

    private $interest;

    public function __construct($branch, $account, User $cliente, $balance)
    {
        parent::__construct($branch, $account, $cliente, $balance);
        $this->interest = 0.006;
    }

    public function deposit($value)
    {
        $this->balance += $value + ($value * $this->interest);
        Trigger::show("Depósito de {$this->toBrl($value)} realizado com Sucesso", Trigger::ACCEPT);        
    }
    
    public function withdrawal($value)
    {
        if($value <= $this->balance){
            $this->balance -= abs($value);
            Trigger::show("Retirada autorizada no valor de {$this->toBrl($value)}", Trigger::ERROR);
        }else{
            Trigger::show("Saldo Insuficiente, seu saldo atual é {$this->toBrl($this->balance)}", Trigger::WARNING);
        }
    }







}