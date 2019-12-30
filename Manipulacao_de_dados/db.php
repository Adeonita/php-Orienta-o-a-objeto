<?php #158
    error_reporting(E_ALL ^ E_WARNING); 

    class CONNECTIONERROR extends Exception{};
    class DUPLICATEDATABASE extends Exception{};
 
    
   
    function createDataBase($connection, $query, $chek, $nameDb){
        if(!$connection){
            throw new CONNECTIONERROR('Não é possível conectar-se ao banco'.mysqli_error());
        }else{
            if($chek == FALSE){ //Se o banco não existir  
                if(mysqli_query($connection, $query)){ //Abro uma conexão e crio o banco através da query
                    echo 'Criado com sucesso';
                    return TRUE;
                }
            }else{
                throw new DUPLICATEDATABASE("O banco {$nameDb} já existe");
                return FALSE;
            }
        }

        $endConnection = mysqli_close($connection);
        /*if($endConnection){
            echo '<br>Finalizando a conexão...';
        } */
    }

    

    $connection = mysqli_connect('mysql', 'root', 'tiger');
    $nameDb = 'testando';
    $query = "CREATE DATABASE {$nameDb}"; //or CREATE IF NOT EXIST DATABASE
    $chek = mysqli_select_db($connection, $nameDb);  //Checa se um banco existe

   try{
        createDataBase($connection, $query, $chek, $nameDb);
    }catch(CONNECTIONERROR $exception){
        echo $exception->getMessage();
    }catch(DUPLICATEDATABASE $exception){
        echo $exception->getMessage();
    }
    
    
?>
