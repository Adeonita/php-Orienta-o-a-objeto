<?php
    error_reporting(E_ALL ^ E_WARNING); 

    $username = 'root';
    $password = 'tiger';
    $dbName = 'Testando';
    $tableName = 'Tabela_Teste';

    try{
        $connection = new PDO('mysql:host=mysql;dbname=Testando', $username, $password);
        //Se não houver registro com os campos informados o retorno é falso
        $result = $connection->query("SELECT nome, idade FROM {$tableName}"); 
        if($result){
            foreach($result as $row){
                print $row['nome'] .'->'.$row['idade'].'<br>';
            }
        }
        $connection = null;
    }catch (PDOException $e){
        print 'ERROR!' . $e->getMessage().'<br>';
        die();
    }
    
?>