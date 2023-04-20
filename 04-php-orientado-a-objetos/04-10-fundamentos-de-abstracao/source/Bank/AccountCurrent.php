<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class AccountCurrent extends Account
{

    private $limit;

    public function __construct($branch, $account, User $cliente, $balance, $limit)
    {
        parent::__construct($branch, $account, $cliente, $balance);
        $this->limit = $limit;
    }

    public function deposit($value)
    {
        $this->balance += $value;
        Trigger::show("Depósito de {$this->toBrl($value)} realizado com Sucesso", Trigger::ACCEPT);        
    }
    
    public function withdrawal($value)
    {
        if($value <= $this->balance + $this->limit){
            $this->balance -= abs($value);
            Trigger::show("Retirada autorizada no valor de {$this->toBrl($value)}", Trigger::ERROR);
            if($this->balance < 0){
                $tax = abs($this->balance) * 0.006;
                $this->balance -= $tax;
                Trigger::show("Taxa de uso de limite:{$this->toBrl($tax)}", Trigger::ERROR);
            }
        }else{
            $saving = $this->balance + $this->limit;
            Trigger::show("Saldo Insuficiente, seu saldo atual é {$this->toBrl($saving)}", Trigger::WARNING);
        }
    }














}