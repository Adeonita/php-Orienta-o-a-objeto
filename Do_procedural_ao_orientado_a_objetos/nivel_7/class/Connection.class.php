<?php
    class Connection{
        
        private $host;
        private $dbName;
        private $username;
        private $password;

        public function __construct(){
            $connection = parse_ini_file('config/database.ini');  //Carrego as configurações do banco de dados
            $this->host = $connection['host'];
            $this->dbName = $connection['dbname'];
            $this->username = $connection['username'];
            $this->password = $connection['password'];
        }

        public function getConnection(){
            // $connection =  new PDO("mysql:host={$host};dbname={$dbName};", $username, $password);
            //var_dump($connection);exit;
            try {
                $connection = new PDO("mysql:host={$this->host};dbname={$this->dbName};", $this->username, $this->password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    //test connection pdo
                    //$status = $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);
                    //var_dump($status);
                    return $connection;
            }catch(Exception $e){
                //echo $e->getMessage(); //Exibe a excessão
                echo("Can't open the database.");
            }
        }

    }
?>