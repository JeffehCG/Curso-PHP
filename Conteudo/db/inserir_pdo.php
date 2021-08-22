<div class="titulo">PDO: Inserir</div>

<?php
require_once "conexao_pdo.php";

$sql = "INSERT INTO cadastro
(nome, email, nascimento, site, filhos, salario)
VALUES (
    'Guilherme Filho',
    'guidagalera@gmail.com',
    '1998-7-21',
    'http://guidagalera.com.br',
    0,
    3000
)";

$conexao = novaConexao();
// print_r(get_class_methods($conexao)); //get_class_methods - exibe as propriedades e metodos de um objeto

if($conexao->exec($sql)) {
    $id = $conexao->lastInsertId(); // recuperando ultimo id adicionado
    echo "Novo cadastro com id $id.";
} else {
    echo $conexao->errorCode() . "<br>";
    print_r($conexao->errorInfo());
}

$conexao->close();