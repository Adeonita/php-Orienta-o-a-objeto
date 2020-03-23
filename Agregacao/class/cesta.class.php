<?php
/*Um objeto agregando outro objeto e tornando ele parte de si através da utilização de seus métodos e podendo utilizar
funcionalidades dos seus objetos agregados. É possivel utilizar uma ou muitas instâncias do objeto agregado
Para muitas instâncias utilize arrays como atributo da classe. */

class Cesta{
    private $itens;

   public function addItens(Product $item){  //Adiciona a cesta um objeto do tipo PRODUCT
        $this->itens[] = $item;  //Itens é uma array que guarda itens do tipo Produto, e a cada chamada do método addItens há acumulação de item no array itens
    }

    public function showList(){
        foreach($this->itens as $item){
            $item->printTag();
            print '<br>';
        }
    }

    public function calculateTotal(){
        $total = 0;
        foreach($this->itens as $item){
           $total = $total + $item->price;
        }
        return 'R$: '. $total;
    }
}

?>