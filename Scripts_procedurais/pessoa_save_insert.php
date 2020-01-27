<?php   
    require_once('getConnection.php'); //Inserindo o arquivo que faz a conexão com o banco de dados 

    function pessoa_save_insert($connection){

        $dados = $_POST;
        $query = "SELECT max(id) as next FROM pessoas"; //
        $result = mysqli_query($connection, $query);
        $next = (int) mysqli_fetch_assoc($result)['next'] + 1;
        $sql = "INSERT INTO pessoas
                                (   
                                    id,
                                    nome,
                                    endereco,
                                    bairro,
                                    telefone,
                                    email,
                                    id_cidade
                                )
                            VALUES 
                                (
                                    '{$next}',
                                    '{$dados['nome']}',
                                    '{$dados['endereco']}',
                                    '{$dados['bairro']}',
                                    '{$dados['telefone']}', 
                                    '{$dados['email']}',
                                    '{$dados['id_cidade']}'
                                )";
            
        $result = mysqli_query($connection, $sql);
        if($result){
            print "O registro foi inserido com sucesso";
        }else{
            print "Erro de conexão ".mysqli_error($connection);
        }

        mysqli_close($connection);
    }

    pessoa_save_insert(getConnection('sistema'));
?>