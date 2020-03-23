<?php

    /**
     *Função que retorna a conexão com o banco de dados
     * @param database : é o banco de dados, que é passado como nulo pois é opcional
     * @return mysqli_connection : Conexão com o banco de dados
     **/ 

    function getConnection(string $dataBase = null){
        $dbHost = 'mysql';
        $dbUser = 'root';
        $dbPassword = 'tiger';    
        return mysqli_connect($dbHost, $dbUser,$dbPassword, $dataBase);
    }
    //print getType(getConnection());

?>