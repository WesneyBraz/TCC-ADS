<?php
include('verificaSessao2.php');
require 'conexao.php';
$id=addslashes($_GET['COD_SER']);

$sql = $conn->prepare("DELETE FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = ?");
$sql->bind_param("s",$id);
$sql -> execute()  or exit("Erro Banco delete");
header("location: consultar.php");
?>
