<?php

    function getConnection($dataBase = null){
        $dbHost = 'mysql';
        $dbUser = 'root';
        $dbPassword = 'tiger';    
        return mysqli_connect($dbHost, $dbUser,$dbPassword, $dataBase);
    }
    
    function createDataBase($connection, $dataBase){
        $query = "CREATE DATABASE IF NOT EXISTS {$dataBase}";
        if($connection){
            mysqli_query($connection, $query);
        }else{
            print "Não há conexão com o banco".mysqli_error();
        }
        mysqli_close($connection);
    }

    function lista_combo_cidades($connection, $id = null){
        $output = '';
        $query = 'SELECT id, nome FROM cidades';
        if($connection){
          $result =  mysqli_query($connection, $query);
          if( $result ){
              while( $row = mysqli_fetch_assoc($result) ){ 
                  if($row[$id] == $id){
                      $chek = 'selected = 1';
                  }else{
                      $chek = '';
                  }
                  $output = $output . "<option {$chek} value='{$row['id']}'> {$row['nome']} </option>";
              }
          }
        }else{
            print 'Sem conexão';
        }

        mysqli_close($connection);
        return $output;
    }
    
     #createDataBase(getConnection(), 'sistema');
     echo lista_combo_cidades(getConnection('sistema'));
?>