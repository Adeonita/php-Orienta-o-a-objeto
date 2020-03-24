<?php
    require_once('class/Person.class.php');

    try{
        if(!empty($_GET['action']) and $_GET['action'] == 'delete'){ //Se action não estiver vazio e for igual a delete,
            $id = (int) $_GET['id'];
            Person::delete($id);  //apaga pessoa{id} do banco
        }
        //$person = Person::all();  // mostra todas as pessoas cadastradas
        //$person = Person::find(13); //Mostra person{id}
        $person = $_POST;
        Person::save($person);
        //print_r ($person);
    }catch(Exception $e){
        print $e->getMessage();
    }

    
?>