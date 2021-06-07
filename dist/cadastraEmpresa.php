<?php
if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['nome']) || empty($_POST['cnpj']) || empty($_POST['email']) || empty($_POST['telefone']) 
    || empty($_POST['celular']) || empty($_POST['cep']) || empty($_POST['rua']) || empty($_POST['cidade']) 
    || empty($_POST['numero']) || empty($_POST['bairro']) || empty($_POST['uf']) || empty($_POST['pais']) )
    {
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
    $vnome_fantasia=$_POST["nome"];
    $vcnpj=$_POST["cnpj"];

    $vmail=$_POST["email"];
    $vtelefone=$_POST["telefone"];
    $vcelular=$_POST["celular"];

    $vcep=$_POST["cep"];
    $vlougradouro=$_POST["rua"];
    $vcomplemento=$_POST["complemento"];
    $vnumero=$_POST["numero"];
    $vbairro=$_POST["bairro"];
    $vcidade=$_POST["cidade"];
    $vestado=$_POST["uf"];
    $vpais=$_POST["pais"];
    
    $vsenha1=$_POST["senha"];
    $vsenha = md5($vsenha1);
    $vconfirma1=$_POST["confirma_senha"];
    $vconfirma = md5($vconfirma1);



    $vusuario=$vmail;
    $vcat=$vcnpj;

    //-----------------------------VERIFICANDO SENHAS------------------------------------
    

    if($vsenha!=$vconfirma)
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
     $verifica = ("SELECT CNPJ_EMP FROM TBL_EMPRESA WHERE CNPJ_EMP = '$vcnpj'");

     $resultadoVerifica = mysqli_query ($conn, $verifica );

     $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

     //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
     if($erroResultadoVerifica > 0)
     {
        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Empresa já cadastrada!'
              })   
        });
        </script>");
        return false;
     }
     //----------------------------------FIM---------------------------------------------


     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CATEGORIA---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_CATEGORIA
     (COD_CAT, NOME_CAT)
     VALUES
     (?, ?) ");

     $sql -> bind_param("ss", $vcat,$vnome_fantasia );

     $sql -> execute() or exit("ErroBanco 01 ");


     
     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_FORNECEDOR ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_EMPRESA
     (NOME_FANTASIA_EMP, CNPJ_EMP, USUARIO_EMP, SENHA_EMP, COD_CAT)
     VALUES
     (?, ?, ?, ?, ?) ");

     $sql -> bind_param("sssss", $vnome_fantasia, $vcnpj, $vusuario, $vsenha, $vcat);

     $sql -> execute() or exit("ErroBanco 11 ");

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_CONTATO
     (TELEFONE_MOVEL, TELEFONE_FIXO, EMAIL, COD_CAT)
     VALUES
     (?, ?, ?, ?) ");

     $sql -> bind_param("ssss", $vcelular, $vtelefone,  $vmail , $vcat);

     $sql -> execute() or exit("ErroBanco 21 ");


     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_ENDEREÇO ---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_ENDERECO
     (LOUGRADOURO, NUMERO, CEP, PAIS, ESTADO, CIDADE, BAIRRO, COMPLEMENTO, COD_CAT)
     VALUES
     (?, ?, ?, ?, ?, ?, ?, ?, ?) ");

     $sql -> bind_param("sssssssss", $vlougradouro, $vnumero, $vcep, $vpais, $vestado, $vcidade, $vbairro, $vcomplemento, $vcat );

     $sql -> execute() or exit("ErroBanco 31 ");


     
     $sql -> close();
     $conn -> close();

     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------

     
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Empresa cadastrada com sucesso!'
           })   
     });
     </script>");
     

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>