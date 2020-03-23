<?php   
    require_once('getConnection.php'); //Inserindo o arquivo que faz a conexão com o banco de dados 

    function pessoa_save_insert($connection){

        $dados = $_POST;
        $query = "SELECT max(id) as next FROM pessoas"; //Query para selecionar o próximo id da tabela pessoas pegando o maior valor correspondente ao id
        $result = mysqli_query($connection, $query); //query que retorna o próximo id
        $next = (int) mysqli_fetch_assoc($result)['next'] + 1; // mysqli_fetch_assoc retorna a linha atual + 1 (utilizado para incrementar o id)
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
            print "<h1>O registro foi inserido com sucesso</h1>";
        }else{
            print "Erro de conexão ".mysqli_error($connection);
        }

        mysqli_close($connection);

        
    }


    pessoa_save_insert(getConnection('sistema'));
?>

<html>
    <head>
        <link rel="stylesheet" href="css/list.css">
    </head>
    <body>
        <div class="icons-person-save-insert">
            <button class="bg-collor-button-person-list" onclick="window.location='pessoa_form_insert.php'">
                <img class="padding-icon" src="https://img.icons8.com/small/32/000000/add-user-male.png">
            </button>
            <button class="bg-collor-button-person-list" onclick="window.location='pessoa_list.php'">
                <img class="padding-icon" src="https://img.icons8.com/pastel-glyph/32/000000/groups.png">
            </button>
        </div>
        
    </body>
</html>