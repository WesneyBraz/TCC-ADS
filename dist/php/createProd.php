<?php

if($_POST){
   //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
   if(empty($_POST['nomeProduto']) || empty($_POST['categoria']) || empty($_POST['descricao']) || empty($_POST['estoque']) || empty($_POST['valorProduto'])){
      echo ("<script>
      $(document).ready(function(){ 
          Swal.fire({
              icon: 'error',
              text: 'Campo vazio!'
            })   
      });
      </script>");
  }

  else {
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conect.php';
    //----------------------------------FIM---------------------------------------------


    //ATRIBUIDO DADOS INSERIDOS NOS CAMPOS AS VARIAVEIS CORRESPONDENTES 
    $vnome_produto=$_POST["nomeProduto"];
    $vcategoria=$_POST["categoria"];
    $vdescricao=$_POST["descricao"];
    $vestoque=$_POST["estoque"];
    $vvalor=$_POST["valorProduto"];
    $vfornecedor=$_POST["nomeFornecedor"];



    //----------------------------------FIM---------------------------------------------

    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT NOME_PROD FROM TBL_PRODUTO WHERE NOME_PROD = '$vnome_produto'");

     $resultadoVerifica = mysqli_query ($conn, $verifica);

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Produto já cadastrado!'
              })   
        });
        </script>");

        return false;
     }
     //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_PRODUTO
     (NOME_PROD, CATEGORIA_PROD, DESCRICAO_PROD, ESTOQUE_PROD, VALOR_PROD,COD_FOR)
     VALUES
     (?, ?, ?, ?, ?, ?) ");

     $sql -> bind_param("sssdds", $vnome_produto, $vcategoria, $vdescricao, $vestoque, $vvalor, $vfornecedor );

     //----------------------- REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ----------------------


     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

     $sql -> execute() or exit("ErroBanco1");

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Produto cadastrado com sucesso!'

           })   
     });
     </script>");

     exit();
     //----------------------------------FIM---------------------------------------------
   }
   }
     ?>