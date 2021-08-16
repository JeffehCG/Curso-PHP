<div class="titulo">Error Handler</div>

<?php
ini_set('display_errors', 1);
// echo 4 / 0 . '<br>';

error_reporting(E_ERROR); // Exibir apenas error
// echo 4 / 0 . '<br>';

error_reporting(E_ALL); // Exibir tudo, error, warning
// echo 4 / 0 . '<br>';

error_reporting(~E_ALL); // Não exibe nada
echo 4 / 0 . '<br>';

echo '<hr>';

error_reporting(E_ALL);
echo 4 / 0 . '<br>';
include 'arquivo_inexistente.php';

function filtrarMensagem($errno, $errstring) {
    $text = 'include';
    // $text = 'by zero';
    return !!stripos(" $errstring", $text);
}

// Definindo função para filtrar mensagem de erro
set_error_handler('filtrarMensagem', E_WARNING);

echo '<hr>';
echo 4 / 0 . '<br>';
include 'arquivo_inexistente.php';

echo '<hr>';

restore_error_handler();

echo 4 / 0 . '<br>';
include 'arquivo_inexistente.php';