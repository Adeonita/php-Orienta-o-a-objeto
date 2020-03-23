<?php
    require_once('../connection.php');

    function pessoa_form($connection){
        
        if(!empty($_REQUEST['action'])){ //Se existir uma ação
            if($_REQUEST['action'] == 'edit'){ //E se a ação for editar
                $id = (int) $_GET['id'];  //Pego o id via get
                $query = "SELECT * FROM pessoas WHERE id = '{$id}'"; //Trago todos os dados da pessoa com o id correspondente
                $result = mysqli_query($connection, $query);
                $pessoa = mysqli_fetch_assco($result); //E atribuo o retorno de todos os campos a variavel pessoa
            }else
                if($_REQUEST['action'] == 'save'){ //E se a ação for salvar
                    $pessoa = $_POST; //Pego todos os dados que vieram via post e atribuo a variavel pessoa
                    if(empty($_POST['id'])){ //Se o id estiver vazio
                        $query = 'SELECT max(id) as next FROM pessoas'; //Seleciono o maior id da tabela pessoas e atribuo a next
                        $result = mysqi_query($connection, $query);
                        $next = (int) mysqli_fetch_assoc($result)['next'] + 1; //Auto incremento manual do id
                        $sql = "INSERT INTO pessoas   /**Query de inserçao */
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
                                                '{$pessoa['nome']}',
                                                '{$pessoa['endereco']}',
                                                '{$pessoa['bairro']}',
                                                '{$pessoa['telefone']}',
                                                '{$pessoa['email']}',
                                                '{$pessoa['id_cidade']}'
                                            )";
                        $result = mysqli_query($connection, $sql);  //Insiro os valores passados no banco de dados
                    }else{  //Se o id não estiver vazio
                        $sql = "UPDATE pessoa SET   /**Query de atualização */
                                                    nome = '{$pessoa['nome']}',
                                                    endereco = '{$pessoa['endereco']}',
                                                    bairro = '{$pessoa['bairro']}',
                                                    teelfone  = '{$pessoa['telefone']}',
                                                    email  = '{$pessoa['email']}',
                                                    id_cidade  = '{$pessoa['id_cidade']}'

                                             WHERE id  = '{$pessoa['id']}'";
                        $result = mysqli_query($connection, $sql);
                    }
                    print ($result) ? 'Registro salvo com sucesso' : 'Erro na inserção do registro'.mysqli_error($connection);
                    mysqli_close($connection);
                }else{  // Se a action não for salvar nem editar
                    print "Essa ação não está registrada em nossa base de dados ";
                    $pessoa = []; //Crio um array pessoa e deixo todos os seus campos vazios
                    $pessoa['id'] = '';
                    $pessoa['nome'] = '';
                    $pessoa['endereco'] = '';
                    $pessoa['bairro'] = '';
                    $pessoa['telefone'] = '';
                    $pessoa['email'] = '';
                    $pessoa['id_cidade'] = '';
                }
        }

        require_once('../lista_combo_cidades.php');
        $form = file_get_contents('html/form.html');  //Abre o arquivo e retorna uma string
        $atributos = ['id',' nome',' endereco', 'bairro', 'telefone', 'email', 'id_cidade', 'cidades'];
        foreach ($atributos as $atributo){
            if($atributo == 'cidades'){
                $form = str_replace('{cidades}', lista_combo_cidades($pessoa['id_cidade']), $form);
                print $form;

            }else{
                $form = str_replace($atributo, $pessoa[$atributo], $form);     
                print $form;
      
            }
        }
         

       print $form;

    }

    pessoa_form(getConnection('sistema'));
?>