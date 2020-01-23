<html>
    <head>
        <meta charset="utf-8">
        <title>
            Cadastro de pessoas
        </title>
        <link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <form enctype="multipart/formdata" method="post" action="pessoa_save_insert.php">
            <label> Código </label>
            <input  readonly="1" type="text" name="id" sytle="width: 30%">
            <label> Nome </label>
            <input type="text" name="nome" sytle="width: 50%">
            <label> Endereço </label>
            <input type="text" name="bairro" style="width: 25%">
            <label> Telefone </label>
            <input type="text" name="telefone" style="width: 25%">
            <label> Email </label>
            <input type="text" name="email" style="width: 25%">
            <label> Cidade </label>
            <select name="id_cidade" style="width: 25%">
                <?php
                    require_once 'lista_combos_cidades()';
                    print lista_combos_cidades();
                ?>
            </select>
            <input type="submit">
        </form>
    </body>
</html>