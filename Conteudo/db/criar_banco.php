<div class="titulo">Criar Banco</div>

<?php

require_once "conexao.php";

$conexao = novaConexao(null);
// Criando nova instancia de banco, caso não exista
$sql = 'CREATE DATABASE IF NOT EXISTS curso_php';

// Executando query
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

// Fechando conexão
$conexao->close();