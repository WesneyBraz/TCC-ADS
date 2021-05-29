<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------

    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------

        $sql = $conn->prepare(" SELECT COD_FOR, NOME_FANTASIA_FOR FROM TBL_FORNECEDOR ");
        
        $sql -> execute() or exit("ErroBanco2");

        $result = $sql -> get_result();

        if ($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc()){

                //NÃO ESQUECER O " >" NO FINAL DA TAG 
               
                echo '<option value="' . $row['COD_FOR']. '">'.$row['NOME_FANTASIA_FOR'].'</option> ';                              

            }

        }

        $sql -> close();
        $conn -> close();

    // -----------------------------------FIM-------------------------------------------
?>