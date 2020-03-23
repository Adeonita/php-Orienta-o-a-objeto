<?php
    class Contact{
        private $nome;
        private $telefone;

        public function setContact($nome, $telefone){
            $this->nome = $nome;
            $this->telefone =  $telefone;
        }

        public function getContact(){
            return "Nome: {$this->nome}, Telefone: {$this->telefone}";
        }
    }
?>