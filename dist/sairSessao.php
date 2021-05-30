<?php
session_start();
//Destruindo uma só sessão: unset($_SESSION['NOMEDASESSAO']);
session_destroy();
header('Location: index.html');
exit();
?>