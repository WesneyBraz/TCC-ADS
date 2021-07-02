<?php

if ($_POST) {

  //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
  if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['cpf']) || empty($_POST['senha']) || empty($_POST['confirma_senha'])) {
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
  } else {
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conect.php';
    //----------------------------------FIM---------------------------------------------

    //ATRIBUIDO DADOS INSERIDOS NOS CAMPOS AS VARIAVEIS CORRESPONDENTES 
    $vnome = $_POST["nome"];
    $vcpf = $_POST["cpf"];
    $vmail = $_POST["email"];
    $vdepartamento = $_POST["nomeDepartamento"];
    $vcelular = $_POST["celular"];


    $vsenha1 = $_POST["senha"];
    $vsenha = md5($vsenha1);
    $vconfirma1 = $_POST["confirma_senha"];
    $vconfirma = md5($vconfirma1);
    //----------------------------------FIM---------------------------------------------

    //----------------- VERIFICANDO CNPJ -----------------------------------------------

    if (strlen($vcpf) != 14) {
      echo ("<script>
         Swal.fire({
           title: 'CPF não tem 11 dígitos!',
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

    //----------------- FIM -----------------

    //----------------- VERIFICANDO SENHAS -----------------

    if ($vsenha != $vconfirma) {
      echo ("<script>
        Swal.fire({
          title: 'Senhas divergem!',
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

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,10}$/m', $vsenha1)) {
      echo ("<script>
            Swal.fire({
              title: 'Senha não atende requisitos!',
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


    //----------------- FIM -----------------
    //---------------------VERIFICA SE O CAMPO JÁ FOI INSERIDO -------------------------
    //mysqli_query = consulta a base de dados 
    //mysqli_num_rows = efetua a contagem de array/registros obtidos
    $verifica = ("SELECT CPF_FUN FROM TBL_FUNCIONARIO WHERE CPF_FUN = '$vcpf'");

    $resultadoVerifica = mysqli_query($conn, $verifica);

    $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

    //-------------------CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 
    if ($erroResultadoVerifica > 0) {
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


    //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 

    $sql = $conn->prepare(" INSERT INTO TBL_FUNCIONARIO
     (CPF_FUN,NOME_FUN,EMAIL_FUN,SENHA_FUN,TELEFONE_MOVEL_FUN, COD_DEP)
     VALUES (?, ?, ?, ?, ?, ?) ");

    $sql->bind_param("ssssss", $vcpf, $vnome, $vmail, $vsenhaf1, $vcelular, $vdepartamento);

    //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ----------------------


    //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

    $sql->execute() or exit("ErroBanco1");

    $sql->close();
    $conn->close();
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
