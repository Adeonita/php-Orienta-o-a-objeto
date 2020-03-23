<html>
    <head>
        <meta charset="utf-8">
        <title>Listagem de Usuários</title>
        <link rel="stylesheet" href="../css/list.css" type="text/css" media="screen">
    </head>
    <body>
        <?php
            require_once('connection.php');
            $connection = getConnection('sistema');
            //Checa se action está vazio e se é igual a delete, se for monta a query de delete do banco, se nao for ele lista os usuarios
            if( !empty($_GET['action']) AND ($_GET['action'] == 'delete')){ //se o campo action nao estiver vazio e seu valor for delete
                $id = (int) $_GET['id'];
                $query = " DELETE FROM pessoas WHERE id='{$id}' " ; //Query que deleta
                $result = mysqli_query($connection, $query);
                if($result){
                    print 'Deletado com sucesso';
                }
            }
            $query = 'SELECT * FROM pessoas ORDER BY id'; //query que seleciona
            $result = mysqli_query($connection, $query);

        ?>
        <table border=1>
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Neighborhood</th>
                    <th>Phone</th>
                </tr>
            </thead> <!--Fim do cabeçalho da tabela-->
            <tbody> <!--Inicio do corpo da tabela que será carregado do bd-->

                <?php
                    $query = 'SELECT * FROM pessoas ORDER BY id'; //Selecione todos os campos da tabela pessoa ordenados pelo id
                    $result = mysqli_query(getConnection('sistema'), $query);
                    //var_dump(mysqli_query(getConnection('sistema'), $query));
                    while($row = mysqli_fetch_assoc($result)){  //Enquanto houver retorno da função mysqli_fetch_asscoc, que está sendo atribuida a linha
                        $id = $row['id'];  //E atribuo o row['indice'] as variáveis correspondentes
                        $nome = $row['nome'];
                        $endereco = $row['endereco'];
                        $bairro = $row['bairro'];
                        $telefone = $row['telefone'];
                        $email = $row['email'];
                        $id_cidade = $row['id_cidade'];                    
                ?>

                <tr>
                    <td align='center'>
                        <a href="pessoa_form.php?action=edit&id=<?php echo $id; ?>"> <!--Passagem do parâmetro id via get-->
                            <img class="padding-icon" src="https://img.icons8.com/windows/32/000000/edit-user.png">
                        </a>
                    </td>
                    <td align='center'>
                        <a href="pessoa_list.php?action=delete&id=<?php echo $id; ?>">
                            <img class="padding-icon" src="https://img.icons8.com/windows/32/000000/remove-user-male--v1.png">
                        </a>
                    </td>
                    <!--Imprimo em tela todas as variáveis que foram capturadas no while-->
                    <td> <?php echo $id; ?></td>  
                    <td> <?php echo $nome; ?></td>
                    <td> <?php echo $endereco; ?></td>
                    <td> <?php echo $bairro; ?></td>
                    <td> <?php echo $telefone; ?></td>
                </tr>
            <?php
                } //Fim do while
            ?>
            </tbody>
        </table>
        <div class="icons-person-list">
            <button class="bg-collor-button-person-list" onclick="window.location='pessoa_form_insert.php'">
                <img  class="padding-icon-div-list" src="https://img.icons8.com/windows/32/000000/add-user-male--v1.png">
            </button>
            <button class="bg-collor-button-person-list" onclick="window.location='pessoa_list.php'">
                <img class="padding-icon-div-list"  src="https://img.icons8.com/ios-glyphs/30/000000/refresh.png">
            </button>            
        </div>
    </body>
</html>