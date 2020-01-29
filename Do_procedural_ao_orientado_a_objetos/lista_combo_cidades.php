<?php
    require_once('connection.php');
    
    
    /**
     * Função que cria um banco de dados, pegando a conexão e o nome do banco
     * @param connection: É a conexão com o banco
     * @param dataBase: Nome do banco de dados 
     */
    function createDataBase( $connection, string $dataBase):void{
        $query = "CREATE DATABASE IF NOT EXISTS {$dataBase}";
        if($connection){
            mysqli_query($connection, $query);
        }else{
            print "Não há conexão com o banco".mysqli_error();
        }
        mysqli_close($connection);
    }

    /**
     * Função que seleciona e retorna uma string com o nome das cidades que estão cadastradas no banco de dados
     * @param connection: Conexão com o banco de dados
     * @param id: id da cidade s
     */
    function lista_combo_cidades($connection, integer $id = null):string{
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
     echo lista_combo_cidades(getConnection('sistema')); //chamo a função que exibe as cidades cadastradas e imprimo-a portanto no arquivo de inserção apenas dou um require
?>