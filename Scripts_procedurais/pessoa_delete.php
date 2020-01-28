<?php
    require_once('getConnection.php');

    function pessoa_delete($connection){
        if(!empty($_GET['id'])){ //Se o id que vem por requisição get não estiver vazio
            $query = "DELETE FROM pessoas WHERE id = '{$_GET['id']}'";
            $result = mysqli_query($connection, $query);

            if($result){
                print "Usuário deletado com sucesso";
            }else{
                print "Erro ao deletar usuário".mysqli_error($connection);
            }
            mysqli_close($connection);
        }

    }

    pessoa_delete(getConnection('sistema'));
?>