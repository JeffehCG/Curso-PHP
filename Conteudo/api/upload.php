<div class="titulo">Upload</div>

<?php 
// Upload de arquivo

print_r($_FILES);

if($_FILES && $_FILES['arquivo']) { // Identificando se existe arquivo na chave do input 'arquivo'

    mkdir(__DIR__.'/../files/', 0777, true); // Criando pasta

    $pastaUpload = __DIR__ . '/../files/';
    $nomeArquivo = $_FILES['arquivo']['name']; // Pegando nome do arquivo
    $arquivo = $pastaUpload . $nomeArquivo; // Tamanho completo arquivo
    $tmp = $_FILES['arquivo']['tmp_name']; // Identeificando diretorio temporario

    if (move_uploaded_file($tmp, $arquivo)) { // Movendo arquivo para diretorio definitivo 
        echo "<br>Arquivo válido e enviado com sucesso.";
    } else {
        echo "<br>Erro no upload de arquivo!";
    }
}
?>

<form action="#" method="post"
    enctype="multipart/form-data">
    <input name="arquivo" type="file">
    <button>Enviar</button>
</form>

<style>
    input, button {
        font-size: 1.2rem;
    }
</style>