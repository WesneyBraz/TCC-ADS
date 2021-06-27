<?php

if($_POST){
    //O que está entre <script> e </script> é o Sweetalert que aparecerá na tela caso o campo esteja vazio, ou seja, empty  
    if(empty($_POST['dataEntrada']) || empty($_POST['descricaoOs']) || empty($_POST['diagnostico']) 
     || empty($_POST['produto']) || empty($_POST['status']) || empty($_POST['nomeFuncionario']) 
     || empty($_POST['nomeCliente']) || empty($_POST['dataSaida']) || empty($_POST['valorOs']) 
     || empty($_POST['lucro']) || empty($_POST['id'])  ){

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
    $vinicio= addslashes($_POST["dataEntrada"]);
    $vdescricao= addslashes ($_POST["descricaoOs"]);
    $vdiagnostico= addslashes ($_POST["diagnostico"]);
    $vproduto= addslashes ($_POST["produto"]);
    $vstatus= addslashes ($_POST["status"]);
    $vfuncionario= addslashes ($_POST["nomeFuncionario"]);
    $vcliente= addslashes ($_POST["nomeCliente"]);
    $vfim= addslashes ($_POST["dataSaida"]);
    $vcusto1= addslashes ($_POST["valorOs"]);
    $vcusto = floatval($vcusto1);

    $vlucro1= addslashes ($_POST["lucro"]);
    $vlucro = floatval($vlucro1);
    $vid= addslashes ($_POST["id"]);

    //----------------------------------FIM---------------------------------------------

    //-----------------------REALIZA O CADASTRO DOS DADOS NO BANCO TBL_CLIENTE ---------------------- 
     $sql = $conn->prepare(" UPDATE TBL_ORDEM_DE_SERVICO SET
     DESCRICAO_DA_ATIVIDADE = '$vdescricao', DIAGNOSTICO = '$vdiagnostico', STATOS = '$vstatus',
     PRODUTO = '$vproduto', DATA_INICIO = '$vinicio', DATA_FIM = '$vfim', CUSTO = '$vcusto'
     WHERE COD_SER = '$vid'");

     //----------------RETORNA A MENSAGEM DE ERRO OU SUCESSO ----------------------------
     /*
     , LUCRO = '$vlucro'
     */
     $sql -> execute() or exit("Erro Banco 1 UPDATE".gettype($vcusto)."-".$vlucro."");

     $sql -> close();
     $conn -> close();
     //----------------------------------FIM---------------------------------------------

     //----------------------------- EXIBI NA TELA OS DADOS CADASTRADOS -----------------
     echo ("<script>
     $(document).ready(function(){ 
         Swal.fire({
             icon: 'success',
             text: 'Ordem de serviço alterada com sucesso!'
           })   
     });
     </script>"); 

     exit();
     //----------------------------------FIM---------------------------------------------
    }
    }
     ?>