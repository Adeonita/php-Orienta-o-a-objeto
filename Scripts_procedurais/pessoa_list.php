<html>
    <head>
        <meta charset="utf-8">
        <title>Listagem de Usuários</title>
        <link rel="stylesheet" href="css/list.css" type="text/css" media="screen">
    </head>
    <body>
        <?php
            require_once('getConnection.php');
            $query = 'SELECT * FROM pessoas ORDER BY id';
            $connection = getConnection('sistema');
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
                    require_once('getConnection.php'); //Carrego o arquivo da conexão
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
                        <a href="pessoa_form_edit.php?id=<?php echo $id; ?>">
                            <img class="padding-icon" src="https://img.icons8.com/windows/32/000000/edit-user.png">
                        </a>
                    </td>
                    <td align='center'>
                        <a href="pessoa_delet.php?id=<?php echo $id; ?>">
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