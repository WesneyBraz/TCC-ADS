<?php

if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['nome']) ){

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
    $vnome= addslashes($_POST["nome"]);
    $vid= addslashes($_POST["id"]);

    //----------------------------------FIM---------------------------------------------

    //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" UPDATE TBL_DEPARTAMENTO SET
     NOME_DEP = '$vnome'
     WHERE COD_DEP = '$vid'");

     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

     $sql -> execute() or exit("Erro Banco 1 UPDATE");

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Departamento alterado com sucesso!'
           })   
     });
     </script>"); 

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>