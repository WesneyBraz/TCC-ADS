<?php
if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['dataEntrada']) || empty($_POST['descricaoOs']) || empty($_POST['diagnostico']) || empty($_POST['produto'])){
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
    $vinicio=$_POST["dataEntrada"];
    $vdescricao=$_POST["descricaoOs"];
    $vdiagnostico=$_POST["diagnostico"];
    $vproduto=$_POST["produto"];


    //----------------------------------FIM---------------------------------------------

    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT DIAGNOSTICO FROM TBL_ORDEM_DE_SERVICO WHERE DIAGNOSTICO = '$vdiagnostico'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     ///-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     { 
      echo ("<script>
      $(document).ready(function(){ 
          Swal.fire({
              icon: 'error',
              text: 'Ordem de serviço já cadastrado!'
            })   
      });
      </script>"); 
  

        return false;
    }
     //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_ORDEM_DE_SERVICO
     (DATA_INICIO, DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, PRODUTO)
     VALUES
     (?, ?, ?, ?) ");

     $sql -> bind_param("ssss", $vinicio, $vdescricao, $vdiagnostico, $vproduto);

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ----------------------


     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

     $sql -> execute() or exit("ErroBanco1");


     echo "Sucesso no Cadastro <br/>";

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Ordem de serviço cadastrada com sucesso!'
           })   
     });
     </script>"); 

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>