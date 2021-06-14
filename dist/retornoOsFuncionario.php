<?php
include_once 'conexao.php';

$sql = $conn->prepare(" SELECT COD_SER, DATA_INICIO, DATA_FIM, STATOS FROM TBL_ORDEM_DE_SERVICO");
                                
$sql -> execute() or exit("ErroBanco");

$result = $sql -> get_result();

if ($result -> num_rows > 0){

    while ($row = $result -> fetch_assoc()){
        
    echo '
        <tr>            
            <td title="'.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
            <td title="'.$row['DATA_INICIO'].'">'.$row['DATA_INICIO'].'</td>
            <td title="'.$row['DATA_FIM'].'">'.$row['DATA_FIM'].'</td>
            <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td> 
            <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
            data-target="#verModa">+ Ver </button> </td>  
            <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
            + Editar </button> </td> 


            
            
    ';
        
    }

}



?>