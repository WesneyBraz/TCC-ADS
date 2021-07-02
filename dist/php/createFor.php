<?php
if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['nome']) || empty($_POST['cnpj']) || empty($_POST['email']) || empty($_POST['telefone']) 
    || empty($_POST['celular']) || empty($_POST['cep']) || empty($_POST['rua']) || empty($_POST['cidade']) 
    || empty($_POST['numero']) || empty($_POST['bairro']) || empty($_POST['uf']) || empty($_POST['pais']) )
    {
        echo ("<script>
        Swal.fire({
          title: 'Preencha os campos vazios!',
          icon: 'error',
          showClass: {
              popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
          }
        })
        </script>");
    }

    else {
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conect.php';
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

    //$vcat=$vcnpj;

    //----------------------------------FIM---------------------------------------------
    
    //----------------- VERIFICANDO CNPJ -----------------

    if (strlen($vcnpj)!=18) 
        {
            echo ("<script>
            Swal.fire({
              title: 'CNPJ não tem 14 dígitos!',
              icon: 'error',
              showClass: {
                  popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                  popup: 'animate__animated animate__fadeOutUp'
              }
            })
            </script>");  

            return false;
        }

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


     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CATEGORIA---------------------- 
     
     $sql = $conn->prepare(" INSERT INTO TBL_CATEGORIA
     (NOME_CAT, NUMERO_CAT, ID)
     VALUES
     (?, ?, ?) ");

     $sql -> bind_param("sss", $vnome_fantasia, $vcnpj, $vcnpj );

     $sql -> execute() or exit("ErroBanco ");

     $verifica = ("SELECT COD_CAT FROM TBL_CATEGORIA WHERE NUMERO_CAT = '$vcnpj'");
     $resultadoVerifica = mysqli_query ($conn, $verifica );
     $vcat1 = mysqli_fetch_assoc($resultadoVerifica);
     $vcat=$vcat1['COD_CAT'];


     
     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_FORNECEDOR ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_FORNECEDOR
     (NOME_FANTASIA_FOR, CNPJ_FOR, COD_CAT)
     VALUES
     (?, ?, ?) ");


     $sql -> bind_param("sss", $vnome_fantasia, $vcnpj, $vcat);

     $sql -> execute() or exit("ErroBanco 10 ");

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_CONTATO
     (TELEFONE_MOVEL, TELEFONE_FIXO, EMAIL, COD_CAT)
     VALUES
     (?, ?, ?, ?) ");

     $sql -> bind_param("ssss", $vcelular, $vtelefone,  $vmail , $vcat);

     $sql -> execute() or exit("ErroBanco 20 ");


    //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_ENDEREÇO ---------------------- 

     $sql = $conn->prepare(" INSERT INTO TBL_ENDERECO
     (LOUGRADOURO, NUMERO, CEP, PAIS, ESTADO, CIDADE, BAIRRO, COMPLEMENTO, COD_CAT)
     VALUES
     (?, ?, ?, ?, ?, ?, ?, ?, ?) ");

     $sql -> bind_param("sssssssss", $vlougradouro, $vnumero, $vcep, $vpais, $vestado, $vcidade, $vbairro, $vcomplemento, $vcat );

     $sql -> execute() or exit("ErroBanco 30 ");



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
