<?php
session_start();
session_destroy(); // Limpando a sessão
header('Location: basico_sessao.php'); // Voltando para pagina basico_sessao