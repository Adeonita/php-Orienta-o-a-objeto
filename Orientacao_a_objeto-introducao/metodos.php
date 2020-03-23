<?php
    declare(strict_types = 1);

    class Product{
        private $description;
        private $amount;
        private $price;

        public function setDescription(string $description){
            if(is_string($description)){
                $this->description = $description;
            }
        }

        public function setAmount(int $amount){
            if(is_numeric($amount) AND $amount > 0){
                $this->amount = $amount;
            }
        }

        public function setPrice(float $price){
            if(is_numeric($price) AND $price > 0){
                $this->price = $price;
            }
        }

        public function getDescription(): string{
            return $this->description;
        }

        public function getAmount(): int{
            return $this->amount;
        }

        public function getPrice(): float{
            return $this->price;
        }
        public function aumentarEstoque(int $unidades){
            if(is_numeric($unidades) AND $unidades >= 0){
                $this->amount = $this->amount + $unidades;
            }
        }

        public function diminuirEstoque(int $unidades){
            if(is_numeric($unidades) AND $unidades > 0){
                $this->amount = $this->amount - $unidades;
            }
        }

        public function reajustarPreco(float $percentual){
            if(is_numeric($percentual) AND $percentual >= 0){
                $this->price = $this->price * (1 + ($percentual/100));
            }
        }
    } 


    $p1 = new Product();
    $p1->setDescription('Chocolate');
    $p1->setAmount(10);
    $p1->setPrice(8.0);

    print "\n\nDescription: {$p1->getDescription()} \n" . PHP_EOL;
    print "Estoque: {$p1->getAmount()} \n" . PHP_EOL;
?>