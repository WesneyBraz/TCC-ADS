<?php

if($_POST){

   //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
   if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['senha']) || empty($_POST['mail'])){
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
    $vnome=$_POST["nome"];
    $vcpf=$_POST["cpf"];
    $vmail=$_POST["mail"];
    $vdepartamento=$_POST["nomeDepartamento"];
    $vcelular=$_POST["celular"];
    $vsenha1=$_POST["senha"]; 
    $vsenhaf1 = md5($vsenha1);
    $vsenha2=$_POST["senha2"]; 
    $vsenhaf2 = md5($vsenha2);

    //-----------------------------VERIFICANDO SENHAS------------------------------------
    

    if($vsenhaf1!=$vsenhaf2)
    {
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'error',
             text: 'Senhas divergem!'
           })   
     });
     </script>");

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
        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Usuário já cadastrado!'
              })   
        });
        </script>");

        return false;
     }
     //----------------------------------FIM---------------------------------------------
     //
     //$verifica = ("SELECT COD_DEP FROM TBL_DEPARTAMENTO WHERE NOME_DEP = '$vdepartamento'");

     //$resultadoVerifica = mysqli_query ($conn, $verifica );

     //$erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);


     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_FUNCIONARIO
     (CPF_FUN,NOME_FUN,EMAIL_FUN,SENHA_FUN,TELEFONE_MOVEL_FUN, COD_DEP)
     VALUES (?, ?, ?, ?, ?, ?) ");

     $sql -> bind_param("ssssss", $vcpf,$vnome,$vmail,$vsenhaf1,$vcelular,$vdepartamento);

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
             text: 'Cadastrado com sucesso!'
           })   
     });
     </script>");

     exit();
     //----------------------------------FIM---------------------------------------------
   }
}
?>