<?php  
    declare(strict_types = 1);

    class Feature{
        private $name;
        private $value;

        public function __construct(string $name, string $value){
            $this->name = $name;
            $this->value = $value;
        }

        public function getName(): string{
            return $this->name;
        }

        public function getValue(): string{
            return $this->value;
        }
    }
?>