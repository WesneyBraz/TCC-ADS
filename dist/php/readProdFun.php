<?php
include_once 'conect.php';
if($_POST){
    $vnome=$_POST["nomeProd"];

    $sql = $conn->prepare(" SELECT COD_PROD, NOME_PROD, CATEGORIA_PROD, DESCRICAO_PROD, ESTOQUE_PROD, VALOR_PROD, NOME_FANTASIA_FOR
    FROM TBL_PRODUTO PR
    INNER JOIN TBL_FORNECEDOR FR ON FR.COD_FOR = PR.COD_FOR
    WHERE NOME_PROD like '%$vnome%' ");    
        
    $sql -> execute() or exit("ErroBanco2");

    $result = $sql -> get_result();

    if ($result -> num_rows > 0){

        while ($row = $result -> fetch_assoc()){
           
        echo '
       
            <tr>            
                <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
                <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td> 
                <td title="'.$row['DESCRICAO_PROD'].'">'.$row['DESCRICAO_PROD'].'</td>
                <td title="'.$row['CATEGORIA_PROD'].'">'.$row['CATEGORIA_PROD'].'</td>
                <td title="'.$row['ESTOQUE_PROD'].'">'.$row['ESTOQUE_PROD'].'</td>
                <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>                 
            </tr>';
           
        }

    }
    else{

        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Produto sem cadastrado!'
              })   
        });
        </script>");
 
        return false;

    }
}
else{

    // ------------------ EFETUA A CONSULTA A BASE DE DADOS ----------------------------
    $sql = $conn->prepare(" SELECT COD_PROD, NOME_PROD, CATEGORIA_PROD, DESCRICAO_PROD, ESTOQUE_PROD, VALOR_PROD, NOME_FANTASIA_FOR
    FROM TBL_PRODUTO PR
    INNER JOIN TBL_FORNECEDOR FR ON FR.COD_FOR = PR.COD_FOR");
    
    $sql -> execute() or exit("ErroBanco2");

    $result = $sql -> get_result();

    if ($result -> num_rows > 0){

        while ($row = $result -> fetch_assoc()){
           
        echo '
           <tr>            
              <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
              <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td> 
              <td title="'.$row['DESCRICAO_PROD'].'">'.$row['DESCRICAO_PROD'].'</td>
              <td title="'.$row['CATEGORIA_PROD'].'">'.$row['CATEGORIA_PROD'].'</td>
              <td title="'.$row['ESTOQUE_PROD'].'">'.$row['ESTOQUE_PROD'].'</td>
              <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>                 
            </tr>';
           
        }

    }
}

?>