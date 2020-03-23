<?php
    include_once 'xmlBase.class.php';

    class Dog extends XmlBase{
        
        public $name;
        public $age;
        public $breed;

        public function __construct($name, $age, $breed){
            $this->name = $name;
            $this->age = $age;
            $this->breed = $breed;
        }
    }