<div class="titulo">PDO: Excluir</div>

<?php
require_once "conexao_pdo.php";
$sql = "DELETE FROM cadastro WHERE id = :id";

$conexao = novaConexao();
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', 6);

// if($stmt->execute([':id' => 6])) {
if($stmt->execute()) {
    echo "Sucesso :)";
} else {
    echo "Erro :(";
    print_r($stmt->errorInfo());
}