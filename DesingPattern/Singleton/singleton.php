<?php
    require_once('class/preferencias.class.php');

    $p1 = Preferencias::getInstance();
    print "A linguagem é {$p1->getData('language')} \n";
    print "A linguagem é {$p1->getData('language')} \n";
    $p2 = Preferencias::getInstance();
    print "A linguagem é {$p2->getData('language')} \n";
    $p1->save();

?>