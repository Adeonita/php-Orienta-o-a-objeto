<?php
    require_once('producer.php');
    require_once('product2.php');

    $f1 = new Producer('Teste Moda Íntima');
    $p1 = new Product('Calcinha Lacradora', 3, 39.90);
    $p1->setProducer($f1); //Um objeto sendo atributo de outro

    print "\n\n" . 'O produto "' . $p1->getDescription() .'" é fornecido por ' . $f1->getName() . "\n\n";
    //var_dump($p1);
?>