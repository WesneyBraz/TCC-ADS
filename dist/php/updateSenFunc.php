<?php

if($_POST){
if(empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['confSenha'])) {
    echo ("<script>
    Swal.fire({
        title: 'Campo vazio!',
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
    include_once 'conect.php';

    $vmail=$_POST["email"];
    $vsenha=$_POST["senha"]; 
    $vrashsenha = md5($vsenha);
    $vconfsenha=$_POST["confSenha"]; 
    $vrashconfsenha = md5($vconfsenha);

    if($vrashsenha!=$vrashconfsenha)
    {
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

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,10}$/m', $vsenha)) 
    {
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

    $verifica = ("SELECT RASH_SOL FROM TBL_SOLICITACAOFUNC WHERE EMAIL_SOL = '$vmail' AND STATS_SOL = 0");

    $resultadoVerifica = mysqli_query ($conn, $verifica);

    $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

    if($erroResultadoVerifica == 0)
        {
            echo ("<script>
                Swal.fire({
                    title: 'Não encontramos sua solicitação!',
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

    else 
        {
            $sql = $conn->prepare("UPDATE TBL_FUNCIONARIO SET SENHA_FUN = '$vrashsenha' WHERE EMAIL_FUN = '$vmail'");

            $sql = $conn->prepare("DELETE FROM TBL_SOLICITACAOFUNC WHERE EMAIL_SOL = ?");
            $sql->bind_param("s", $vmail);
            $sql -> execute()  or exit("Erro Banco delete");

            echo ("<script>
                Swal.fire({
                    title: 'Alterado com sucesso!',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
                </script>");
        }
    }
}

?>