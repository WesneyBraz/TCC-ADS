<?php

if($_POST){

   //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
   if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['mail']) || empty($_POST['nomeDepartamento'])){
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
    $vcpf= addslashes ($_POST["cpf"]);
    $vmail= addslashes ($_POST["mail"]);
    $vdepartamento= addslashes ($_POST["nomeDepartamento"]);
    $vcelular= addslashes ($_POST["celular"]);
    $vid= addslashes ($_POST["id"]);


    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
     $verifica = ("SELECT CPF_FUN FROM TBL_FUNCIONARIO WHERE CPF_FUN = '$vcpf'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Funcionario já cadastrado!'
              })   
        });
        </script>");

        return false;
     }
     //----------------------------------FIM---------------------------------------------


     //-----------------------REALIZA A ALTERAÇÃO DOS DADOS NO BANCO TBL_FUNCIONARIO ---------------------- 

     $sql = $conn->prepare(" UPDATE TBL_FUNCIONARIO SET CPF_FUN = '$vcpf', NOME_FUN = '$vnome', EMAIL_FUN = '$vmail',
     TELEFONE_MOVEL_FUN = '$vcelular', COD_DEP = '$vdepartamento' WHERE COD_FUN = '$vid' ");

     //-----------------------REALIZA A ALTERAÇÃO DOS DADOS NO BANCO TBL_FUNCIONARIO ---------------------- 

     $sql -> execute() or exit("ErroBanco1");

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Alterado com sucesso!'
           })   
     });
     </script>");

     exit();
     //----------------------------------FIM---------------------------------------------
   }
}
?>