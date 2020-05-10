<?php
/**
 require_once('class/Form.class.php');
 require_once('class/Person.class.php');
 require_once('class/City.class.php');

 

 $person = new Person();
// $person->showAll();
 $form = new Form();
 $form->show();

 $form = new City();
*/

spl_autoload_register(function($fileName){
    $path = "class/{$fileName}.class.php";
    if(file_exists($path)){
        require_once($path);
    }
});
//Valida class
if(isset($_REQUEST['class']) and !empty($_REQUEST['class']) and class_exists($_REQUEST['class'])){
    $class = $_REQUEST['class'];
    //$obj = new $class($_REQUEST);
}
//Valida Metodo
if(isset($_REQUEST['method']) and !empty($_REQUEST['method']) and method_exists($class, $_REQUEST['method'])){
    $method = $_REQUEST['method'];
    //$obj->$method($_REQUEST);  
}else{
    $method = 'show';
    //$obj->$method();  
}


$style = 'font-size: 42px;
          text-align: center;
          margin: 290px;';

if($class and $method){
    $obj = new $class($_REQUEST);
    $obj->$method($_REQUEST);    
}else{
    print '<h1 style="'.$style.'">Alguem está perdido por aqui!</h1>';
}




/*$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'show';

if(class_exists($classe)){
    $obj = new $classe($_REQUEST);
    if(!empty($method) and (method_exists($classe, $method)) and $method == 'save'){
        $obj->show();
        $obj->$method($_REQUEST);
    }
}*/

?>