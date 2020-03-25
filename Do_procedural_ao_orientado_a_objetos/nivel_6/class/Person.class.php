<?php
    declare(strict_types=1);

    class Person{

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

        /**
         * Método que salva uma pessoa no banco de dados conforme os dados passados
         * Se existir um id ela Atualiza, caso contrário Insere
         * 
         * @param person
         * @return void
         */
        public static function save($person){  //Recebe um objeto do tipo person
            $conn = self::getConnection();
            if(empty($person['id'])){
                $result = $conn->query('SELECT max(id) as next FROM  pessoas'); //Seleciona o último id da tabela pessoas
                $row = $result->fetch();
                $person['id'] = (int) $row['next']+1;
                $query = "INSERT INTO pessoas (id, nome, endereco, bairro, telefone, email, id_cidade)
                                VALUES (:id, :nome, :endereco, :bairro, :telefone, :email, :id_cidade)";
            }else{
                $query = "UPDATE pessoas SET nome = :nome,
                                             endereco = :endereco,
                                             bairro = :bairro,
                                             telefone = :telefone,
                                             email = :email,
                                             id_cidade = :id_cidade
                                        WHERE id = :id";
            }
            $result = $conn->prepare($query); //Prepara a query para ser executada
            $result->execute([    //'traduz'  :atributo para o seu real valor 
                            ':id' => $person['id'],
                            ':nome' => $person['nome'],
                            ':endereco' => $person['endereco'],
                            ':bairro' => $person['bairro'],
                            ':telefone' => $person['telefone'],
                            ':email' => $person['email'],
                            ':id_cidade' => $person['id_cidade']
                    ]);
        }

        public static function showPerson(int $id){
            $conn = self::getConnection();
            $query = 'SELECT * FROM pessoas WHERE id = :id';
            $statement = $conn->prepare($query);
            $statement->execute([
                ':id' => $id
            ]);
            //$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $result;    
        }

    }
?>