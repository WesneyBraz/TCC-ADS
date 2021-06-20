<?php
require 'conexao.php';

$verifica = ("SELECT CUSTO, LUCRO, DATA_INICIO, DATA_FIM, 
DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, STATOS, PRODUTO, COD_FUN, 
COD_CLI FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = '$row'");
//COD_CLI FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = '$vid'");


$resultadoVerifica = mysqli_query ($conn, $verifica );

$retorno = mysqli_fetch_assoc($resultadoVerifica);


?>
 