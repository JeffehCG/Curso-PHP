<?php
echo 'Carregando: include_arquivo<br>';

$variavel = 'Estou definida';

// Caso o arquivo seja referenciado multiplas vezes, evita erros
// Pois uma função criada não pode ser redefinida
if(!function_exists('soma')) {
    function soma($a, $b) {
        return $a + $b;
    }
}