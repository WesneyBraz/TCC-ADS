<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
include_once 'conect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($_POST){

if(empty($_POST['email'])) {
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
    //Variável pegando o id do formulário
    $vmail=$_POST["email"];

    $verifica = ("SELECT EMAIL_FUN FROM TBL_FUNCIONARIO WHERE EMAIL_FUN = '{$vmail}'");

    $resultadoVerifica = mysqli_query ($conn, $verifica);

    $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

    //----------------- CASO JÁ EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ----------------- 

    if($erroResultadoVerifica == 0)
    {
        echo ("<script>
        Swal.fire({
            title: 'Email não cadastrado!',
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

    else { 

        $rash = md5(rand());
        $sql = $conn->prepare("INSERT INTO tbl_solicitacaofunc
        (email_sol, rash_sol)
        VALUES
        (?, ?)");

        $sql -> bind_param("ss", $vmail, $rash);

        $sql -> execute() or exit("ErroBanco ");
        
        //Habilita o modo debug, ou seja, vai conseguir logs de email
        $mail = new PHPMailer(true);

        try {
                //Habilitando modo Debug (opcional)
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                //Trabalhando com smtp
                $mail->isSMTP();
                //Classe host
                $mail->Host = 'smtp.gmail.com';
                //Modo SMTP ativo
                $mail->SMTPAuth = true;
                $mail->Username = $vmail;
                $mail->Password = '129801Mc';
                $mail->Port = 587; 

                //Email que vai aparecer como "De: "
                $mail->setFrom($vmail);
                //Email para onde vai ser enviado
                $mail->addAddress($vmail);

                $mail->isHTML(true);
                $mail->Subject = 'Recuperacao de Senha';
                $mail->Body = '
                <h3>Aqui está o link para você recuperar a sua senha:</h3>

                <p>Acesse o link: <a href="http://localhost/tcc-ads1/dist/alterarSenhaFunc.php">Alteração de senha</a></p>
            
                <h3>Se não foi você, desconsidere este email. Porém, alguém tentou alterar seus dados.</h3>
                <h3>Atenciosamente, DMW</h3>
                ';

                if ($mail->send()) {
                    echo ("<script>
                    Swal.fire({
                        title: 'Email enviado com sucesso!',
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
                
                else {
                    echo ("<script>
                    Swal.fire({
                        title: 'Email não enviado com sucesso!',
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

            } 

            catch (Exception $e) 
            {
                echo ("<script>
                Swal.fire({
                    title: 'Email não enviado com sucesso!',
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
        }
    }
}
?>