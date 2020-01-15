<?
    //Provê uma interface para definição de filtros de seleção

    class TFilter extends TExpression{

        private $variable;
        private $operator;
        private $value;


        /**Método __construct() 
         * Instancia um novo filter
         * @param $variable = variável
         * @param $operator = operador (>,<)
         * @param $value = valor a ser comparado
         */

        public function __construct($variable, $operator, $value){
            $this->variable = $variable;
            $this->operator = $operator;
            $this->value = $this->transform($value); //O método transfom modifica o valor(De acordo com as regras estabelecidas) antes de atribuir a $this->value.
        }

        /**Método transform() 
         * Recebe um value como parâmetro e faz as modificações necessárias para que seja interpretado pelo DB, seja ele de qualquer tipo
         * @param $value = valor a ser transformado
         * return $result = string resultante
        */
        private function transform($value){
            if(is_array($value)){
                foreach($value as $x){
                    if(is_integer($value)){
                        $foo[] = $x; //Se for inteiro adiciona direto no array foo
                    }else
                        if(is_string($value)){
                            $foo[] = "'$x'"; //Se for string acrescenta aspas e adiciona no array foo 
                        }
                } 
                //Converte foo em string separada por ',' 
                //Ex: (arroz, feijao, carne)
                $result = '(' . implode(',', $foo) . ')';
            }
            else
                if(is_string($value)){
                    $result = "'$value'"; //Se for string acrescenta aspas
                }
            else
                if(is_null($valor)){
                    $result = 'NULL';  //atribui Nulo
                }
            else
                if(is_bool($value)){
                    $result = $value ? 'TRUE' : 'FALSE'; //atribui verdadeiro ou falso
                }
            else{
                $result = $value; //atribui o próprio valor sem alterações
            }
            return $result; //Retorna a variavel result
        }

        /**Método dump()
         * retorna o filtro em forma de expressão 
         */
        public function dump(){
            return "{$this->variable} {$this->operator} {$this->value}";
        }

    }
?>