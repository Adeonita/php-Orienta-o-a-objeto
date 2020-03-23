<?php
    include_once 'class/product.class.php';
    
    $p1 = new Product('pTest1', 10, '01', '001');
    $p1->test("Isso é um teste bem sucedido", "Isso é um segundo teste bem sucedido");
    
?>