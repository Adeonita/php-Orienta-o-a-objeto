<?php
    $connection = mysqli_connect('mysql', 'root', 'tiger');
    $nameDb = 'book';
    $query = "CREATE DATABASE {$nameDb}";
    $chek = mysqli_select_db($connection, $nameDb);  //Checa se um banco existe

    if(!$connection){
        die('Não é possível conectar-se ao banco'.mysqli_error());
    }else{
        if($chek == FALSE){ //Se o banco não existir  
            if(mysqli_query($connection, $query)){ //Abro uma conexão e crio o banco através da query
                echo 'Criado com sucesso';
            }else{
                echo "O banco {$nameDb} não pôde ser criado";
            }
        }else{
            echo "O banco {$nameDb} já existe";
        }
    }
    
    
?>
