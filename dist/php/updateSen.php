<?php

if($_POST){
if(empty($_POST['email']) || empty($_POST['senha'])) {
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

    $verifica = ("SELECT RASH_SOL FROM TBL_SOLICITACAO WHERE EMAIL_SOL = '$vmail' AND STATS_SOL = 0");

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
            $sql = $conn->prepare("UPDATE TBL_EMPRESA SET SENHA_EMP = '$vsenha' WHERE EMAIL_EMP = '$vmail'");

            $sql = $conn->prepare("DELETE FROM TBL_SOLICITACAO WHERE EMAIL_SOL = ?");
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