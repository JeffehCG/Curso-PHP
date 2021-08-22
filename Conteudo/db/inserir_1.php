<div class="titulo">Inserir Registro #01</div>

<?php

require_once "conexao.php";

$sql = "INSERT INTO cadastro
(nome, nascimento, email, site, filhos, salario)
VALUES (
    'Pedro',
    '1997-05-22',
    'Pedro@yahoo.com',
    'https://pedro.io',
    1,
    5700.87
)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();