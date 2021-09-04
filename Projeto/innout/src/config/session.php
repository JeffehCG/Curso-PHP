<?php

function requireValidSession($requiresAdmin = false) {
    $user = $_SESSION['user'];
    if(!isset($user)) { // Se usuario não estiver setado na sessão, redirecionar pra login
        header('Location: login.php');
        exit();
    } elseif($requiresAdmin && !$user->is_admin) {
        addErrorMsg('Acesso negado!');
        header('Location: day_records.php');
        exit();
    }
}