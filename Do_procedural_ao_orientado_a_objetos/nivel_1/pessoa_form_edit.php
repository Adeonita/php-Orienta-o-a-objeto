<html>
    <head>
        <meta charset="utf-8"> 
        <title>Form Edit User</title>
        <link rel="stylesheet" href="css/form.css" type="text/css" media="screen">
    </head>
    <?php
        require_once('getConnection.php');
        if(!empty($_GET['id'])){ //Se o id não estiver vazio
           // print "Id não está vazio e é: ". $_GET['id'];
            $id = (int) $_GET['id']; //Pega o id via get
            $query = "SELECT * FROM pessoas WHERE id='{$id}'"; //Seleciona todos os campos da tabela pessoa onde o id corresponde ao id passado por parâmetro
            $result = mysqli_query(getConnection('sistema'), $query); //abro a conexão e seleciono o campo pessoas onde o id é igual ao id passado por parâmetro
            $row = mysqli_fetch_assoc($result); //Retorna um array com as linhas e colunas da linha atual
            $nome = $row['nome'];
            $endereco = $row['endereco'];
            $bairro = $row['bairro'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $id_cidade = $row['cidade'];
        }
    ?>
    <body>
        <h1>Atualização dos dados cadastrais</h1>
        <!--O action chama pra pessoa_update_insert-->
        <form enctype="multipart/form-data" action="pessoa_save_update.php" method="post" >
            <label> Código </label>
            <input  readonly="1" type="text" name="id" sytle="width: 30%" value="<?php echo $id;?>">
            <label> Nome </label>
            <input type="text" name="nome" sytle="width: 50%" value="<?php $nome;?>">
            <label> Endereço </label>
            <input type="text" name="endereco" style="width: 25%" value="<?php $endereco;?>">
            <label> Bairro </label>
            <input type="text" name="bairro" style="width: 25%" value="<?php $bairro;?>">
            <label> Telefone </label>
            <input type="text" name="telefone" style="width: 25%" value="<?php $telefone;?>">
            <label> Email </label>
            <input type="text" name="email" style="width: 25%" value="<?php $email;?>">
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
