<?php #158
    error_reporting(E_ALL ^ E_WARNING); 

    class CONNECTIONERROR extends Exception{};
    class DUPLICATEDATABASE extends Exception{};
    #mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
    function getConnection($database = null) {
        $dbHost = 'mysql';
        $dbUser = 'root';
        $dbPassword = 'tiger';
        return mysqli_connect($dbHost, $dbUser,$dbPassword, $database);
    }
   
    function createDataBase($connection, $nameDb, $chek){

        if(!$connection){
            throw new CONNECTIONERROR('Não é possível conectar-se ao banco'.mysqli_error());
            return FALSE;
        }else{
            if($chek == FALSE){ //Se o banco não existir 
                $query = "CREATE DATABASE {$nameDb}"; //or CREATE IF NOT EXIST DATABASE
                if(mysqli_query($connection, $query)){ //Abro uma conexão e crio o banco através da query
                    echo 'Criado com sucesso';
                    return TRUE;
                }
            }else{
                //throw new DUPLICATEDATABASE("O banco ' {$nameDb} ' já existe");
                return FALSE;
            }
        }

        mysqli_close($connection);
        /*if($endConnection){
            echo '<br>Finalizando a conexão...';
        } */
    }

    function createTable($connection, $tableName, $arg1, $arg2){
        if(!$connection){
            throw new CONNECTIONERROR('Não é possível conectar-se ao banco'.mysqli_error());
            return FALSE;
        }else{
            $query = "CREATE TABLE {$tableName} ($arg1, $arg2);";
            if(mysqli_query($connection, $query)){ //Se o banco existir, e se existir a conexão
                echo "<br> A tabela {$tableName} foi criada com as colunas '{$arg1}', '{$arg2}'";
                return TRUE;
            }else{
               // echo "<br>A tabela {$tableName} não foi criada";
                return FALSE;
            }
        }
        mysqli_close($connection);
    }

    function insert($connection, $tableName){
        if($connection){
            $query = "INSERT INTO {$tableName} (nome, idade) VALUES ('Arthur', 0)";
            mysqli_query($connection, $query);
            //print('<br>Dados inseridos com sucesso! <br>');
            mysqli_close($connection);
            return TRUE;
        }else{
           // throw new CONNECTIONERROR('Não é possível conectar-se ao banco'.mysqli_error());
            return FALSE;
        }
        mysqli_close($connection);
    }

    function showData($connection, $tableName){
        if($connection){
            $query = "SELECT nome, idade FROM {$tableName}";
            $result = mysqli_query($connection, $query);
            if($result){
                    while($row = mysqli_fetch_assoc($result)){
                    //print "{$row["nome"]}, {$row["idade"]} anos<br>";
                    printf ("%s (%s)<br>", $row["nome"], $row["idade"]);

                }
            }else{
                print mysqli_error();
            }
        }
        mysqli_close($connection);
    }
    

    $tableName = 'Tabela_Teste';
    $arg1 = 'nome VARCHAR (10)';
    $arg2 = 'idade VARCHAR (3)';
    $nameDb = 'Testando';
    $chek = mysqli_select_db(getConnection(), $nameDb);  //Checa se um banco existe

   try{
        createDataBase(getConnection(), $nameDb, $chek);
        createTable(getConnection($nameDb), $tableName, $arg1, $arg2);
       // insert(getConnection($nameDb), $tableName);
        showData(getConnection($nameDb), $tableName);
    }catch(CONNECTIONERROR $exception){
        echo $exception->getMessage();
    }catch(DUPLICATEDATABASE $exception){
        echo $exception->getMessage();
    }
    
    
?>
