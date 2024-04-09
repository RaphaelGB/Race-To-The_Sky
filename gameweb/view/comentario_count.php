<?php

include("../bd/conexao.php");
include("../controls/comentario.php");

$result = quant_comentario($conexao); // retorna array ( [quant] => 5 );
$new_result = array_values($result);
$quant = $new_result[0];

echo "<pre>";
print_r($quant);
echo "</pre>";

$item1 = buscar_avaliacao($conexao, $quant-2);
$item2 = buscar_avaliacao($conexao, $quant-3);
$item3 = buscar_avaliacao($conexao, $quant-4);


echo "<pre>";
print_r($item1);
echo "</pre>";


echo "<pre>";
print_r($item2);
echo "</pre>";

echo "<pre>";
print_r($item3);
echo "</pre>";

echo $item1['ID'];


?>