<?php
    require_once('class/City.class.php');
    require_once('class/Person.class.php');
    require_once('traits/Connection.trait.php');

    class Form {
        /*Quando for utizar uma trait é preciso executar o seu método construtor na classe que a implementa
        */

        use Connection{
            Connection::__construct as private __traitConstruct;
        }
        

        private $html;  //Armazena o template html
        private $data; //Armazena os dados do usuário


        public function __construct(){
            $this->__traitConstruct(); //chamada do construtor da trait
            $this->html = file_get_contents('../html/form.html'); //Carrega o formulário
            $this->data = [  //Inicializo os inputs do formulário para posterior substituição 
                'id' => null,
                'nome' => null,
                'endereco' => null,
                'bairro' => null,
                'telefone' => null,
                'email' => null,
                'id_cidade' => null
            ];
            $cidades = '';
            $cities = new City();  //Instância da classe city
            $cities = $cities->findAll();  //Chamada do método que trás todas as cidades com seu id
            foreach($cities as $city){             //Percorro a variavel cities e 
                $cidades = $cidades . "<option value='{$city['id']}'> {$city['nome']}</option>";  //A preencho com o html referente as options de um select
            }
            $this->html =  str_replace('{cidades}', $cidades, $this->html);  //Substituo a demarcação {cidades} do formulário pela variavel cidades
        }

        public function save($params){      
            Person::save($params);
        }


        public function show(): void{
            foreach(array_keys($this->data) as $attribute){
                $this->html = str_replace('{'.$attribute.'}', $this->data[$attribute], $this->html);
            }
            $this->html = str_replace("option value ='{$this->data['id_cidade']}'",
                                      "option selected=1 value='{$this->data['id_cidade']}'",
                                      $this->html );
            print $this->html;
        }
        
    }
?> 