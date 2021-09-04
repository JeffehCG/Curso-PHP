<?php

// Acessando banco Mysql http://localhost/phpMyAdmin/

// Criando nova conexão
function novaConexao($banco = 'curso_php') {
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = 'root';

    // Nova conexão com mysqli
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    // Verificando se a conexão foi efetuada com sucesso
    if($conexao->connect_error) {
        die('Erro: ' . $conexao->connect_error); // die - matando todo processamento da aplicação
        // echo('Erro: ' . $conexao->connect_error);
        // exit();
    }

    return $conexao;
}