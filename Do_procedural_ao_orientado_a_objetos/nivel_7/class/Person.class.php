<?php
    require_once('traits/Connection.trait.php');

    class Person{

        private $listPerson;  //Armazena o template da lista de pessoas
        private $nome;
        private $email; 
        private $endereco;
        private $bairro;
        private $telefone;
        private $style = 'font-size: 42px;
                        text-align: center;
                        margin: 290px;';

        use Connection{
            Connection::__construct as private __traitConstruct;
        }

        public function __construct(){
            $this->__traitConstruct();
            $this->listPerson = file_get_contents('../html/list.html'); //html referente a lista de pessoas
        }
        //É uma função interna
        private function findAll(): ?array{  // ? Tipo o retorno?
            if($this->connection){ //Tratamento de erro para quando não há conexão
                $query = 'SELECT id, nome, endereco, bairro, telefone FROM pessoas';
                $statment = $this->connection->prepare($query);
                $statment->execute();
                $result = $statment->fetchAll(PDO::FETCH_ASSOC);
    
                return $result;
            }return NULL;  // ? É errado retornar null aqui?
        }

        /**
         * @params params
         */
        public function save($request){
            if($this->connection){
                if(empty($request['id'])){
                    $query = 'INSERT INTO pessoas (id, nome, endereco, bairro, telefone, email) 
                                values (:id,
                                        :nome,
                                        :endereco,
                                        :bairro:
                                        :telefone,
                                        :email)';
                    echo $query;            
                }else{
                    $query = 'UPDATE pessoas SET nome = :nome,
                                                 endereco = :endereco,
                                                 bairro =  :bairro,
                                                 telefone = :telefone,
                                                 email = :email
                                     WHERE id = :id';
                    echo $query;
                }
             }
            
            /*
            $statment = $this->connection->prepare($query);
            $statment->execute(
                                ':id'           => NULL,
                                ':nome'         => $params['nome'],
                                ':endereco'     => $params['endereco'],
                                ':bairro'       => $params['bairro'],
                                ':telefone'     => $params['telefone'],
                                ':email'        => $params['email']

                            );

            */
        }

        public function show(): void{
            try{
                $persons = $this->findAll();  //Trás todos os cadastros do banco
                $tableData = '';
                if($persons){ //Tratamento de erro para quando não há conexão
                    foreach($persons as $person){
                       $tableData = $tableData . "<tr>
                                                    <td align='center'><a href='index.php?class=Person&method=save&id={$person['id']}'>Edit</a></td>
                                                    <td><a href ='index.php?class=Person&method=delete&id={$person['id']}'>Del</a></td>
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
            }catch(Exceptions $e){
                print $e->getMessage();
            }
        }

        public function edit($request): void{
            if($this->connection){
                $id =  $request['id'];
                $query = "SELECT *FROM pessoas WHERE id = $id";
                $statment = $this->connection->prepare($query);
                $statment->execute();
                $result = $statment->fetch(PDO::FETCH_ASSOC); //Valores a serem atualizados
                return;
            }print '<h1 style="'.$this->style.'">Alguem está perdido por aqui!</h1>';
        }

        //De fato atualizar os dadoss
        public function update($data){
            var_dump($data);
        }

        //Criar o formulário e pegar os dados para atualizar
        private function getData($person){

            $input = '';
            foreach($person as $key => $value){
                if($key != 'id'){
                    $input .= "<label>{$key}</label>
                               <input type='text' name={$value}sytle='width: 50%' value={$value}>
                                ";
                }
            }
            $form = 
                '<form enctype="multipart/form-data" action="index.php?class=Person&method=update" method="post">'
                    . $input .
                    '<input type="submit" value="enviar">
                </form>';
                print $_REQUEST;
            
        }

        public function delete($request){
            if($this->connection){
                $query = "DELETE FROM pessoas WHERE id = :id ";
                $statment = $this->connection->prepare($query);
                $result = $statment->execute([
                    ':id' => $request['id']
                ]);
                if($result){
                    return "Deletado com sucesso!";
                }return "Impossível deletar occorreu um erro";
            }
        }

    }
?>