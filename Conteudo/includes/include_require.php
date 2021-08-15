<div class="titulo">Include vs Require</div>

<?php
ini_set('display_errors', 1);

// Include não da erro fatal quando referencia um arquivo que não existe
echo 'Usando include com arquivo inexistente...<br>';
include('arquivo_inexistente.php');

// Já require ocorre erro fatal
echo 'Usando require com arquivo inexistente...<br>';
require('arquivo_inexistente.php');

echo 'Não achou mesmo... <br>';