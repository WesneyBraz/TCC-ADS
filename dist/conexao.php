<?php

//--------------------REALIZA A COMUNICAÇÃO COM MINHA BASE DE DADOS LOCAL ----------------
//mysqli_connect = efetua a conexão com a base de dados
//mysqli_query = efetua uma consulta a base de dados
$servidor = "localhost:3307";
$usuario = "root";
$senha = "root";
$dbname = "BD_TCC";


$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);

$sql = "SET NAMES 'utf8'";
mysqli_query($conn, $sql);
$sql = "SET character_set_connection=utf8";
mysqli_query($conn, $sql);
$sql = "SET character_set_client=utf8";
mysqli_query($conn, $sql);
$sql = "SET character_set_results=utf8";
mysqli_query($conn, $sql);

// ------------- CASO APRESENTE ALGUM ERRO NA CONEXÃO RETORNA A MENSSAGEM ABAIXO -------------
//mysqli_connect_error = retorna se houve erro 

if (mysqli_connect_error()){
    echo ("Erro na conexão:" . mysqli_connect_error());
    exit();
}
// ---------------------------------------- FIM -------------------------------------------------

?>