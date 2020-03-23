<?php
    include 'class/contato.class.php';
    include 'class/fornecedor.class.php';


    $f1 = new Fornecedor('001', 'Nalvinha Moda Íntima', 'Caruaru', 'Feira de Caruaru');
    $f1->setContact('Nalvinha Silva', '(88) 99999-9999');
    print $f1->corporateName;
    print '<br>Informations of Contact<br>';
    print $f1->getContact();

?>