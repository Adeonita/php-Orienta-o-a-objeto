<?php
#O objeto 'PAI' é responsável pela criação e destruição das suas partes. FORNECEDOR possui CONTATO
#As instâncias não são independentes como na agregação, o TODO possui as PARTES 

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