<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------

    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------

        $sql = $conn->prepare(" SELECT COD_DEP, NOME_DEP FROM TBL_DEPARTAMENTO ");
        
        $sql -> execute() or exit("ErroBanco2");

        $result = $sql -> get_result();

        if ($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc()){
               
            echo '
               <tr>            
                  <td title="'.$row['COD_DEP'].'">'.$row['COD_DEP'].'</td>
                  <td title="'.$row['NOME_DEP'].'">'.$row['NOME_DEP'].'</td>                 
               </tr>
               ';
               
                                

            }

        }

        $sql -> close();
        $conn -> close();

    // -----------------------------------FIM-------------------------------------------
?>