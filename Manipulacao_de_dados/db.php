<?php #158
    error_reporting(E_ALL ^ E_WARNING); 

    class CONNECTIONERROR extends Exception{};
    class DUPLICATEDATABASE extends Exception{};
 
    
   
    function createDataBase($connection){

        $nameDb = 'teste';
        $query = "CREATE DATABASE {$nameDb}"; //or CREATE IF NOT EXIST DATABASE
        $chek = mysqli_select_db($connection, $nameDb);  //Checa se um banco existe

        if(!$connection){
            throw new CONNECTIONERROR('Não é possível conectar-se ao banco'.mysqli_error());
        }else{
            if($chek == FALSE){ //Se o banco não existir  
                if(mysqli_query($connection, $query)){ //Abro uma conexão e crio o banco através da query
                    echo 'Criado com sucesso';
                    return TRUE;
                }
            }else{
                throw new DUPLICATEDATABASE("O banco ' {$nameDb} ' já existe");
                return FALSE;
            }
        }

        $endConnection = mysqli_close($connection);
        /*if($endConnection){
            echo '<br>Finalizando a conexão...';
        } */
    }

    function createTable($connection, $tableName, $arg1, $arg2){
        if(!$connection){
            throw new CONNECTIONERROR('Não é possível conectar-se ao banco'.mysqli_error());
        }else{
            $query = "CREATE TABLE {$tableName} ($arg1, $arg2)";
        }

    }

    function insert($connection, $query){

    }

    $dbHost = 'mysql';
    $dbUser = 'root';
    $dbPassword = 'tiger';
    $connection = mysqli_connect($dbHost, $dbUser,$dbPassword);
    

   try{
        createDataBase($connection);
    }catch(CONNECTIONERROR $exception){
        echo $exception->getMessage();
    }catch(DUPLICATEDATABASE $exception){
        echo $exception->getMessage();
    }
    
    
?>
