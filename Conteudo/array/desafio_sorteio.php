<div class="titulo">Desafio Sorteio</div>

<?php
$nomes = ["Elza", "Rapunzel", "Branca de neve", "Cinderela"];
$index = array_rand($nomes); // Retorna indice aleatorio do array
echo "<div center><h1>{$nomes[$index]}</h1></div>"

?>

<style>
    [center] {
        display: flex;
        justify-content: center;
    }
</style>