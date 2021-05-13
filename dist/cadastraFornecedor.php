<?php
if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['nome']) || empty($_POST['cnpj'])){
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
    include_once 'conexao.php';
    //----------------------------------FIM---------------------------------------------


    //ATRIBUIDO DADOS INSERIDOS NOS CAMPOS AS VARIAVEIS CORRESPONDENTES 
    //FALTA AJUSTAR COM OS INPUTS DO FORM
    
    $vnome_fantasia=$_POST["nome"];
    $vcnpj=$_POST["cnpj"];
    //$vdata=$_POST["nome"];
    //$vdiagnostico=$_POST["email"];
    //$vdescricao=$_POST["cnpj"];
    //$vstatus=$_POST["telefone"];
    //$vcelular=$_POST["celular"];
    //$vcep=$_POST["cep"];
    //$vrua=$_POST["rua"];
    //$vcomplemento=$_POST["complemento"];
    //$vnumero=$_POST["numero"];
    //$vbairro=$_POST["bairro"];
    //$vcidade=$_POST["cidade"];
    //$vestado=$_POST["estado"];
    //$vpais=$_POST["pais"];

    //----------------------------------FIM---------------------------------------------

    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT CNPJ_FOR FROM TBL_FORNECEDOR WHERE CNPJ_FOR = '$vcnpj'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Fornecedor já cadastrado!'
              })   
        });
        </script>");
 
        return false;
     }
     //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_FORNECEDOR
     (NOME_FANTASIA_FOR, CNPJ_FOR)
     VALUES
     (?, ?) ");


     $sql -> bind_param("ss", $vnome_fantasia, $vcnpj);

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ---------------------- 



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
             text: 'Fornecedor cadastrado com sucesso!'
           })   
     });
     </script>");

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>