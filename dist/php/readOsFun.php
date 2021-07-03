<?php
include_once 'conect.php';
if ($_POST) {
    $vos = $_POST["os"];

    $sql = $conn->prepare(" SELECT COD_SER, DATA_INICIO, DATA_FIM, STATOS, NOME_FUN
    FROM TBL_ORDEM_DE_SERVICO OS
    INNER JOIN TBL_FUNCIONARIO FU ON FU.COD_FUN = OS.COD_FUN
    WHERE COD_SER like '%$vos%' ");

    $sql->execute() or exit("ErroBanco");

    $result = $sql->get_result();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '
            <tr>            
                <td ' . $row['COD_SER'] . '">' . $row['COD_SER'] . '</td>
                <td ' . $row['DATA_INICIO'] . '">' . $row['DATA_INICIO'] . '</td>
                <td ' . $row['DATA_FIM'] . '">' . $row['DATA_FIM'] . '</td>
                <td ' . $row['STATOS'] . '">' . $row['STATOS'] . '</td> 
                <td ' . $row['NOME_FUN'] . '">' . $row['NOME_FUN'] . '</td>' ?>
            <td>
                <a class="nav-link mb-0 p-1" href="pdf.php?COD_SER=<?php echo $row['COD_SER']; ?>" target="_blank">
                    <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                    <span class="nav-link-text">PDF</span>
                </a>
            </td>
            <td>
                <a class="nav-link" href="alterarOsFun.php?COD_SER=<?php echo $row['COD_SER']; ?>">
                    <i class="bi bi-card-checklist"></i>
                    <span class="nav-link-text">EDITAR</span>
                </a>
            </td>

        <?php echo '  

            </tr>             
        ';
        }
    } else {

        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Nº OS sem cadastrado!'
              })   
        });
        </script>");

        return false;
    }
} else {
    $sql = $conn->prepare(" SELECT COD_SER, DATA_INICIO, DATA_FIM, STATOS, NOME_FUN
    FROM TBL_ORDEM_DE_SERVICO OS
    INNER JOIN TBL_FUNCIONARIO FU ON FU.COD_FUN = OS.COD_FUN ");

    $sql->execute() or exit("ErroBanco");

    $result = $sql->get_result();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '
            <tr>            
                <td ' . $row['COD_SER'] . '">' . $row['COD_SER'] . '</td>
                <td ' . $row['DATA_INICIO'] . '">' . $row['DATA_INICIO'] . '</td>
                <td ' . $row['DATA_FIM'] . '">' . $row['DATA_FIM'] . '</td>
                <td ' . $row['STATOS'] . '">' . $row['STATOS'] . '</td> 
                <td ' . $row['NOME_FUN'] . '">' . $row['NOME_FUN'] . '</td>' ?>
            <td>
                <a class="nav-link mb-0 p-1" href="pdf.php?COD_SER=<?php echo $row['COD_SER']; ?>" target="_blank">
                    <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                    <span class="nav-link-text">PDF</span>
                </a>
            </td>
            <td>
                <a class="nav-link mb-0 p-1" href="alterarOsFun.php?COD_SER=<?php echo $row['COD_SER']; ?>">
                    <i class="bi bi-file-earmark-font text-dark"></i>
                    <span class="nav-link-text">EDITAR</span>
                </a>
            </td>

<?php echo '  

            </tr>             
        ';
        }
    }
}

?>