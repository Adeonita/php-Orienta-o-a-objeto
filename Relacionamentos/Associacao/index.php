<?php
/*Este é um exemplo de AGREGAÇÃO, onde a classe product recebe a classe fornecedor como parâmetro
Porém ambas independem uma da outra*/

require_once('product.class.php');
require_once('fornecedor.class.php');

$fornecedor = new Fornecedor( '1234', 'Agatismo', 'Salvador', "Rua Venezuela n383 - E paripe" );
$product = new Product('Bela calcinha confeccionada em renda', 69.69, 10, 'aj345', $fornecedor ); 

echo "Código do produto: ". $product->code . "<br>";
echo "Descrição do produto: " . $product->description . "<br>";
echo "Razão Social: " . $product->fornecedor->corporateName . "<br>";
echo "Codigo Fornecedor: " . $product->code . "<br>";