<?php

if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['nomeProduto']) || empty($_POST['nomeFornecedor']) || empty($_POST['descricao']) 
     || empty($_POST['categoria']) || empty($_POST['valorProduto']) || empty($_POST['estoque']) ){

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
    $vnome= addslashes($_POST["nomeProduto"]);
    $vfornecedor= addslashes ($_POST["nomeFornecedor"]);
    $vdescricao= addslashes ($_POST["descricao"]);
    $vcategoria= addslashes ($_POST["categoria"]);
    $vvalor1= addslashes ($_POST["valorProduto"]);
    $vestoque= addslashes ($_POST["estoque"]);
    $vid= addslashes ($_POST["id"]);
    $vvalor = floatval($vvalor1);

    //----------------------------------FIM---------------------------------------------

    //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" UPDATE TBL_PRODUTO SET
     NOME_PROD = '$vnome' , COD_FOR = '$vfornecedor', DESCRICAO_PROD = '$vdescricao',
     CATEGORIA_PROD = '$vcategoria', VALOR_PROD = '$vvalor',
     ESTOQUE_PROD = '$vestoque'
     WHERE COD_PROD = '$vid'");

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
             text: 'Produto alterado com sucesso!'
           })   
     });
     </script>"); 

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>