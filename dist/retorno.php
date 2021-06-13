<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------
    //$vconsulta=0;
    if($_POST){

   
    $vconsulta=$_POST["consulta"];


    switch($vconsulta){
    case "Departamento":
    // ------------------------------------- DEPARTAMENTO -------------------------------------
            $sql = $conn->prepare(" SELECT COD_DEP, NOME_DEP FROM TBL_DEPARTAMENTO ");
            
            $sql -> execute() or exit("ErroBanco1");

            $result = $sql -> get_result();
            echo'
            <tr>
            <th title="id">COD</th>
            <th title="user">NOME</th>
            </tr>
            ';

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
            break;
    //----------------------------------------------------------------------------------
    case "Cliente":
    // ------------------------------------- CLIENTE -------------------------------------
            $sql = $conn->prepare(" SELECT CPF_CLI, NOME_CLI FROM TBL_CLIENTE");
                    
            $sql -> execute() or exit("ErroBanco2");

            $result = $sql -> get_result();
            echo'
            <tr>
            <th title="id">CPF</th>
            <th title="user">NOME</th>
            </tr>
            ';

            if ($result -> num_rows > 0){

                while ($row = $result -> fetch_assoc()){
                
                echo '
                    <tr>            
                        <td title="'.$row['CPF_CLI'].'">'.$row['CPF_CLI'].'</td>
                        <td title="'.$row['NOME_CLI'].'">'.$row['NOME_CLI'].'</td>                 
                    </tr>
                ';
                
                }

            }
            break;
    //----------------------------------------------------------------------------------
    case "Funcionario":
    // ------------------------------------- FUNCIONARIO -------------------------------------
            $sql = $conn->prepare(" SELECT CPF_FUN, NOME_FUN FROM TBL_FUNCIONARIO");
                        
            $sql -> execute() or exit("ErroBanco3");
    
            $result = $sql -> get_result();
            echo'
            <tr>
            <th title="id">CPF</th>
            <th title="user">NOME</th>
            </tr>
            ';
    
            if ($result -> num_rows > 0){
    
                while ($row = $result -> fetch_assoc()){
                    
                echo '
                    <tr>            
                        <td title="'.$row['CPF_FUN'].'">'.$row['CPF_FUN'].'</td>
                        <td title="'.$row['NOME_FUN'].'">'.$row['NOME_FUN'].'</td>                 
                    </tr>
                ';
                    
                }
    
            }
            break;
    //----------------------------------------------------------------------------------
    case "Produto":
    // ------------------------------------- PRODUTO -------------------------------------
            $sql = $conn->prepare(" SELECT COD_PROD, NOME_PROD FROM TBL_PRODUTO");
                                
            $sql -> execute() or exit("ErroBanco4");
            
            $result = $sql -> get_result();
            echo'
            <tr>
            <th title="id">COD</th>
            <th title="user">NOME</th>
            </tr>
            ';
            
            if ($result -> num_rows > 0){
    
                while ($row = $result -> fetch_assoc()){
                    
                echo '
                    <tr>            
                        <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
                        <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td>                 
                    </tr>
                ';
                    
                }
    
            }
            break;
    //----------------------------------------------------------------------------------
    case "Fornecedor":
    // ------------------------------------- FORNECEDOR -------------------------------------
            $sql = $conn->prepare(" SELECT CNPJ_FOR, NOME_FANTASIA_FOR FROM TBL_FORNECEDOR");
                                
            $sql -> execute() or exit("ErroBanco5");
            
            $result = $sql -> get_result();
            echo'
            <tr>
            <th title="id">CNPJ</th>
            <th title="user">NOME</th>
            </tr>
            ';
            
            if ($result -> num_rows > 0){
    
                while ($row = $result -> fetch_assoc()){
                    
                echo '
                    <tr>            
                        <td title="'.$row['CNPJ_FOR'].'">'.$row['CNPJ_FOR'].'</td>
                        <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>                 
                    </tr>
                ';
                    
                }
    
            }
            break;
    //----------------------------------------------------------------------------------
    case "Ordem_de_Servico":
    // ------------------------------------- ORDEM DE SERVIÇO -------------------------------------
            $sql = $conn->prepare(" SELECT COD_SER, STATOS FROM TBL_ORDEM_DE_SERVICO");
                                
            $sql -> execute() or exit("ErroBanco6");
            
            $result = $sql -> get_result();
            echo'
            <tr>
            <th title="id">Nº-OS</th>
            <th title="user">STATUS</th>
            </tr>
            ';
            
            if ($result -> num_rows > 0){
    
                while ($row = $result -> fetch_assoc()){
                    
                echo '
                    <tr>            
                        <td title="'.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
                        <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td>                 
                    </tr>
                ';
                    
                }
    
            }
            break;


        default:
    echo"<script>alert('SELECIONE UM CAMPO');</script>";
           
    
    }
}

    
    // -----------------------------------FIM-------------------------------------------
?>