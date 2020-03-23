<?php
    declare(strict_types = 1);

    class Product{
        private $description;
        private $amount;
        private $price;
        private $producer;

        public function __construct(string $description, int $amount, float $price){
            $this->description = $description;
            $this->amount = $amount;
            $this->price = $price;
        }

        public function getDescription(): string{
            return $this->description;
        }

        public function setProducer(Producer $producer){
            $this->producer = $producer;
        }

        public function getProducer(): string{
            return $this->producer;
        }
    }
?>