<?php
session_start();
session_destroy();

// Limpando Coockie
unset($_COOKIE['usuario']);
setcookie('usuario', '');
header('Location: login.php');