<?php
    //O método __get() intercepta requisições, sempre que requisitada uma propriedade, automaticamente
    //Ela passará pelo método __get(), o mesmo recebe o nome da propriedade, podendo retorna-la ou não.
    // __get($property); Recebendo a propriedade na chamada do objeto como parâmetro

    class Product{

        public $description;
        private $price;
        public $amount; //Quantidade
        public $code;
        
        const MARGEMDELUCRO = 10;
    
        public function __construct($description, $price, $amount, $code){
            $this->description = $description;
            $this->price = $price;
            $this->amount = $amount;
            $this->code = $code;
        }
    
        public function __get($property){
            echo "Obtendo valor de {$property}";
            if($property == 'price'){
                return $this->$property * (1 + (self :: MARGEMDELUCRO / 100));
            }
        }

    }
?>