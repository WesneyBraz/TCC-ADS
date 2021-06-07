<?php
//Inicio na sessão
session_start();
include('conexao.php');

//Verifica se não é sql injection
$Email = mysqli_real_escape_string($conn, $_POST['email']);
$Senha = mysqli_real_escape_string($conn, $_POST['senha']);
//$vsenha = md5($Senha);


//Verifica se tem cadastro no banco de dados
$Query = "SELECT COD_EMP, USUARIO_EMP FROM TBL_EMPRESA WHERE USUARIO_EMP = '{$Email}' AND SENHA_EMP = '{$Senha}'";

$result = mysqli_query($conn, $Query);

//Quantidade de linhas
$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['email'] = $Email;
    header('Location: cadastroCliente.php');
    exit();
}
else {
    header('Location: loginEmpresa.php');
    exit();
}
?>