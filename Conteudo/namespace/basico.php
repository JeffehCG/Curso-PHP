<?php namespace contexto; ?>  
<!-- Declarando namespace -->

<div class="titulo">Exemplo Básico</div>

<?php
echo __NAMESPACE__ . '<br>'; // Identificando namespace atual
const constante1 = 123;
define('contexto\constante2', 234);
define(__NAMESPACE__ . '\constante3', 345); // Definindo constante no namespace atual
define('outro_contexto\constante4', 456); // Definindo constante em outro namespace

echo constante1 . '<br>';
echo constante2 . '<br>';
// echo contexto\constante3 . '<br>';
echo \contexto\constante3 . '<br>'; // barra na frente para acessar o valor apartir do contexto raiz
echo constant(__NAMESPACE__ . '\constante3') . '<br>';
// echo constante4 . '<br>';
echo \outro_contexto\constante4 . '<br>'; // Acessando outro namespace

function soma($a, $b) {
    return $a + $b;
}

echo \contexto\soma(1, 2) . '<br>'; // Acessando caminho completo - o namespace funciona como diretorios
echo soma(1, 2) . '<br>';

function strpos($str, $text) {
    echo "Buscando o texto '{$text}' em '{$str}'<br>";
    return 1;
}

// Função no contexto atual, e no contexto raiz - Namespace
echo strpos('Texto genérico para busca', 'busca') . '<br>';
echo \strpos('Texto genérico para busca', 'busca') . '<br>';