<?php
loadModel('Login'); // Carregando model Login
session_start(); // Usando sessão
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST); // O contrutor atribui os parametros recebidos em $_POST
    try {
        $user = $login->checkLogin();
        $_SESSION['user'] = $user; // adicionando usuario a sessão
        header("Location: day_records.php");
    } catch(AppException $e) { // AppException - classe de excessão personalizada
        $exception = $e;
    }
}


loadView('login', $_POST + ['exception' => $exception]); // Carregando View , retornando exception para ser exibida em messages.php