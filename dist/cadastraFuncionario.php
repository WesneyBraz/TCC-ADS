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
    $vnome=$_POST["nome"];
    $vcpf=$_POST["cpf"];
    //$vsobrenome=$_POST["sobrenome"];
    //$vtelefone=$_POST["telefone"];
    $vcelular=$_POST["celular"];
    //$vusuario=$_POST["usuario"]; 
    $vsenha1=$_POST["senha1"]; 
    $vsenha2=$_POST["senha2"]; 

    //-----------------------------VERIFICANDO SENHAS------------------------------------
    $vusuario=$vnome;

    if($vsenha1!=$vsenha2)
    {
     echo "SENHAS DIVERGENTES, FAVOR CORRIGIR <br/> 
      SENHA: ".$vsenha1."<br/>
      CONFIRMAÇÃO: ".$vsenha2."<br/>

      ";

      return false;
   }

    //----------------------------------FIM---------------------------------------------

    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT CPF_FUN FROM TBL_FUNCIONARIO WHERE CPF_FUN = '$vcpf'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo "FUNCIONARIO JA CADASTRADO <br/>";

        return false;
     }
     //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_FUNCIONARIO
     (CPF_FUN,NOME_FUN,USUARIO_FUN,SENHA_FUN,TELEFONE_MOVEL_FUN)
     VALUES
     (?, ?, ?, ?, ?) ");

     $sql -> bind_param("sssss", $vcpf,$vnome,$vusuario,$vsenha1,$vcelular);

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
        CPF: ".$vcpf."<br/>
        Usuario: ".$vusuario."<br/> 
        Senha: ".$vsenha1."<br/>
        Celular: ".$vcelular."<br/>

        "; 

     exit();
     //----------------------------------FIM---------------------------------------------
     ?>

</body>

</html>