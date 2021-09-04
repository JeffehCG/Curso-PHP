<?php
session_start();
session_destroy(); // Destruindo a sessão e voltando pra login
header('Location: login.php');