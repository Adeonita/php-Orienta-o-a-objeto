<?php
    require_once('../connection.php');

    function listPerson($connection){
        $query =  'SELECT * FROM pessoas ORDER BY id';
        $result = mysqli_query($connection, $query);
        $list = mysqli_fetch_all($result);
        mysqli_close($connection);
        return $list;
    }

    function deletePerson($connection, $id){
        $query = "DELETE FROM pessoas WHERE id={$id}";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    }

    function showPerson($connection, $id){
        $query = "SELECT * FROM pessoas WHERE id={$id}";
        $result = mysqli_query($connection, $query);
        $person = mysqli_fetch_assoc($result);
        mysqli_close($connection);
        return $person;
    }

    function getNextPerson($connection){
        $query = 'SELECT max(id) as next FROM pessoas';
        $result = mysqli_query($connection, $query);
        $next = (int) mysqli_fetch_assoc($result)['next']+1;
        mysqli_close($connection);
        return $next;
    }

    function insertPerson($connection, $person){
        $query = "INSERT INTO pessoas (id, nome, endereco, bairro, telefone, email, id_cidade)
                         VALUES (
                            '{$person['id']}',
                            '{$person['nome']}',
                            '{$person['endereco']}',
                            '{$person['bairro']}',
                            '{$person['telefone']}',
                            '{$ṕerson['email']}',
                            '{$person['id_cidade']}'
                         )";

        $result = mysqli_query($connection, $query);
        mysqli_close($result);
        return $result;
    }

    function updatePerson($connection, $person){
        $query = "UPDATE pesoas SET 
                                nome = '{$person['nome']}',
                                endereco = '{$person['endereco']}',
                                bairro = '{$person['bairro']}',
                                telefone = '{$person['telefone']}',
                                email = '{$person['email']}',
                                id_cidade = '{$person['id_cidade']}'
                            WHERE id = '{$person['id']}' ";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    }

    listPerson(getConnection('sistema'));
    showPerson(getConnection('sistema'), 13);
    getNextPerson(getConnection('sistema'));



?>