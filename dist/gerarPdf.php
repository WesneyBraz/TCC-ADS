<!DOCTYPE html>
<html lang-"pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMA DE OS </title>
    <style>
    h2 { text-align: center }
    body { font-family: 'Times New Roman', Times, serif;
    font-style: normal;}
    textarea {font-family: 'Times New Roman', Times, serif;
    font-style: normal;}
    </style>
</head>
<?php
include('verificaSessao.php');
require 'conexao.php';
$id=addslashes($_GET['COD_SER']);

$verifica = ("SELECT CUSTO, LUCRO, TIPO, NS, DATA_INICIO, DATA_FIM, 
DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, STATOS, PRODUTO, NOME_FUN , COD_SER, NOME_CLI, CPF_CLI  
FROM TBL_ORDEM_DE_SERVICO OS
INNER JOIN TBL_CLIENTE CL ON CL.COD_CLI = OS.COD_CLI 
INNER JOIN TBL_FUNCIONARIO FU ON FU.COD_FUN = OS.COD_FUN
WHERE COD_SER = '$id'");

$resultadoVerifica = mysqli_query ($conn, $verifica );

$retorno = mysqli_fetch_assoc($resultadoVerifica);


?>

<body>
<h2>ORDEM DE SERVIÇO Nº <?php  echo' '.$retorno['COD_SER'].' ';?></h2>

<p>CLIENTE:</p>
<textarea>
    <a>Nome:<?php  echo' '.$retorno['NOME_CLI'].''?> -- CPF: <?php echo''.$retorno['CPF_CLI'].'';?></a>
</textarea>

<p>TIPO DE MANUTENÇÃO:</p>
<textarea>
    <a><?php  echo' '.$retorno['TIPO'].' ';?> </a>
</textarea>

<p>DESCRIÇÃO:</p>
<textarea cols="80" rows="20">
    <a><?php  echo' '.$retorno['DESCRICAO_DA_ATIVIDADE'].' ';?></a>
</textarea>

<p>DIAGNOSTICO:</p>
<textarea>
    <a><?php  echo' '.$retorno['DIAGNOSTICO'].' ';?></a>
</textarea>

<p>STATUS:</p>
<textarea>
    <a><?php  echo' '.$retorno['STATOS'].' ';?></a>
</textarea>

<p>DATA</p>
<textarea>
    <a>Entrada:<?php  echo' '.$retorno['DATA_INICIO'].''?> // Saída:<?php echo' '.$retorno['DATA_FIM'].'';?></a>
</textarea>

<p>VALOR:</p>
<textarea>
    <a>R$<?php  echo' '.$retorno['CUSTO'].' ';?></a>
</textarea>

<p>TÉCNICO:<?php  echo' '.$retorno['NOME_FUN'].' ';?></p>
<br>
Ass:
</body>
</html>
