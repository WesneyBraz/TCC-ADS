<?php

    include_once 'conexao.php';
    if($_POST){
    $vnome=$_POST["nomeProd"];

    //-------------------CASO NÃO EXISTA O CAMPO RETORNA A MENSAGEM DE ERRO ------------- 

    //VERIFICA SE O CAMPO EXISTE
    $verifica = ("SELECT CPF_CLI FROM TBL_CLIENTE WHERE CPF_CLI = '$vnome'");

    $resultadoVerifica = mysqli_query ($conn, $verifica );

    $erroResultadoVerifica = mysqli_num_rows($resultadoVerifica);

    if($erroResultadoVerifica = 0)
    {
       echo ("<script>
       $(document).ready(function(){ 
           Swal.fire({
               icon: 'error',
               text: ' Sem registro!'
             })   
       });
       </script>");

       return false;
    }
    //----------------------------------FIM---------------------------------------------

    //-------------------------------------EXCLUIR------------------------------------- 

    //$sql = $conn->prepare("DELETE FROM TBL_PRODUTO WHERE COD_PROD = ?");
    //$sql->bind_param("s",$id);
    //$sql->execute();
    //$sql -> execute()  or exit("ErroBanco delete");
    
    $sql = $conn->prepare(" SELECT COD_PROD, NOME_PROD, CATEGORIA_PROD, DESCRICAO_PROD, ESTOQUE_PROD, VALOR_PROD, NOME_FANTASIA_FOR
    FROM TBL_PRODUTO PR
    INNER JOIN TBL_FORNECEDOR FR ON FR.COD_FOR = PR.COD_FOR
    WHERE NOME_PROD like '%$vnome%' ");
    //WHERE NOME_PROD LIKE "%t%";
    
        
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