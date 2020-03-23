<?php
    declare(strict_types = 1);

    class Product{
        private $description;
        private $amount;
        private $price;
        private $producer;
        private $feature;

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

        public function addFeature(string $name, string $value){
            $this->feature[] = new Feature($name, $value);  //A cada chamada do método addFeature é criado um novo objeto da classe Feature
        }

        public function getFeature(): array{
            return $this->feature;
        }
    }
?>