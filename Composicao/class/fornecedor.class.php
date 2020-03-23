<?php
#O objeto 'PAI' é responsável pela criação e destruição das suas partes. FORNECEDOR possui CONTATO
#As instâncias não são independentes como na agregação, o TODO possui as PARTES 

class Fornecedor{

    public $code;
    public $corporateName;
    public $city;
    public $address;
    public $contact;

    public function __construct($code, $corporateName, $city, $address){
        $this->code = $code;
        $this->corporateName = $corporateName;
        $this->city = $city;
        $this->address = $address;
        $this->contact = new Contact();
    }
     
    public function addContact($nome, $telefone){ //Adiciona um novo contato
        $this->contact->setContact($nome, $telefone);  //Chama a função setContact do objeto contact
    }

    public function returnContact(){  //Retorna os dados de um contato
        return $this->contact->getContact();  //Chama a função getContact do objeto contact
    }
}