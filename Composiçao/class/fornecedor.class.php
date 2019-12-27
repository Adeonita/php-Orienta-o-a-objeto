<?php

class Fornecedor{

    public $code;
    public $corporateName;
    public $city;
    public $address;

    public function __construct($code, $corporateName, $city, $address){
        $this->code = $code;
        $this->corporateName = $corporateName;
        $this->city = $city;
        $this->address = $address;
    }

}