<?php
    require_once('class/Person.class.php');

    try{
        $person = $_POST;  //Pego todos os dados que vem via post
        $person = Person::showPerson(16);
        var_dump($person);
        //Person::save($person);  //Chamo o método estático save para inserir ou atualizar o usuário no banco 
    }catch(Exception $e){
        print $e->getMessage();
    }
?>