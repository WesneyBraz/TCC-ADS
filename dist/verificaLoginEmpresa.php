<?php
//Inicio na sessão
session_start();
include('conexao.php');

//Verifica se não é sql injection
$Email = mysqli_real_escape_string($conn, $_POST['email']);
$Senha1 = mysqli_real_escape_string($conn, $_POST['senha']);
$Senha = md5($Senha1);


//Verifica se tem cadastro no banco de dados
$Query = "SELECT COD_EMP, EMAIL_EMP FROM TBL_EMPRESA WHERE EMAIL_EMP = '{$Email}' AND SENHA_EMP = '{$Senha}'";

$result = mysqli_query($conn, $Query);

//Quantidade de linhas
$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['email'] = $Email;
    header('Location: cadastroFuncionario.php');
    exit();
}
else {
    header('Location: loginEmpresa.php');
    exit();
}
?>