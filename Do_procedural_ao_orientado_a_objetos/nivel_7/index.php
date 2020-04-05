<?php
    require_once('class/PersonForm.class.php');
    require_once('class/City.class.php');

    $form = new PersonForm();
    $form->show();

    $form = new City();
    
    
?>