<?php
    include_once 'app.ado/TExpression.class.php';
    include_once 'app.ado/TFilter.class.php';
    print "Após passar pela classe filter os dados enviados por parâmetros tornam-se uma unica string, já tratada conforme 
            regras estabelecidas no método transform(). <br><br>";
  
    $filter = new TFilter('Data', '=', '15-01-2019'); //Filtro pra string
    print $filter->dump() . ' Caso string adiciona aspas <br>';

    $filter1 = new TFilter('Salário', '>', 650); //Filtro pra integer
    print $filter1->dump() . '<br>';

    $filter2 = new TFilter('Sexo', 'IN', array('M', 'F')); //Filtro pra array
    print $filter2->dump() . '<br>';

    $filter3 = new TFilter('Contrato', 'IS NOT', NULL); //Filtro pra NULL
    print $filter3->dump() . '<br>';

    $filter4 = new TFilter('Ativo', '=', true); //Filtro pra boolean
    print $filter4->dump() . '<br>';

    
?>