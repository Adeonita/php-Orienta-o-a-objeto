<?php
    /*As traits são uma maneira de encapsular funcionalidades  comuns entre classes
    que não são do mesmo tipo. Atuando com uma herança vertical.
    */
    trait Connection{
        
        private $host;
        private $dbName;
        private $username;
        private $password;
        protected $connection;

        /**
         * Pega os dados da conexão, chamaa conexão através do método getConnection e atribui ao atriburo connection
         */
        public function __construct(){
            $connection = parse_ini_file('config/database.ini');  //Carrego as configurações do banco de dados
            $this->host = $connection['host'];
            $this->dbName = $connection['dbname'];
            $this->username = $connection['username'];
            $this->password = $connection['password'];
            $this->connection = $this->getConnection(); //atribui a propriedade connection a própria conexão, através da função getconnection
        }

        /**
         * Método interno a classe que monta e retorna a conexão
         * @param void
         * @return connection
         */
        private function getConnection(){
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