<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMA DE OS </title>
</head>

<body>
<h2>GERAR OS</h2>
<br>
<h4>Relatorio</h4>
<?php
include('verificaSessao.php');
require 'conexao.php';
$id=addslashes($_GET['COD_SER']);

$verifica = ("SELECT CUSTO, LUCRO, DATA_INICIO, DATA_FIM, 
DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, STATOS, PRODUTO, COD_FUN, 
COD_CLI, COD_SER  FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = '$id'");

$resultadoVerifica = mysqli_query ($conn, $verifica );

$retorno = mysqli_fetch_assoc($resultadoVerifica);

echo' OS - Nº: '.$retorno['COD_SER'].'
<br>
 DESCRIÇÃO: '.$retorno['DESCRICAO_DA_ATIVIDADE'].'
<br>
DIAGNOSTICO: '.$retorno['DIAGNOSTICO'].'
<br>
STATUS: '.$retorno['STATOS'].'
<br>
ENTRADA: '.$retorno['DATA_INICIO'].'
<br>
SAÍDA: '.$retorno['DATA_FIM'].'
<br>
';
?>

</body>

</html>