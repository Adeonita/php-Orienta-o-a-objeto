<!DOCTYPE html>
<html lang="br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/form.css">
        <title>Cadastro de usuarios</title>
    </head>

    <?php
        require_once('connection.php');

        /**
         * @param: connection - A conexao com o bando de dados
         * Função que executa um INSERT ou UPDATE na base de dados dependendo do parâmetro action passado por
         * um formulário  via get
         */
        function pessoa_form($connection){
            
            $id = '';
            $nome  = '';
            $endereco  = '';
            $bairro  = '';
            $telefone  = '';
            $email  = '';
            $id_cidade  = '';

            if(!empty($_REQUEST['action'])){ //Se action não estiver vazio
                if($_REQUEST['action'] == 'edit'){ //Se a ação for editar
                    $id = (int) $_GET['id'];
                    $query = "SELECT * FROM pessoas WHERE id='{$id}'"; //seleciono todos os campos da tabela pessoa onde o id é igual ao id passado
                    $result = mysqli_query($connection, $query);  
                    if($row = mysqli_fetch_assoc($result)){ //Se houver registros correspondentes
                        $id = $row['id'];  //Atribui as variaveis o conteudo que está salvo no banco de dados
                        $nome = $row['nome'];
                        $endereco = $row['endereco'];
                        $bairro = $row['bairro'];
                        $telefone = $row['telefone'];
                        $email = $row['email'];
                        $id_cidade = $row['id_cidade'];
                    }  
                }else  
                    if($_REQUEST['action'] == 'save'){ //Se a ação for salvar
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $endereco = $_POST['endereco'];
                        $bairro = $_POST['bairro'];
                        $telefone = $_POST['telefone'];
                        $email = $_POST['email'];
                        $id_cidade = $_POST['id_cidade'];
                        if(empty($_POST['id'])){ //Se id estiver vazio eu insiro no banco, pois é um novo usuário
                            $query = "SELECT max(id) as next FROM pessoas";
                            $result = mysqli_query($connection, $query);
                            $next = (int) mysqli_fetch_assoc($result)['next'] + 1;
                            var_dump($next);
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
                                                        '{$nome}',
                                                        '{$endereco}',
                                                        '{$bairro}',
                                                        '{$telefone}',
                                                        '{$email}',
                                                        '{$id_cidade}'
                                                    )";
                        $result = mysqli_query($connection, $sql);

                        }else{
                            $sql = "UPDATE pessoas SET nome = '{$nome}',
                                                       endereco = '{$endereco}',
                                                       bairro = '{$bairro}',
                                                       telefone = '{$tetefone}',
                                                       email = '{$email}',
                                                       id_cidade = '{$id_cidade}'
                                                    WHERE id = '{$id}'";
                            $result = mysqli_query($connection, $sql);

                        }
                        print ($result)? 'Registro salvo com sucesso':'Erro ao salvar registro '.mysqli_error($connection);
                        mysqli_close($connection);
                    }
            }
        }
    ?>

    <body>
    <h1>Atualização dos dados cadastrais</h1>
        <!--O action chama pra pessoa_update_insert-->
        <form enctype="multipart/form-data" action="pessoa_form.php?action=save" method="post" >
            <label> Código </label>
            <input  readonly="1" type="text" name="id" sytle="width: 30%" value="<?php echo $id;?>">
            <label> Nome </label>
            <input type="text" name="nome" sytle="width: 50%" value="<?php echo $nome;?>">
            <label> Endereço </label>
            <input type="text" name="endereco" style="width: 25%" value="<?php echo $endereco;?>">
            <label> Bairro </label>
            <input type="text" name="bairro" style="width: 25%" value="<?php echo $bairro;?>">
            <label> Telefone </label>
            <input type="text" name="telefone" style="width: 25%" value="<?php echo $telefone;?>">
            <label> Email </label>
            <input type="text" name="email" style="width: 25%" value="<?php echo $email;?>">
            <label> Cidade </label>
            <select name="id_cidade" style="width: 25%">
                <?php
                    require_once 'lista_combo_cidades.php';
                ?>
            </select>
            <input type="submit" value="enviar">
        </form>
    </body>
</html>

<?php
    pessoa_form(getConnection('sistema'));
?>