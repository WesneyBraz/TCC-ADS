<?php
include('verificaSessao2.php');
require 'conexao.php';
if(isset($_GET['COD_CLI']))
{
    $id=addslashes($_GET['COD_CLI']);

    $sql = $conn->prepare("DELETE FROM TBL_CLIENTE WHERE COD_CLI = ?");
    $sql->bind_param("s",$id);
    $sql -> execute()  or exit("Erro Banco delete1");
    header("location: consultar.php");
}

if(isset($_GET['COD_DEP']))
{
    $id=addslashes($_GET['COD_DEP']);

    $sql = $conn->prepare("DELETE FROM TBL_DEPARTAMENTO WHERE COD_DEP = ?");
    $sql->bind_param("s",$id);
    $sql -> execute()  or exit("Erro Banco delete2");
    header("location: consultar.php");
}

if(isset($_GET['COD_FUN']))
{
    $id=addslashes($_GET['COD_FUN']);

    $sql = $conn->prepare("DELETE FROM TBL_FUNCIONARIO WHERE COD_FUN = ?");
    $sql->bind_param("s",$id);
    $sql -> execute()  or exit("Erro Banco delete3");
    header("location: consultar.php");
}

if(isset($_GET['COD_PROD']))
{
    $id=addslashes($_GET['COD_PROD']);

    $sql = $conn->prepare("DELETE FROM TBL_PRODUTO WHERE COD_PROD = ?");
    $sql->bind_param("s",$id);
    $sql -> execute()  or exit("Erro Banco delete4");
    header("location: consultar.php");
}

if(isset($_GET['COD_FOR']))
{
    $id=addslashes($_GET['COD_FOR']);

    $sql = $conn->prepare("DELETE FROM TBL_FORNECEDOR WHERE COD_FOR = ?");
    $sql->bind_param("s",$id);
    $sql -> execute()  or exit("Erro Banco delete5");
    header("location: consultar.php");
}

if(isset($_GET['COD_SER']))
{
    $id=addslashes($_GET['COD_SER']);

    $sql = $conn->prepare("DELETE FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = ?");
    $sql->bind_param("s",$id);
    $sql -> execute()  or exit("Erro Banco delete6");
    header("location: consultar.php");
}


?>
