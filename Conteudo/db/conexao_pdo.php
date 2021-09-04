<?php

// Acessando banco Mysql http://localhost/phpMyAdmin/

function novaConexao($banco = 'curso_php') {
    $servidor = '127.0.0.1:3306';
    $usuario = 'root';
    $senha = 'root';

    try {
        // Nova conexão com PDO
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco",
            $usuario, $senha); // deve informar qual é o banco (mysql)
        return $conexao;
    } catch(PDOException $e) {
        die('Erro: ' . $e->getMessage());
    }
}