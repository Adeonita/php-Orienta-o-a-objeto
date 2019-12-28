<?php

    class Dog{

        private $birth;

        public function __construct($name){
            $this->name = $name;
        }


        public function __set($property, $value){  //Intercepta a atribuição
            if( $property == 'nascimento' ){
                if( count(explode('/', $valor)) == 3 ){
                    print "Dado {$value} atribuido a {$property}";
                    $this->property = $value;
                }else{
                    print "Dado {$value} não atribuido a {$property}";
                }
            }else{
                $this->property = $value;
            }
        }
    }

?>