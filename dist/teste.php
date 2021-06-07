<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------
    if($_POST){
    $vcpf=$_POST["cpf"];

    //VERIFICA SE O CAMPO EXISTE
    $verifica = ("SELECT CPF_CLI FROM TBL_CLIENTE WHERE CPF_CLI = '$vcpf'");

    $resultadoVerifica = mysqli_query ($conn, $verifica );

    $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);
    //VERIFICA SE O CAMPO EXISTE




    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------

        $sql = $conn->prepare(" SELECT CPF_CLI, NOME_CLI, DATA_INICIO, DATA_FIM, DIAGNOSTICO, STATOS
        FROM TBL_ORDEM_DE_SERVICO OS
        INNER JOIN TBL_CLIENTE CL ON CL.COD_CLI = OS.COD_CLI
        WHERE CPF_CLI = '$vcpf' ");
        
        $sql -> execute() or exit("ErroBanco2");

        $result = $sql -> get_result();

        if ($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc()){

                //NÃO ESQUECER O " >" NO FINAL DA TAG 
               
            echo '
            <br>
            <tr>
                <td title="'.$row['CPF_CLI'].'">'.$row['CPF_CLI'].'</td>
                <td title="'.$row['NOME_CLI'].'">'.$row['NOME_CLI'].'</td>           
                <td title="'.$row['DATA_INICIO'].'">'.$row['DATA_INICIO'].'</td>
                <td title="'.$row['DATA_FIM'].'">'.$row['DATA_FIM'].'</td>
                <td title="'.$row['DIAGNOSTICO'].'">'.$row['DIAGNOSTICO'].'</td>        
                <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td>             
            </tr>
               ';
               
                                

            }

        }
        else
        {
            echo'
            Eeste CPF:'.$vcpf.' não tem OS cadastrada 
            ';
        }

        $sql -> close();
        $conn -> close();

      }  // -----------------------------------FIM-------------------------------------------
?>