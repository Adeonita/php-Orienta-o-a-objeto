<?php
 
    class Library{
        const Nome = "GTK ";
    }

    class Aplication extends Library{
        const Ambiente = "Gnome Desktop ";
        const Versao = " 3.8";

        public function __construct($Nome){
            //Chamo parent::Nome pois ele herda de library
            //self::Ambiente pois está dentro da mesma classe
            //O mesmo para Versão
            echo parent::Nome.self::Ambiente.self::Versao.$Nome."<br>"; 
        }
    }
    echo Library::Nome . Aplication::Ambiente . Aplication::Versao."<br>";
    new Aplication(' Adeonita');
    new Aplication(' Junior');


    

