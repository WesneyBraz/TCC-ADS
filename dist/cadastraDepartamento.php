<!DOCTYPE html>
<html lang-"pt-br">

<head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <title>Formulario</title>

</head>

<body bgcolor="lightgreen">
<h3> <a href="cadastroFuncionario.html">VOLTAR</a></h3>


<?php
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    //----------------------------------FIM---------------------------------------------


    //ATRIBUIDO DADOS INSERIDOS NOS CAMPOS AS VARIAVEIS CORRESPONDENTES 
    $vnome=$_POST["nomeDepartamento"];


    //----------------------------------FIM---------------------------------------------

    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT NOME_DEP FROM TBL_DEPARTAMENTO WHERE NOME_DEP = '$vnome'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo "DEPARTAMENTO JA CADASTRADO <br/>";

        return false;
     }
     //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_DEPARTAMENTO
     (NOME_DEP)
     VALUES
     (?) ");

     $sql -> bind_param("s", $vnome);

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ----------------------


     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

     $sql -> execute() or exit("ErroBanco1");


     echo "Sucesso no Cadastro <br/>";

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo "
        Nome: ".$vnome."<br/> "; 

     exit();
     //----------------------------------FIM---------------------------------------------
     ?>

</body>

</html>