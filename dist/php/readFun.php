<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conect.php';
    // -----------------------------------FIM-------------------------------------------

    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------

        $sql = $conn->prepare(" SELECT COD_FUN, NOME_FUN FROM TBL_FUNCIONARIO ");
        
        $sql -> execute() or exit("ErroBanco2");

        $result = $sql -> get_result();

        if ($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc()){
               
                echo '<option value="' . $row['COD_FUN']. '">'.$row['NOME_FUN'].'</option> ';
            }

        }

    // -----------------------------------FIM-------------------------------------------
?>