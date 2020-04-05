<?php
    require_once('traits/Connection.trait.php');

    class City{

        use Connection{
            Connection::__construct as private __traitConstruct;
        }

        public function __construct(){
            $this->__traitConstruct();
        }

        public function findAll(){
            $query = 'SELECT id, nome FROM cidades';
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

?>