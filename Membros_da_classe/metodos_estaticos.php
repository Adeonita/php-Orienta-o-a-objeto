<?php

    class Application{

        static function Sobre(){
            $fd = fopen('readme.txt', 'r');
            while( $linha = fgets($fd, 200)){
                echo $linha.'<br>';
            }
        }
    }

    echo "Information about the application: <br><br>";
    Application::Sobre(); //Para acessar um método estático a sintaxe é Nome_da_classe::Nome_do_metodo
