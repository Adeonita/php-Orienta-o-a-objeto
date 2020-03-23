<?php

class Product{
    public $description;
    public $price;
    public $code;

    public function __construct($description, $price, $code){
        $this->description = $description;
        $this->price = $price;
        $this->code = $code;
    }

    public function printTag(){
        print 'Description: '. $this->description;
        print ' - Code: ' . $this->code;
    }
}