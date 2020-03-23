<?php
    require_once('../connection.php');

    function pessoa_list($connection){
        
        if(!(empty($_GET['action'])) AND $_GET['action'] == 'delete'){ //Se a action não estiver vazia e for igual a deletar
                $id = (int) $_GET['id'];   //Armazeno o id armazenado em GET['id] em $id
                $query = "DELETE FROM pessoas WHERE id='{$id}'";
                $result = mysqli_query($connection, $query); //Deleta usuario
        }else{
            $query = "SELECT * FROM pessoas ORDER BY id";
            $result = mysqli_query($connection, $query);
        }
        $itens = '';
        while ($row = mysqli_fetch_assoc($result)){
            $item = file_get_contents('html/item.html');
            $item = str_replace('{id}', $row['id'], $item);
            $item = str_replace('{nome}', $row['nome'], $item);
            $item = str_replace('{endereco}', $row['endereco'], $item);
            $item = str_replace('{bairro}', $row['bairro'], $item);
            $item = str_replace('{telefone}', $row['telefone'], $item);
            $itens .= $item;
        }
        $list = file_get_contents('html/list.html');
        $list = str_replace('{itens}', $itens, $list);
        print $list;
    }

   $function = pessoa_list(getConnection('sistema'));
?>