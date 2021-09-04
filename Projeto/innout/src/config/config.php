<?php

// Configuração de data e linguagem
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');

// Definindo Constantes

// Constantes gerais
define('DAILY_TIME', 60 * 60 * 8);

// Pastas
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

// Carregando Arquivos
// Arquivos config
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(dirname(__FILE__) . '/date_utils.php'));
require_once(realpath(dirname(__FILE__) . '/utils.php'));

// Arquivos Models
require_once(realpath(MODEL_PATH . '/Model.php'));
require_once(realpath(MODEL_PATH . '/User.php'));
require_once(realpath(MODEL_PATH . '/WorkingHours.php'));

// Arquivos de Exception personalizada
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));