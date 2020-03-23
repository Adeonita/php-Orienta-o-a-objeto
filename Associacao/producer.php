<?php
    declare(strict_types = 1);

    class Producer{
        private $name;

        public function __construct($name){
            $this->name = $name;
        }

        public function getName(): string{
            return $this->name;
        }
    }


?>