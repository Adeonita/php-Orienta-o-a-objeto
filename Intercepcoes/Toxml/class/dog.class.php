<?php
    class Dog{
        private $name;
        private $age;
        private $raca;

        public function __construct($name, $age, $raca){
            $this->name = $name;
            $this->age = $age;
            $this->breed = $breed;
        }

        public function toXml(){
            return
            "
                <dog>
                    <name> {$this->name} </name>
                    <age> {$this->age} </age>
                    <breed> {$this->raca} </breed>
                </dog>
            ";
        }
    }