<?php

    class City{

        use Connection{
            Connection::__construct as private __traitConstruct;
        }
        
        public function  __construct(){
            $this__traitConstruct();
        }

        public static function findAll(){
            $query = 'SELECT nome FROM cidades';
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }
    }
?>