<?php

class Product{
    public $description;
    public $price;
    public $amount; //Quantidade
    public $code;
    public $fornecedor;

    public function __construct($description, $price, $amount, $code, $fornecedor){
        $this->description = $description;
        $this->price = $price;
        $this->amount = $amount;
        $this->code = $code;
        $this->fornecedor = $fornecedor;
    }

    public function printTag(){
        print 'Code: ' . $this->code;
        print 'Description: '. $this->description;
    }
}