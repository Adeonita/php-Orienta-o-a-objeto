<?php
declare(strict_types=1);

    class Person{

        public static function save($person){

            $host = 'mysql:host=mysql; dbname=sistema';
            $username = 'root';
            $password = 'tiger';
            $connection = new PDO($host, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Os erros ocorridos devem ser lançados como exceptions
            
            if(empty($person['id'])){ //Se o id estiver vazio
                $query = 'SELECT max(id) as next FROM pessoas';
                $result = $connection->query($query); //busco o ultimo id
                $row = $result->fetch(); //Busca a proxima linha num conjunto de resultados
                $person['id'] = (int) $row['next']+1; //O id da pessoa será o proximo do banco
                //Então insiro
                $query = "INSERT INTO pessoas (id, nome, endereco, bairro,  
                                               telefone, email, id_cidade)
                                VALUES (
                                        '{$person['id']}',
                                        '{$person['nome']}',
                                        '{$person['endereco']}',
                                        '{$person['bairro']}',
                                        '{$person['telefone']}',
                                        '{$person['email']}',
                                        '{$person['id_cidade']}'
                                )";
            }else{ //Se existir o id em person atualizo esse usuário
                $query = "UPDATE pessoas SET   
                                            nome = '{$person['nome']}',
                                            endereco = '{$person['endereco']}',
                                            bairro = '{$person['bairro']}',
                                            telefone = '{$person['telefone']}',
                                            email = '{$person['email']}',
                                            id_cidade = '{$person['id_cidade']}'
                                         WHERE id = '{$person['id']}'
                        ";  
            }
            
            return $connection->query($query);
        }


        public static function find(int $id){
            $host = 'mysql:host=mysql; dbname=sistema';
            $username = 'root';
            $password = 'tiger';
            $connection = new PDO($host, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

            $query = "SELECT * FROM pessoas WHERE id='{$id}'";
            $result = $connection->query($query);
            return $result->fetch();
        }

        public static function all(){
            $host = 'mysql:host=mysql; dbname=sistema';
            $username = 'root';
            $password = 'tiger';
            $connection = new PDO($host, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

            $query = 'SELECT * FROM pessoas';
            $result = $connection->query($query);

            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                echo $row->id. ' - '. $row->nome . ' - ' . $row->email . '<br><br> ';
            }
            $connection = null;
    
            //return $result->fetch();
        }

        public static function delete($id){
            $host = 'mysql:host=mysql; dbname=sistema';
            $username = 'root';
            $password = 'tiger';
            $connection = new PDO($host, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

            $query = "DELETE FROM pessoas WHWRE id={$id}";
        }
    }
?>