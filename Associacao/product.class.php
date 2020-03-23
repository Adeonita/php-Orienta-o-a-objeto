<?php
#Um objeto possui a referẽncia a posição de memória do outro. 
#A forma mais comum de implementar essa funcionalidade é tendo um objeto como atributo do outro, por exemplo:
# PRODUTO possui FORNECEDOR


class Product{
    public $description;
    public $price;
    public $amount; //Quantidade
    public $code;
    public $fornecedor; //Um objeto como atributo de outro. Fornecedor como atributo de produto

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