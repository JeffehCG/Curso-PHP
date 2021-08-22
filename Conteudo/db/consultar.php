<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Consultar Registros</div>

<?php
require_once "conexao.php";

$sql = "SELECT id, nome, nascimento, email FROM cadastro";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

$registros = [];

// Verificando se retornou algum valor
if($resultado->num_rows > 0) {
    // Mapeando resultado de retorno
    while($row = $resultado->fetch_assoc()) { //fetch_assoc - retorna um array chave valor (coluna/valor)
        $registros[] = $row;
    }
} elseif($conexao->error) {
    echo "Erro: " . $conexao->error;
}

$conexao->close();
?>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <th>Código</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>E-mail</th>
    </thead>
    <tbody>
        <!-- Exibindo dados da consulta -->
        <?php foreach($registros as $registro): ?>
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nome'] ?></td>
                <td>
                    <?=
                        date('d/m/Y', strtotime($registro['nascimento']))
                    ?>
                </td>
                <td><?= $registro['email'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<style>
    table > * {
        font-size: 1.2rem;
    }
</style>