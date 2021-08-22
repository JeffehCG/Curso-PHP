<div class="titulo">Escrever Arquivo</div>

<?php
// Criando Arquivo

$arquivo = fopen('teste.txt', 'w'); // fopen - abrir arquivo que ñão existe, 'w' - em modo escrita
fwrite($arquivo, "Valor inicial\n"); // Escrevendo no arquivo 
$str = "Segunda linha\n";
fwrite($arquivo, $str);
fclose($arquivo); // Fechando arquivo

$arquivo = fopen('teste.txt', 'w'); // Abrindo novamente o arquivo em modo escrita, repare que o arquivo sera zerado
fwrite($arquivo, "Novo conteúdo");
fclose($arquivo);

$arquivo = fopen('teste.txt', 'a'); // Abrindo o arquivo em append, dessa vez o que foi escrito anteriormente sera mantido
fwrite($arquivo, " com novos valores\n"); // acrescentando nova linha
fwrite($arquivo, "Adicionados em um segundo momento");
fclose($arquivo);

ini_set('display_errors', 1);
$arquivo = fopen('teste.txt', 'x'); // modo x - garante que o arquivo não exista, para não sobreescrevelo
                                    // Caso o arquivo ja exista ira ocorrer um erro