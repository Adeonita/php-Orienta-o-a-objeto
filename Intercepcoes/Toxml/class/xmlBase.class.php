<?php
    class XmlBase{
        public function toXml(){
            $XML = '<' . get_class($this) . '> <br>';  //Pega o nome da classe em execução e abre a string
            $propertys = get_object_vars($this);  //Pega as variáveis da classe em execução 

            foreach( $propertys as $property => $value){
                $XML . "= <{$property}> {$value} </$property> <br>";
            }
            $XML = '</' . get_class($this) . '> <br>';  //Pega o nome da classe em execução e fecha a string
            return $XML;
        }
    }
?>