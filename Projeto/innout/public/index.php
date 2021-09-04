<?php

// dirname, segundo parametro 2 acessa um diretorio anterior - INNOUT/
// Carregando arquivo de configuração
require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) // parse_url com PHP_URL_PATH - URL sem querystrings
);

if($uri === '/' || $uri === '' ||  $uri === '/index.php') {
    $uri = '/day_records.php'; // Pagina inicial
}

// Acessando a controller de acordo com a URI
require_once(CONTROLLER_PATH . "/{$uri}");

// .htaccess - Configuraçãos do apache
// No caso ele esta forçando que todas as requisições passem antes pelo arquivo index.php
// Por que caso seja feita alguma requisição direto para uma controller, não sera possivel,
// pois ela não esta dentro da pasta public
// Caso não esteja usando o apache, devera ser usado um arquivo de configuração diferente