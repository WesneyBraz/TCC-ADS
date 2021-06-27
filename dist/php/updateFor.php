<?php

if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['nome']) || empty($_POST['cnpj']) || empty($_POST['email']) || empty($_POST['bairro'])
     || empty($_POST['celular']) || empty($_POST['telefone']) || empty($_POST['cep']) || empty($_POST['cidade'])
     || empty($_POST['rua']) || empty($_POST['complemento']) || empty($_POST['numero']) || empty($_POST['uf']) 
     || empty($_POST['pais']) ){

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
    $vnome= addslashes ($_POST["nome"]);
    $vcnpj= addslashes ($_POST["cnpj"]);

    $vmail= addslashes ($_POST["email"]); 
    $vtelefone= addslashes ($_POST["telefone"]);
    $vcelular= addslashes ($_POST["celular"]);
    
    $vcep= addslashes ($_POST["cep"]);
    $vrua= addslashes ($_POST["rua"]);
    $vcomplemento= addslashes ($_POST["complemento"]);
    $vnumero= addslashes ($_POST["numero"]);
    $vbairro= addslashes ($_POST["bairro"]);
    $vcidade= addslashes ($_POST["cidade"]);
    $vestado= addslashes ($_POST["uf"]);
    $vpais= addslashes ($_POST["pais"]);

    $vid= addslashes($_POST["id"]);
    $vfor= addslashes($_POST["for"]);
    $vend= addslashes($_POST["end"]);
    $vcon= addslashes($_POST["con"]);



    //$vcat=$vcpf;

    //----------------------------------FIM---------------------------------------------

    //-----------------------REALIZA A ALTERÇÃO NO CADASTRO DOS DADOS NO BANCO TBL_CATEGORIA ---------------------- 
    $sql = $conn->prepare(" UPDATE TBL_CATEGORIA SET
    NOME_CAT = '$vnome', NUMERO_CAT = '$vcnpj'
    WHERE ID = '$vid'");

    $sql -> execute() or exit("Erro Banco1");

    //-----------------------REALIZA A ALTERÇÃO NO CADASTRO DOS DADOS NO BANCO TBL_FORNECEDOR ---------------------- 
    $sql = $conn->prepare(" UPDATE TBL_FORNECEDOR SET
    CNPJ_FOR = '$vcnpj' , NOME_FANTASIA_FOR = '$vnome'
    WHERE COD_FOR = '$vfor'");

    $sql -> execute() or exit("Erro Banco2");

    //-----------------------REALIZA A ALTERÇÃO NO CADASTRO DOS DADOS NO BANCO TBL_CONTATO ---------------------- 
    $sql = $conn->prepare(" UPDATE TBL_CONTATO SET
    EMAIL = '$vmail' , TELEFONE_FIXO = '$vtelefone', TELEFONE_MOVEL = '$vcelular' 
    WHERE COD_CON = '$vcon'");

    $sql -> execute() or exit("Erro Banco3");

    //-----------------------REALIZA A ALTERÇÃO NO CADASTRO DOS DADOS NO BANCO TBL_ENDERECO ---------------------- 
    $sql = $conn->prepare(" UPDATE TBL_ENDERECO SET
    CEP = '$vcep', LOUGRADOURO = '$vrua', NUMERO = '$vnumero', PAIS = '$vpais', ESTADO = '$vestado', 
    CIDADE = '$vcidade', BAIRRO = '$vbairro', COMPLEMENTO = '$vcomplemento'
    WHERE COD_END = '$vend'");

    $sql -> execute() or exit("Erro Banco4");

    $sql -> close();
    $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Cliente alterado com sucesso!'
           })   
     });
     </script>"); 

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>