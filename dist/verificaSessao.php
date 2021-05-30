<?php
//Se a sessão de usuário não existir e tentar entrar na página direto é bloqueado
session_start();
if(!$_SESSION['email']) {
	header('Location: loginFuncionario.php');
	exit();
}
?>