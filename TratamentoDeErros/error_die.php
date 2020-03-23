<?php 
    //Aborta a execução se houver erro
    function open($file = NULL){
        if(!$file){
            die('É necessário inserir o parâmetro com o nome do arquivo');
        }
        if(!file_exists($file)){
            die('Arquivo inexistente');
        }
        if(!$retorno = @file_get_contents($file)){
            die('Impossível ler o arquivo');
        }
        return $retorno;
    }
    open(); //Erro 01
    open('teste'); //Erro 02
?>