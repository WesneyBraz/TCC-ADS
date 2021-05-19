<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------

    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------

        $sql = $conn->prepare(" SELECT DATA_INICIO,DATA_FIM,DESCRICAO_DA_ATIVIDADE,DIAGNOSTICO,STATOS FROM TBL_ORDEM_DE_SERVICO ");
        
        $sql -> execute() or exit("ErroBanco2");

        $result = $sql -> get_result();

        if ($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc()){

                //NÃO ESQUECER O " >" NO FINAL DA TAG 
               
            echo '

               "<option>"'.$row['NOME_DEP'].'"</option>
               ';
               
                                

            }

        }

        $sql -> close();
        $conn -> close();

    // -----------------------------------FIM-------------------------------------------
?>