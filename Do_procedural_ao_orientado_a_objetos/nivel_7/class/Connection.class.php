<?php
    class Connection{
        
        private static $conn;

        /**
         *  Método estático que cria a conexão com o banco de dados 
         * @return conn: Conexão com o banco de dados 
         */
        public static function getConnection(){
            if(empty(self::$conn)){  //Se a variavel local de conexão estiver vazia carrego os dados nela
                $connection = parse_ini_file('config/database.ini');  //Carrego as configurações do banco de dados
                $host = $connection['host'];
                $dbName = $connection['dbname'];
                $username = $connection['username'];
                $password = $connection['password'];
                self::$conn = new PDO("mysql:host={$host};dbname={$dbName};", $username, $password);
            }
            return self::$conn;
        }
    }
?>