<?php
include('verificaSessao2.php');
require 'conexao.php';
$id=addslashes($_GET['COD_SER']);

$verifica = ("SELECT CUSTO, LUCRO, TIPO, NS, DATA_INICIO, DATA_FIM, 
DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, STATOS, PRODUTO, COD_FUN, TIPO, NS,
COD_CLI, COD_SER FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = '$id'");

$resultadoVerifica = mysqli_query ($conn, $verifica );

$retorno = mysqli_fetch_assoc($resultadoVerifica);
//----------------------------------------------------------------------//
$CLI = $retorno['COD_CLI'];

$verifica1 = ("SELECT NOME_CLI FROM TBL_CLIENTE WHERE COD_CLI = '$CLI'");

$resultadoVerifica1 = mysqli_query ($conn, $verifica1 );

$retorno1 = mysqli_fetch_assoc($resultadoVerifica1);
//----------------------------------------------------------------------//
$FUN = $retorno['COD_FUN'];

$verifica2 = ("SELECT NOME_FUN FROM TBL_FUNCIONARIO WHERE COD_FUN = '$FUN'");

$resultadoVerifica2 = mysqli_query ($conn, $verifica2 );

$retorno2 = mysqli_fetch_assoc($resultadoVerifica2);
//----------------------------------------------------------------------//
$PROD = $retorno['PRODUTO'];

$verifica3 = ("SELECT NOME_PROD FROM TBL_PRODUTO WHERE COD_PROD = '$PROD'");

$resultadoVerifica3 = mysqli_query ($conn, $verifica3 );

$retorno3 = mysqli_fetch_assoc($resultadoVerifica3);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ordem de Serviço</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!---CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- alerta css ../js/jquery-3.6.0.min.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script src="./js/sweetalert.js"></script>
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="./img/logo.jpeg" class="navbar-brand-img" alt="...">
                    <h2>DMW</h2>
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Acesso:</span>
                    </h6>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link" href="cadastroFuncionario.php">
                                <i class="bi bi-tools" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Funcionario</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastroFornecedor.php">
                                <i class="ni ni-delivery-fast" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Fornecedor</span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produto.php">
                                <i class="bi bi-cart4" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Produto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastroCliente.php">
                                <i class="bi bi-person-lines-fill" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Cliente</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ordemservicoEmpresa.php">
                                <i class="bi bi-clipboard-data" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Ordem de Serviço</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="consultar.php">
                                <i class="bi bi-search" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Consultar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button id="sair" type="button" class="text-dark nav-link m-2" style="background-color: transparent;
                            border: 0;color: #00f;cursor: pointer;display: inline-block;padding:0;margin:1em;position: relative;text-decoration: none;">
                                <i class="bi bi-x-octagon-fill text-danger p-3" style="font-size: 1rem; color: cornflowerblue;"></i>
                                Sair</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler fixed-right sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row mt--5">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-upgrade">
                    <div class="card-header">
                            <h2 class="text-center my-2">Alterar Ordem de Serviço:
                            <?php echo 'Nº '.$retorno['COD_SER'].''; ?></h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" class="formOS" id="frmCadastro">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="<?php echo $retorno['COD_SER'];?>"></input>
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tipo:</label>
                                            <select class="custom-select my-1 mr-sm-2" id="tipo" name="tipo">
                                                <option selected value="Preditiva">Preditiva</option>
                                                <option value="Preventiva">Preventiva</option>
                                                <option value="Corretiva">Corretiva</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="">Nº Série:</label>
                                            <input class="form-control" id="ns" name="ns" rows="2"
                                            value="<?php echo $retorno['NS'];?>"></input>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">                            
                                            <label for="exampleFormControlTextarea1" class="">
                                                Descrição:</label>
                                            <input class="form-control" id="descricaoOs" name="descricaoOs" rows="2"
                                                value="<?php echo $retorno['DESCRICAO_DA_ATIVIDADE'];?>"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="">Diagnostico:</label>
                                            <input class="form-control" id="diagnostico" name="diagnostico" rows="2"
                                            value="<?php echo $retorno['DIAGNOSTICO'];?>"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label class="my-1 mr-2"
                                                for="inlineFormCustomSelectPref">Funcionario:</label>
                                            <select name="nomeFuncionario" class="custom-select my-1 mr-sm-2" id="nomeFuncionario">
                                            <option selected value="<?php echo $retorno['COD_FUN'];?>"><?php echo $retorno2['NOME_FUN'];?></option>
                                                <?php
                                                    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
                                                    include_once './php/readFun.php';
                                                    //----------------------------------FIM---------------------------------------------
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Cliente:</label>
                                            <select class="custom-select my-1 mr-sm-2" id="nomeCliente" name="nomeCliente">
                                            <option selected value="<?php echo $retorno['COD_CLI'];?>"><?php echo $retorno1['NOME_CLI'];?></option>
                                                <?php
                                                    //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
                                                    include_once './php/readCli.php';
                                                    //----------------------------------FIM---------------------------------------------
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status:</label>
                                                <select class="custom-select my-1 mr-sm-2" id="status" name="status">
                                                <option selected value="<?php echo $retorno['STATOS'];?>"><?php echo $retorno['STATOS'];?></option>
                                                    <option value="Aguardando">Aguardando</option>
                                                    <option value="Em processo">Em processo</option>
                                                    <option value="Concluido">Concluido</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Produto:</label>
                                                <select class="custom-select my-1 mr-sm-2" id="produto" name="produto">
                                                <option selected value="<?php echo $retorno['PRODUTO'];?>"><?php echo $retorno3['NOME_PROD'];?></option>
                                                    <?php
                                                        //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
                                                        include_once './php/readProd.php';
                                                        //----------------------------------FIM---------------------------------------------
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-datetime-local-input"
                                                class=" my-1 mr-2">Entrada:</label>
                                            <input class="form-control" type="date"
                                            value="<?php echo $retorno['DATA_INICIO'];?>" id="dataEntrada" name="dataEntrada">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-datetime-local-input" class=" my-1 mr-2">Saída:</label>
                                            <input class="form-control" type="date"
                                            value="<?php echo $retorno['DATA_FIM'];?>" id="dataSaida" name="dataSaida">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="valorOs">Custo:</label><input type="text" id="valorOs"
                                            value="<?php echo $retorno['CUSTO'];?>"name="valorOs" class="form-control valor"
                                                style="display:inline-block" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lucro">Lucro:</label><input type="text" id="lucro" 
                                            value="<?php echo $retorno['LUCRO'];?>" name="lucro"
                                                class="form-control valor" style="display:inline-block" />
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block btn-round" id="botao"
                                    value="Salvar Alteração"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="" class="font-weight-bold ml-1" target="_blank">DMW</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="os"></div>
    <!-- Scripts -->
    <!-- Core -->
    <script>
        //Função ajax
        $(function () {
            $('.formOS').submit(function () { //Linha para submit, quando o usuário apertar o botão
                $.ajax({
                    url: './php/updateOsEmp.php', //Arquivo php que fará as validações
                    type: 'post', //Método utilizado
                    data: $('.formOS').serialize(), //Pega as informações inseridas
                    success: function (data) {
                        $('.os').html(data); //Caso todas as informações foram inseridas irá aparecer o nome abaixo a partir da div "mostrar"
                    }
                });
                return false;
            });
        });
    </script>
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Puxando o jquery e plugin "mask" do jquery -->
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <!-- JS -->
    <script src="./js/ordemservicoEmpresa.js"></script>
    <script src="./js/sair.js"></script>

</body>

</html>