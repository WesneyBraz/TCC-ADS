<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------

    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------

        $sql = $conn->prepare(" SELECT COD_CLI, NOME_CLI FROM TBL_CLIENTE ");
        
        $sql -> execute() or exit("ErroBanco2");

        $result = $sql -> get_result();

        if ($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc()){

                //NÃO ESQUECER O " >" NO FINAL DA TAG 
               
            echo '

                <option value="' . $row['COD_CLI']. '">'.$row['NOME_CLI'].'</option>
              ';                        

            }

        }


    // -----------------------------------FIM-------------------------------------------
?>