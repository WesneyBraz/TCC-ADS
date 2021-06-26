<?php
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    // -----------------------------------FIM-------------------------------------------
    if($_POST){
    require 'conect.php';
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
                    $sql = $conn->prepare(" SELECT COD_CLI, CPF_CLI, NOME_CLI 
                    FROM TBL_CLIENTE
                    WHERE CPF_CLI like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 1");
        
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">CPF</th>
                        <th title="user">NOME</th>
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['CPF_CLI'].'">'.$row['CPF_CLI'].'</td>
                                <td title="'.$row['NOME_CLI'].'">'.$row['NOME_CLI'].'</td>
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_CLI=<?php echo $row['COD_CLI'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>

                                <td>
                                <a class="nav-link" href="alterarCliente.php?COD_CLI=<?php echo $row['COD_CLI'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
                        
                        }
                
                    }

                }
                else{
                        $sql = $conn->prepare(" SELECT COD_CLI, CPF_CLI, NOME_CLI FROM TBL_CLIENTE");
                                
                        $sql -> execute() or exit("Erro Banco 01");

                        $result = $sql -> get_result();
                        echo'
                        <tr>
                        <th title="id">CPF</th>
                        <th title="user">NOME</th>
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                        </tr>
                        ';

                        if ($result -> num_rows > 0){

                            while ($row = $result -> fetch_assoc()){
                            
                            echo '
                                <tr>            
                                    <td title="'.$row['CPF_CLI'].'">'.$row['CPF_CLI'].'</td>
                                    <td title="'.$row['NOME_CLI'].'">'.$row['NOME_CLI'].'</td>
                                    '?> 
                                    <td>
                                        <a class="nav-link" href="./php/delete.php?COD_CLI=<?php echo $row['COD_CLI'];?>">         
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">EXCLUIR</span>
                                        </a>
                                    </td>
    
                                    <td>
                                    <a class="nav-link" href="alterarCliente.php?COD_CLI=<?php echo $row['COD_CLI'];?>">         
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">EDITAR</span>
                                        </a>
                                    </td>
                                    
                                    <?php echo'  
                        
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
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['COD_DEP'].'">'.$row['COD_DEP'].'</td>
                                <td title="'.$row['NOME_DEP'].'">'.$row['NOME_DEP'].'</td>'?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_DEP=<?php echo $row['COD_DEP'];?>">   
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>

                                <td>
                                    <a class="nav-link" href="alterarDepartamento.php?COD_DEP=<?php echo $row['COD_DEP'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
                        
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
                            <th> EXCLUIR</th>
                            <th> EDITAR </th>
                        </tr>
                        ';

                        if ($result -> num_rows > 0){

                            while ($row = $result -> fetch_assoc()){
                            
                            echo '
                                <tr>            
                                    <td title="'.$row['COD_DEP'].'">'.$row['COD_DEP'].'</td>
                                    <td title="'.$row['NOME_DEP'].'">'.$row['NOME_DEP'].'</td>'?> 
                                    <td>
                                        <a class="nav-link" href="./php/delete.php?COD_DEP=<?php echo $row['COD_DEP'];?>">         
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">EXCLUIR</span>
                                        </a>
                                    </td>
    
                                    <td>
                                    <a class="nav-link" href="alterarDepartamento.php?COD_DEP=<?php echo $row['COD_DEP'];?>">          
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">EDITAR</span>
                                        </a>
                                    </td>
                                    
                                    <?php echo'  
                        
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
                $sql = $conn->prepare(" SELECT COD_FUN, CPF_FUN, NOME_FUN
                FROM TBL_FUNCIONARIO
                WHERE NOME_FUN like '%$vfiltro%' ");

                    $sql -> execute() or exit("Erro Banco 3");
                
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">CPF</th>
                        <th title="user">NOME</th>
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                        
                            <tr>            
                                <td title="'.$row['CPF_FUN'].'">'.$row['CPF_FUN'].'</td>
                                <td title="'.$row['NOME_FUN'].'">'.$row['NOME_FUN'].'</td>
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_FUN=<?php echo $row['COD_FUN'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>

                                <td>
                                    <a class="nav-link" href="alterarFuncionario.php?COD_FUN=<?php echo $row['COD_FUN'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
                            
                        }
                
                    }
        
                    
                }
                else {
                    $sql = $conn->prepare(" SELECT COD_FUN, CPF_FUN, NOME_FUN FROM TBL_FUNCIONARIO");
                                
                    $sql -> execute() or exit("Erro Banco 03");
            
                    $result = $sql -> get_result();
                    echo'
                    <tr>
                    <th title="id">CPF</th>
                    <th title="user">NOME</th>
                    <th> EXCLUIR</th>
                    <th> EDITAR </th>
                    </tr>
                    ';
            
                    if ($result -> num_rows > 0){
            
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                            <tr>            
                                <td title="'.$row['CPF_FUN'].'">'.$row['CPF_FUN'].'</td>
                                <td title="'.$row['NOME_FUN'].'">'.$row['NOME_FUN'].'</td> 
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_FUN=<?php echo $row['COD_FUN'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>

                                <td>
                                    <a class="nav-link" href="alterarFuncionario.php?COD_FUN=<?php echo $row['COD_FUN'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
                            
                        }
            
                    }    
                }
                break;
            //----------------------------------------------------------------------------------
            
            // ------------------------------------- PRODUTO -------------------------------------
            case "Produto":

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
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
                                <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td> 
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_PROD=<?php echo $row['COD_PROD'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>
                                <td>
                                    <a class="nav-link" href="alterarProduto.php?COD_PROD=<?php echo $row['COD_PROD'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
                        
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
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                    
                    if ($result -> num_rows > 0){
            
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                            <tr>            
                                <td title="'.$row['COD_PROD'].'">'.$row['COD_PROD'].'</td>
                                <td title="'.$row['NOME_PROD'].'">'.$row['NOME_PROD'].'</td> 
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_PROD=<?php echo $row['COD_PROD'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>
                                <td>
                                    <a class="nav-link" href="alterarProduto.php?COD_PROD=<?php echo $row['COD_PROD'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
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
                    $sql = $conn->prepare(" SELECT COD_FOR, CNPJ_FOR, NOME_FANTASIA_FOR
                    FROM TBL_FORNECEDOR
                    WHERE NOME_FANTASIA_FOR like '%$vfiltro%' ");
                        
                    $sql -> execute() or exit("Erro Banco 5");
                
                    $result = $sql -> get_result();

                    echo'
                    <tr>
                        <th title="id">CNPJ</th>
                        <th title="user">NOME</th>
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                
                    if ($result -> num_rows > 0){
                
                        while ($row = $result -> fetch_assoc()){
                        
                        echo '
                    
                            <tr>            
                                <td title="'.$row['CNPJ_FOR'].'">'.$row['CNPJ_FOR'].'</td>
                                <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_FOR=<?php echo $row['COD_FOR'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>

                                <td>
                                    <a class="nav-link" href="">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
                        
                        }
                
                    }

                }
                else {
                        $sql = $conn->prepare(" SELECT COD_FOR, CNPJ_FOR, NOME_FANTASIA_FOR FROM TBL_FORNECEDOR");
                    
                        $sql -> execute() or exit("Erro Banco 05");

                        $result = $sql -> get_result();
                        echo'
                        <tr>
                            <th title="id">CNPJ</th>
                            <th title="user">NOME</th>
                            <th> EXCLUIR</th>
                            <th> EDITAR </th>
                        </tr>
                        ';
                        
                        if ($result -> num_rows > 0){
                
                            while ($row = $result -> fetch_assoc()){
                                
                            echo '
                                <tr>            
                                    <td title="'.$row['CNPJ_FOR'].'">'.$row['CNPJ_FOR'].'</td>
                                    <td title="'.$row['NOME_FANTASIA_FOR'].'">'.$row['NOME_FANTASIA_FOR'].'</td>    
                                    '?> 
                                    <td>
                                        <a class="nav-link" href="./php/delete.php?COD_FOR=<?php echo $row['COD_FOR'];?>">         
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">EXCLUIR</span>
                                        </a>
                                    </td>
    
                                    <td>
                                        <a class="nav-link" href="">         
                                        <i class="ni ni-bullet-list-67 text-primary"></i>
                                        <span class="nav-link-text">EDITAR</span>
                                        </a>
                                    </td>
                                    
                                    <?php echo'  
                        
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
                    <th> EXCLUIR</th>
                    <th> EDITAR </th>
                </tr>
                ';
            
                if ($result -> num_rows > 0){
            
                    while ($row = $result -> fetch_assoc()){
                    
                    echo '
                            <tr>            
                                <td title="'.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
                                <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td>'?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_SER=<?php echo $row['COD_SER'];?>">  
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>

                                <td>
                                    <a class="nav-link" href="alterarOsEmp.php?COD_SER=<?php echo $row['COD_SER'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
                            </tr>             
                        ';
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
                        <th> EXCLUIR</th>
                        <th> EDITAR </th>
                    </tr>
                    ';
                    
                    if ($result -> num_rows > 0){
            
                        while ($row = $result -> fetch_assoc()){
                            
                        echo '
                            <tr>            
                                <td title="'.$row['COD_SER'].'">'.$row['COD_SER'].'</td>
                                <td title="'.$row['STATOS'].'">'.$row['STATOS'].'</td> 
                                '?> 
                                <td>
                                    <a class="nav-link" href="./php/delete.php?COD_SER=<?php echo $row['COD_SER'];?>">  
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EXCLUIR</span>
                                    </a>
                                </td>
                                <td>
                                    <a class="nav-link" href="alterarOsEmp.php?COD_SER=<?php echo $row['COD_SER'];?>">         
                                    <i class="ni ni-bullet-list-67 text-primary"></i>
                                    <span class="nav-link-text">EDITAR</span>
                                    </a>
                                </td>
                                
                                <?php echo'  
                    
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
