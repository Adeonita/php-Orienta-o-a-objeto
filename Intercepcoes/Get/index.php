<?php
    include_once 'class/product.class.php';
    
    $p1 = new Product('pTest1', 10, '01', '001');
    echo ' '.$p1->price;
    
?>