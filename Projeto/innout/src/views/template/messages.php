<?php
$errors = [];


if(isset($_SESSION['message'])) { // Pegando mensagens da sessão
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Limpando chave message sessão
} elseif($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    // Caso a excesão seja do tipo ValidationException, atribui ao array errors (Erros dos campos)
    if(get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}

// Definindo o tipo de alerta
$alertType = '';

if($message['type'] === 'error') {
    $alertType = 'danger';
} else {
    $alertType = 'success';
}
?>

<!-- Exibindo messagem caso exista -->
<?php if($message): ?>
    <div role="alert"
        class="my-3 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
<?php endif ?>