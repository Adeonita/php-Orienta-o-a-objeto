<?php
    require_once('getConnection.php');
    
    function pessoa_save_update($connection){
        if($_POST['id']){ //Se houver um id passado via post
            $query = "UPDATE pessoas SET nome = '{$_POST['nome']}',
                                         endereco = '{$_POST['endereco']}',
                                         bairro = '{$_POST['bairro']}',
                                         telefone = '{$_POST['telefone']}',
                                         email = '{$_POST['email']}',
                                         id_cidade = '{$_POST['id_cidade']}'
                                     
                                    WHERE id = '{$_POST['id']}' ";
    
            $result = mysqli_query($connection, $query);
    
            if($result){
                print "<h1> Registro atualizado com sucesso!! </h1>";
            }else{
                print "<h1> Erro ao atualizar registro  </h1>".mysqli_error($connection);
            }
        }
        mysqli_close($connection);
    }

    pessoa_save_update(getConnection('sistema'));
?>