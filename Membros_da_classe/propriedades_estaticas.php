<?php

class Aplication{
    static $count;

    public function __construct($name){
        self::$count++; //Incrementa o atributo estática $count
        $i = self::$count;
        echo "Application nº {$i} : {$name} <br>";
    }
}

new Aplication(' Php '); //Executa o que está dentro do construtor e passa php como parâmetro
new Aplication(' Python ');

