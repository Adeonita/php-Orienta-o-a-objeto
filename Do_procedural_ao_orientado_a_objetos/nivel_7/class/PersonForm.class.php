<?php
    require_once('class/City.class.php');
    require_once('traits/Connection.trait.php');

    class PersonForm {
        use Connection{
            Connection::__construct as private __traitConstruct;
        }
        

        private $html;  //Armazena o template html
        private $data; //Armazena os dados do usuário


        public function __construct(){
            $this->__traitConstruct();

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
            var_dump($this->connection);exit;
            
        }
        
        
    }
?> 