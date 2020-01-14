<?php
    //Classe que gerencia as expressões

    abstract class TExpression{

        const AND_OPERATOR = 'AND';
        const OR_OPERATOR = 'OR';

        //Marca o método dump() como obrigatório nas classes-filha
        abstract public function dump();

    }
?>