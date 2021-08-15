<div class="titulo">Comparação Arrays</div>

<?php
$arr1 = ['nome' => 'Maria', 'idade' => 20];
$arr2 = ['nome' => 'Maria', 'idade' => 20];
var_dump($arr1 == $arr2); // True
var_dump($arr1 === $arr2); // True - Concidera a order do array

$arr3 = ['idade' => 20, 'nome' => 'Maria'];
echo '<br>';
var_dump($arr1 == $arr3); // True
var_dump($arr1 === $arr3); // False
var_dump($arr1 != $arr3); // False
var_dump($arr1 !== $arr3); // True

echo '<br>';
$arr4 = ['idade' => '20', 'nome' => 'Maria'];
var_dump($arr1 == $arr4); // True
var_dump($arr1 === $arr4); // False
