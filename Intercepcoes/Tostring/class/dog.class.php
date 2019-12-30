<?php
    //Incercepta os métodos 'print e echo' de um objeto , neste caso retorna o próprio nome do objeto
    //__toString();
    class Dog{

        private $birth;

        public function __construct($name){
            $this->name = $name;
        }

        
        public function __toString(){  
           return $this->name;
        }
    }

?>