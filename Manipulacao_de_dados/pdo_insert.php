<?php
    error_reporting(E_ALL ^ E_WARNING); 

    $username = 'root';
    $password = 'tiger';
    $dbName = 'Testando';
    $tableName = 'Tabela_Teste';

    try{
        //new pdo recebe 3 parâmetrps, 'DADOS DO BANCO', $nomeDeUsuário,$Senha
        $connection = new PDO('mysql:host=mysql;dbname=Testando', $username, $password);
        $connection->exec("INSERT INTO {$tableName} (nome, idade) VALUES ('Testando', 123)");
        $connection = null;
    }catch (PDOException $e){
        print 'ERROR!' . $e->getMessage().'<br>';
        die();
    }
    
?>