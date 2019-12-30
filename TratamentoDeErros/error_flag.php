<?php
    //Dispara flags para saber se execução foi(true ou 1) ou não (false ou 0) bem sucedida

    function open($file){
        if(!$file){
            return FALSE;
        }
        if(!file_exists($file)){
            return FALSE;
        }
        if(!$retorno = @file_get_contents($file)){
            return FALSE;
        }
        return $retorno;
    }

    //   Testando 
    $file = open('testando');

    if($file == FALSE){
        print 'Falha ao abir o arquivo ';
    }else{
        print $file;
    }
?>