<div class="titulo">Gerenciando Sessão</div>

<?php
// session_id('bf1ttq6eujqi7i2fn4rbtujgi6'); // Roubando sessão
session_start();
echo session_id(); // Identificando Id da sessão

$contador = &$_SESSION['contador']; // Acessando a referencia de memoria da sessão
$contador = $contador ? $contador + 1 : 1;
echo '<br>' . $_SESSION['contador'];

if($_SESSION['contador'] % 5 === 0)  {
    session_regenerate_id(); // Gerando um novo Id (Regerando a sessão)
}

if($_SESSION['contador'] >= 15) {
    session_destroy(); // Derrubando sessão
}