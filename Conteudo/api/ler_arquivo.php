<div class="titulo">Ler Arquivo</div>

<?php
// Lendo arquivo

$arquivo = fopen('teste.txt', 'r'); // Abrindo em modo de leitura
echo fread($arquivo, 10); // Lendo 10 bytes do arquivo
echo '<br>';
echo fread($arquivo, 10); // Lendo mais 10 bytes do arquivo
fclose($arquivo); // Fechando arquivo

echo '<hr>';

$arquivo = fopen('teste.txt', 'r');
$tamanho = filesize('teste.txt'); // Identificando o tamanho do arquivo
echo $tamanho, '<br>';
echo fread($arquivo, $tamanho); // Lendo a quantidade de bytes do arquivo
fclose($arquivo);

echo '<hr>';

$arquivo = fopen('teste.txt', 'r');
echo fgets($arquivo), '<br>'; // Lendo a primeira linha do arquivo
echo fgets($arquivo), '<br>'; // Lendo a segunda linha do arquivo
var_dump(fgets($arquivo));
echo '<br>';
fclose($arquivo);

echo '<hr>';

// Lendo arquivo - Linha por linha
$arquivo = fopen('teste.txt', 'r');
while(!feof($arquivo)) { // feof - identifica quando o arquivo chega no final
    echo fgets($arquivo), '<br>';
}
fclose($arquivo);

// Lendo arquivo - Caracter por caracter
echo '<hr>';
$arquivo = fopen('teste.txt', 'r');
while(!feof($arquivo)) {  
    echo fgetc($arquivo);
}
echo '<br>';
fclose($arquivo);

echo '<hr>';

// Abrindo arquivo em modo de leitura+ (O arquivo pode ser lido e alterado ao mesmo tempo)
$arquivo = fopen('teste.txt', 'r+');
echo fgets($arquivo), '<br>';
echo fgets($arquivo), '<br>';
fwrite($arquivo, "\nAdicionado durante a leitura");
fclose($arquivo);

echo "Fim!";