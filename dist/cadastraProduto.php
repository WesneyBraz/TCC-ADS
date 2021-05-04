<!DOCTYPE html>
<html lang-"pt-br">

<head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <title>Formulario</title>

</head>

<body bgcolor="lightgreen">
<h3> <a href="produto.html">VOLTAR</a></h3>


<?php
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    //----------------------------------FIM---------------------------------------------


    //ATRIBUIDO DADOS INSERIDOS NOS CAMPOS AS VARIAVEIS CORRESPONDENTES 
    $vnome=$_POST["nome"];
    $vdescricao=$_POST["exampleFormControlTextarea1"];
    $vcategoria=$_POST["categoria"];
    $vdinheiro=$_POST["dinheiro"];
    $vestoque=$_POST["estoque"];


    //----------------------------------FIM---------------------------------------------

    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT NOME_PROD FROM TBL_PRODUTO WHERE NOME_PROD = '$vnome'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo "PRODUTO JA CADASTRADO <br/>";

        return false;
     }
     //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_PRODUTO
     (NOME_PROD, CATEGORIA_PROD, DESCRICAO_PROD, ESTOQUE_PROD, VALOR_PROD)
     VALUES
     (?, ?, ?, ?, ?) ");

     $sql -> bind_param("sssss", $vnome, $vcategoria, $vdescricao, $vdinheiro, $vestoque);

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ----------------------


     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

     $sql -> execute() or exit("ErroBanco1");


     echo "Sucesso no Cadastro <br/>";

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo "
        Nome: ".$vnome."<br/>
        Categoria: ".$vcategoria."<br/>
        Descrição: ".$vdescricao."<br/> 
        Valor: ".$vdinheiro."<br/>
        Estoque: ".$vestoque."<br/> 

        "; 

     exit();
     //----------------------------------FIM---------------------------------------------
     ?>

</body>

</html>