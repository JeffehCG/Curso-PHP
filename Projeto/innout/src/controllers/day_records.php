<?php

// Validando sessão do usuario, para acessar essa controller
session_start();
requireValidSession();

$date = (new Datetime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);
loadTemplateView('day_records', ['today' => $today]);