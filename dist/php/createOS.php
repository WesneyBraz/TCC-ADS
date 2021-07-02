<?php
if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['dataEntrada']) || empty($_POST['descricaoOs']) || empty($_POST['diagnostico']) 
     || empty($_POST['produto']) || empty($_POST['status']) || empty($_POST['nomeFuncionario']) 
     || empty($_POST['nomeCliente']) || empty($_POST['dataSaida']) || empty($_POST['valorOs']) || empty($_POST['lucro']) 
     || empty($_POST['tipo'])  ){
        echo ("<script>
        $(document).ready(function(){ 
            Swal.fire({
                icon: 'error',
                text: 'Campo vazio!'
              })   
        });
        </script>");
    }
    
    else {
    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
    include_once 'conect.php';
    //----------------------------------FIM---------------------------------------------


    //ATRIBUIDO DADOS INSERIDOS NOS CAMPOS AS VARIAVEIS CORRESPONDENTES 
    $vinicio=$_POST["dataEntrada"];
    $vdescricao=$_POST["descricaoOs"];
    $vdiagnostico=$_POST["diagnostico"];
    $vproduto=$_POST["produto"];
    $vstatus=$_POST["status"];
    $vfuncionario=$_POST["nomeFuncionario"];
    $vcliente=$_POST["nomeCliente"];
    $vfim=$_POST["dataSaida"];
    $vcusto=$_POST["valorOs"];
    $vlucro=$_POST["lucro"];
    $vns=$_POST["ns"];
    $vtipo=$_POST["tipo"];

    //----------------------------------FIM---------------------------------------------

    //----------------------------------FIM---------------------------------------------



     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" INSERT INTO TBL_ORDEM_DE_SERVICO
     (CUSTO, LUCRO, NS, TIPO, DATA_INICIO, DATA_FIM, DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, STATOS, PRODUTO, COD_FUN, COD_CLI)
     VALUES
     (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

     $sql -> bind_param("ddssssssssss", $vcusto, $vlucro, $vns, $vtipo, $vinicio, $vfim, $vdescricao, $vdiagnostico, $vstatus, $vproduto, $vfuncionario, $vcliente );

     //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CONTATO ----------------------


     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------

     $sql -> execute() or exit("ErroBanco1");


     echo "Sucesso no Cadastro <br/>";

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Ordem de serviço cadastrada com sucesso!'
           })   
     });
     </script>"); 

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>