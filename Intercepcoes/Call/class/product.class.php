<?php
    //O método __call() intercepta CHAMADA DE MÉTODOS. Sempre que executado um método que não existe no objeto a
    //Execução será direcionada para ele. 
    //__call($method, $parameters); Podesendo ser n parâmetros

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
    
        public function __call($method, $parameters){
            print "Você executou o método: {$method}";
            foreach($parameters as $key => $parameter){
                print "<br>Parâmetro: {$key} parâmetro: {$parameter}";
            }
        }

    }
?>