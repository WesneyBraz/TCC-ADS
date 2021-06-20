<html></html>
<?php
include_once 'conexao.php';

$sql = $conn->prepare(" SELECT COD_SER, DATA_INICIO, DATA_FIM, STATOS FROM TBL_ORDEM_DE_SERVICO");
                                
$sql -> execute() or exit("ErroBanco");

$result = $sql -> get_result();

if ($result -> num_rows > 0){

    while ($row = $result -> fetch_assoc()){
        
    echo '
        <tr>            
            <td '.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
            <td '.$row['DATA_INICIO'].'">'.$row['DATA_INICIO'].'</td>
            <td '.$row['DATA_FIM'].'">'.$row['DATA_FIM'].'</td>
            <td '.$row['STATOS'].'">'.$row['STATOS'].'</td> 
            <td><a class="btn-sm btn-group btn-primary" data-toggle="modal"
            data-target="#verModa" href="alterarOsFun.php" >+ Ver </a> </td>  

            <td>
            <a class="nav-link" href="alterarOsFun.php">
            <i class="ni ni-cart text-primary"></i>
            <span class="nav-link-text">EDITAR</span>
            </a></td>
        </tr>             
    ';
       
    }

}

?>
</html>