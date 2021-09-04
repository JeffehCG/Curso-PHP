<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];
// Recuperando batimentos do dia do usuario
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = strftime('%H:%M:%S', time());

    // Ponto forçado - simular
    if($_POST['forcedTime']) {
        $currentTime = $_POST['forcedTime'];
    }

    $records->innout($currentTime);
    addSuccessMsg('Ponto inserido com sucesso!');
} catch(AppException $e) {
    addErrorMsg($e->getMessage());
}

// Redirecionando para controller
header('Location: day_records.php');