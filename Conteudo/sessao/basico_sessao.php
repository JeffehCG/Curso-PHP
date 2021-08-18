<div class="titulo">Sessão</div>

<?php
session_start(); // Metodo para a sessão ficar disponivel para ser acessada

print_r($_SESSION); // Chaves da sessão
echo '<br>';

if(!$_SESSION['nome']) {
    $_SESSION['nome'] = 'Gabriel'; // Adicionando chave a sessão
}

if(!$_SESSION['email']) {
    $_SESSION['email'] = 'gabriel@azmail.com';
}

print_r($_SESSION);

?>

<p>
    <a href='/sessao/basico_sessao_alterar.php'>
        Alterar Sessão
    </a>
</p>