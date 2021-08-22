<div class="titulo">Datas #01</div>

<?php
echo time() . '<br>'; // Retorna Qt segundos deis de 01/01/1970
echo date('D, d \d\e M \d\e Y H:i A') . '<br>'; // Retornando a data formatada

echo strftime('%A, %d de %B de %Y', time()) . '<br>'; // Convertendo time em data formatada
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8'); // Definindo a data para PT_BR
echo strftime('%A, %d de %B de %Y', time()) . '<br>';

// Definindo e imprimindo a data de amanha
$amanha = time() + (24 * 60 * 60);
echo strftime('%A, %d de %B de %Y', $amanha) . '<br>';

// Pegando a data de hoje mais 10 anos
$proximaSemana = strtotime('+10 year');
$proximaSemana = strtotime('+1 week');
echo strftime('%A, %d de %B de %Y', $proximaSemana) . '<br>';

// Pegando data especifica
$dataFixa = mktime(15, 30, 50, 1, 25, 1975);
echo strftime('%A, %d de %B de %Y - %H:%M:%S', $dataFixa);