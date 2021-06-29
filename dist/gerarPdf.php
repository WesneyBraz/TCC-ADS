<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMA DE OS </title>
</head>

<body>
<h1>GERAR OS</h1>
<br>
<h4>teste</h4>
<?php
include('verificaSessao.php');
require 'conexao.php';
$id=addslashes($_GET['COD_SER']);
echo' OS - Nº: '.$id;
?>

</body>

</html>