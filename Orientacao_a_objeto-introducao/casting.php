<?php
    $product = new StdClass;
    $product->description = 'Chocolate Amargo';
    $product->amount = 100;
    $product->price = 7;

    $vetor1 = (array) $product;
    var_dump($vetor1);

    $vetor2 = ['description' => 'Café', 'amount' => 100, 'price' => 7];
    $product2 = (object) $vetor1;
    var_dump($product2);
?>