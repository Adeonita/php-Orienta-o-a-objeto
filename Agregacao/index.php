<?php
    include_once 'class/cesta.class.php';
    include_once 'class/product.class.php';

    echo 'Agregação <br><br>';
    
    $p1 = new Product('p1', '1', '001');
    $p2 = new Product('p2', '2', '002');
    $cesta = new Cesta();
    $cesta->addItens($p1);
    $cesta->addItens($p2);
    $cesta->showList();

    print "<br><br>O total dos produtos é: ". $cesta->calculateTotal();

?>