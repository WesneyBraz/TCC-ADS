<?php

    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conexao.php';
    // -----------------------------------FIM-------------------------------------------
    if($_POST){
    $vconsulta=$_POST["consulta"];
    $vfiltro=$_POST["filtro"];


        if(empty($vconsulta)){

            if(empty($vfiltro)){
    
                echo"<script>alert('SELECIONE UM CAMPO');</script>";  
            
            }

        }


        else {
            switch($vconsulta){
            //----------------------------------------------------------------------------------
            case "Cliente":
            // ------------------------------------- CLIENTE -------------------------------------

                if(isset($vfiltro)){
                    $sql = $conn->prepare(" SELECT CPF_CLI, NOME_CLI 
                    FROM TBL_CLIENTE
                    WHERE CPF_CLI like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 1");
        
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">CPF</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['CPF_CLI'].'">'.$row['CPF_CLI'].'</td>
                                <td title="'.$row['NOME_CLI'].'">'.$row['NOME_CLI'].'</td>
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                   
                            </tr>';
                        
                        }
                
                    }

                }
                else{
                        $sql = $conn->prepare(" SELECT CPF_CLI, NOME_CLI FROM TBL_CLIENTE");
                                
                        $sql -> execute() or exit("Erro Banco 01");

                        $result = $sql -> get_result();
                        echo'
                        <tr>
                        <th title="id">CPF</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                        </tr>
                        ';

                        if ($result -> num_rows > 0){

                            while ($row = $result -> fetch_assoc()){
                            
                            echo '
                                <tr>            
                                    <td title="'.$row['CPF_CLI'].'">'.$row['CPF_CLI'].'</td>
                                    <td title="'.$row['NOME_CLI'].'">'.$row['NOME_CLI'].'</td>
                                    <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                    data-target="#verModa">+ Ver </button> </td>  
                                    <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                    + Editar </button> </td>                  
                                </tr>
                            ';
                            
                            }

                        }
                    }
                    break;
            // ----------------------------------------------------------------------------------------
            case "Departamento":
            // ------------------------------------- DEPARTAMENTO -------------------------------------
                if(isset($vfiltro)){
                    $sql = $conn->prepare(" SELECT COD_DEP, NOME_DEP
                    FROM TBL_DEPARTAMENTO
                    WHERE NOME_DEP like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 2");
                
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">COD</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['COD_DEP'].'">'.$row['COD_DEP'].'</td>
                                <td title="'.$row['NOME_DEP'].'">'.$row['NOME_DEP'].'</td>
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                   
                            </tr>';
                        
                        }
                
                    }

                }
                else{
                        $sql = $conn->prepare(" SELECT COD_DEP, NOME_DEP FROM TBL_DEPARTAMENTO ");
                        
                        $sql -> execute() or exit("Erro Banco 02");

                        $result = $sql -> get_result();
                        echo'
                        <tr>
                            <th title="id">COD</th>
                            <th title="user">NOME</th>
                            <th> VER</th>
                            <th> EDITAR </th>
                        </tr>
                        ';

                        if ($result -> num_rows > 0){

                            while ($row = $result -> fetch_assoc()){
                            
                            echo '
                                <tr>            
                                    <td title="'.$row['COD_DEP'].'">'.$row['COD_DEP'].'</td>
                                    <td title="'.$row['NOME_DEP'].'">'.$row['NOME_DEP'].'</td>
                                    <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                    data-target="#verModa">+ Ver </button> </td>  
                                    <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                    + Editar </button> </td>                  
                                </tr>
                            ';
                            
                            }

                        }
                    }
                    break;
            //----------------------------------------------------------------------------------
            case "Funcionario":
            // ------------------------------------- FUNCIONARIO -------------------------------------
                if (isset($vfiltro)){
                    $sql = $conn->prepare(" SELECT CPF_FUN, NOME_FUN
                    FROM TBL_FUNCIONARIO
                    WHERE NOME_FUN like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 3");
                
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">CPF</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                        
                            <tr>            
                                <td title="'.$row['CPF_FUN'].'">'.$row['CPF_FUN'].'</td>
                                <td title="'.$row['NOME_FUN'].'">'.$row['NOME_FUN'].'</td>
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                   
                            </tr>';
                            
                        }
                
                    }
        
                    
                }
                else {
                    $sql = $conn->prepare(" SELECT CPF_FUN, NOME_FUN FROM TBL_FUNCIONARIO");
                                
                    $sql -> execute() or exit("Erro Banco 03");
            
                    $result = $sql -> get_result();
                    echo'
                    <tr>
                    <th title="id">CPF</th>
                    <th title="user">NOME</th>
                    <th> VER</th>
                    <th> EDITAR </th>
                    </tr>
                    ';
            
                    if ($result -> num_rows > 0){
            
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                            <tr>            
                                <td title="'.$row['CPF_FUN'].'">'.$row['CPF_FUN'].'</td>
                                <td title="'.$row['NOME_FUN'].'">'.$row['NOME_FUN'].'</td> 
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                 
                            </tr>
                        ';
                            
                        }
            
                    }    
                }
                break;
            //----------------------------------------------------------------------------------
            case "Produto":
            // ------------------------------------- PRODUTO -------------------------------------
                if(isset($vfiltro)){

                    $sql = $conn->prepare(" SELECT COD_PROD, NOME_PROD
                    FROM TBL_PRODUTO 
                    WHERE NOME_PROD like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 4");
                
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">COD</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
                                <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td> 
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                 
                            </tr>                
                            </tr>';
                        
                        }
                
                    }


                }
                else{    
                    $sql = $conn->prepare(" SELECT COD_PROD, NOME_PROD FROM TBL_PRODUTO");
                                        
                    $sql -> execute() or exit("Erro Banco 04");
                    
                    $result = $sql -> get_result();
                    echo'
                    <tr>
                        <th title="id">COD</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                    
                    if ($result -> num_rows > 0){
            
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                            <tr>            
                                <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
                                <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td> 
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                 
                            </tr>
                        ';
                            
                        }
            
                    }
                }
                break;
            //----------------------------------------------------------------------------------
            case "Fornecedor":
            // ------------------------------------- FORNECEDOR -------------------------------------
                if (isset($vfiltro)) {
                    $sql = $conn->prepare(" SELECT CNPJ_FOR, NOME_FANTASIA_FOR
                    FROM TBL_FORNECEDOR
                    WHERE NOME_FANTASIA_FOR like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 5");
                
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">CNPJ</th>
                        <th title="user">NOME</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['CNPJ_FOR'].'">'.$row['CNPJ_FOR'].'</td>
                                <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td>                   
                            </tr>';
                        
                        }
                
                    }

                }
                else {
                        $sql = $conn->prepare(" SELECT CNPJ_FOR, NOME_FANTASIA_FOR FROM TBL_FORNECEDOR");
                                            
                        $sql -> execute() or exit("Erro Banco 05");
                        
                        $result = $sql -> get_result();
                        echo'
                        <tr>
                            <th title="id">CNPJ</th>
                            <th title="user">NOME</th>
                            <th> VER</th>
                            <th> EDITAR </th>
                        </tr>
                        ';
                        
                        if ($result -> num_rows > 0){
                
                            while ($row = $result -> fetch_assoc()){
                                
                            echo '
                                <tr>            
                                    <td title="'.$row['CNPJ_FOR'].'">'.$row['CNPJ_FOR'].'</td>
                                    <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>    
                                    <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                    data-target="#verModa">+ Ver </button> </td>  
                                    <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                    + Editar </button> </td>              
                                </tr>
                            ';
                                
                            }
                
                        } 
                    }
                    break;
            //----------------------------------------------------------------------------------    
            case "Ordem_de_Servico":
            // ------------------------------------- ORDEM DE SERVIÇO -------------------------------------
            if (isset($vfiltro)) {
                $sql = $conn->prepare(" SELECT COD_SER, STATOS
                FROM TBL_ORDEM_DE_SERVICO
                WHERE COD_SER like '%$vfiltro%' ");
                    
                $sql -> execute() or exit("Erro Banco 6");
            
                $result = $sql -> get_result();

                echo'
                <tr>
                    <th title="id">Nº-OS</th>
                    <th title="user">STATUS</th>
                    <th> VER</th>
                    <th> EDITAR </th>
                </tr>
                ';
            
                if ($result -> num_rows > 0){
            
                    while ($row = $result -> fetch_assoc()){
                    
                    echo '
                            <tr>            
                                <td title="'.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
                                <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td> 
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td> 
                            </tr>';
                    
                    }
            
                }

            }
                else {
                    $sql = $conn->prepare(" SELECT COD_SER, STATOS FROM TBL_ORDEM_DE_SERVICO");
                                        
                    $sql -> execute() or exit("ErroBanco6");
                    
                    $result = $sql -> get_result();
                    echo'
                    <tr>
                        <th title="id">Nº-OS</th>
                        <th title="user">STATUS</th>
                        <th> VER</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                    
                    if ($result -> num_rows > 0){
            
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                            <tr>            
                                <td title="'.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
                                <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td> 
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">+ Ver </button> </td>  
                                <td><button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                                + Editar </button> </td> 
                            </tr>
                        ';
                            
                        }
            
                    }               
                 }
                   
                    break;

                default:
                echo"<script>alert('SELECIONE UM CAMPO');</script>"; 
                
                }
            
            }

        }
?>
