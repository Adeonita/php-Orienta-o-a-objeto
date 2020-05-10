<?php
    require_once('traits/Connection.trait.php');

    class Person{

        private $listPerson;  //Armazena o template da lista de pessoas
        private $nome;
        private $email; 
        private $endereco;
        private $bairro;
        private $telefone;

        use Connection{
            Connection::__construct as private __traitConstruct;
        }

        public function __construct(){
            $this->__traitConstruct();
            $this->listPerson = file_get_contents('../html/list.html');
        }

        public function findAll():array{
            $query = 'SELECT id, nome, endereco, bairro, telefone FROM pessoas';
            $statment = $this->connection->prepare($query);
            $statment->execute();
            $result = $statment->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        /**
         * @params params
         */
        public static function save($params){
            $query = "INSERT INTO pessoas (id, nome, endereco, bairro, telefone, email) 
                        values (NULL,
                               {$params['nome']} 
                               {$params['endereco']}
                               {$params['bairro']}
                               {$params['telefone']},
                               {$params['email']})";
            echo $query;
            //$statment = $this->connection->prepare($query);
            //$statment->execute();
        }

        public function show(): void{
            $persons = $this->findAll();
            $tableData = '';
            foreach($persons as $person){
               $tableData = $tableData . "<tr>
                                            <td></td><td></td>
                                            <td>{$person['id']}</td>
                                            <td>{$person['nome']}</td> 
                                            <td>{$person['endereco']}</td> 
                                            <td>{$person['bairro']}</td> 
                                            <td>{$person['telefone']}</td>
                                          </tr>";
            }
            $this->listPerson = str_replace('{itens}', $tableData, $this->listPerson);
            print $this->listPerson;
        }

    }
?>