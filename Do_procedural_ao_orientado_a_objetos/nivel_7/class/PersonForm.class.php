<?php
    require_once('City.class.php');
    require_once('../traits/Connection.traits.php');

    class PersonForm {
        
        use Connection; 

        private $html;  //Armazena o template html
        private $data; //Armazena os dados do usuário

        public function __construct(){
           // $this->html = file_get_contents('../html/form.html'); //Carrega o formulário
            $this->data = [
                'id' => null,
                'nome' => null,
                'endereco' => null,
                'bairro' => null,
                'telefone' => null,
                'email' => null,
                'id_cidade' => null
            ];
            $cities = '';
            
        }

        public function show(){
            $this->connection->query();

        }
        
        
    }
?> 