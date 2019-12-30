<?php
    include_once 'class/dog.class.php';
    $branco = new Dog('Branco', 5, 'Fox Paulista');
    print $branco->toXml();
?>