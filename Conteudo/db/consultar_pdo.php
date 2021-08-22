<div class="titulo">PDO: Consultar</div>

<?php
require_once "conexao_pdo.php";

$conexao = novaConexao();
$sql = "SELECT * from cadastro";

// fetchAll - retorna valores da consulta. É possivel definir o tipo do retorno
// PDO::FETCH_NUM - Array indexado
// PDO::FETCH_ASSOC - Array chave valor
// PDO::FETCH_CLASS - Formato de classe
// PDO::FETCH_BOTH - NUM e ASSOC
$resultado = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
print_r($resultado);

echo "<hr>";

// Consulta paginada
$sql = "SELECT * FROM cadastro LIMIT :qtde OFFSET :inicio";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(':qtde', 2, PDO::PARAM_INT); // Define o parametro que sera substituido, valor, e o tipo do dado
$stmt->bindValue(':inicio', 3, PDO::PARAM_INT);

// print_r(get_class_methods($stmt));

if($stmt->execute()) {
    $resultado = $stmt->fetchAll();
    print_r($resultado);
} else {
    echo "Código: " . $stmt->errorCode() . "<br>";
    print_r($stmt->errorInfo());
}

echo "<hr>";

$sql = "SELECT * FROM cadastro WHERE id = :id";
$stmt = $conexao->prepare($sql);
// $stmt->bindValue(':id', 15);
// if($stmt->execute()) {
// if($stmt->execute([14])) {

// Consulta por ID
if($stmt->execute([':id' => 6])) {
    $resultado = $stmt->fetch(); // fetch retorna apenas um resultado
    print_r($resultado);
} else {
    echo "Código: " . $stmt->errorCode() . "<br>";
    print_r($stmt->errorInfo());
}

$conexao->close();