<?php
    class Product{
        public $descricao;
        public $estoque;
        public $preco;
    }

    $p1 = new Product();
    $p1->descricao = 'Chocolate';
    $p1->estoque = 10;
    $p1->preco = 3.90;

    $p2 = new Product();
    $p2->descricao = 'Maça do amor';
    $p2->estoque = 20;
    $p2->preco = 3;

    var_dump($p1);
    var_dump($p2);