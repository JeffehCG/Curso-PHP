<div class="titulo">Include Função</div>

<?php
echo 'Carregando: include_funcao<br>';

function carregarArquivo() {
    include('include_arquivo.php');

    echo $variavel . '<br>';
    echo soma(2, 5) . '!<br>';
}

echo 'Novamente no arquivo include_funcao<br>';
// echo soma(1, 8) . '!<br>';
carregarArquivo();

echo "Variável = '{$variavel}'."; // Não é possivel acessar a variavel, pois ela foi incluida (include) apenas no contexto da funcção
// var_dump($variavel);
echo '<br>' . soma(3, 8); // Já a função pode ser acessada mesmo sendo incluida em outro contexto