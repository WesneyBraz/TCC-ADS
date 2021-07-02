<?php
include('verificaSessao.php');
require 'conexao.php';
$id = addslashes($_GET['COD_SER']);

$verifica = ("SELECT CUSTO, LUCRO, DATA_INICIO, DATA_FIM, 
DESCRICAO_DA_ATIVIDADE, DIAGNOSTICO, STATOS, PRODUTO, COD_FUN, 
COD_CLI, COD_SER  FROM TBL_ORDEM_DE_SERVICO WHERE COD_SER = '$id'");


$resultadoVerifica = mysqli_query($conn, $verifica);

$retorno = mysqli_fetch_assoc($resultadoVerifica);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- Ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Bootstrap -->
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Sweetalert -->
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
                            <a class="nav-link active" href="ordemservicoFuncionario.php">
                                <i class="bi bi-clipboard-data" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Minhas Ordens de Serviço</span>
                            </a>


                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produtoFuncionario.php">
                                <i class="bi bi-cart4" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Produto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button id="sair" class="text-dark p-1 nav-link" style="background-color: transparent;
                            border: 0;color: #00f;cursor: pointer;display: inline-block;padding:0;margin:1em;position: relative;text-decoration: none;">
                                <i class="bi bi-x-octagon-fill text-danger p-2" style="font-size: 1rem; color: cornflowerblue;"></i>
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
                            <div class="pr-3 sidenav-toggler fixed-right sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
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
                                <?php echo 'Nº ' . $retorno['COD_SER'] . ''; ?></h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" class="formOS" id="frmCadastro" onsubmit="validarOS()">

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="<?php echo $retorno['COD_SER']; ?>"></input>
                                            <label for="exampleFormControlTextarea1" class="">
                                                Descrição:</label>
                                            <input class="form-control" id="descricaoOs" name="descricaoOs" rows="2" value="<?php echo $retorno['DESCRICAO_DA_ATIVIDADE']; ?>"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="">Diagnostico:</label>
                                            <input class="form-control" id="diagnostico" name="diagnostico" rows="2" value="<?php echo $retorno['DIAGNOSTICO']; ?>"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status:</label>
                                            <select class="custom-select my-1 mr-sm-2" id="status" name="status">
                                                <option selected value="<?php echo $retorno['STATOS']; ?>"><?php echo $retorno['STATOS']; ?></option>
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
                                                <option selected>Selecione.</option>
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
                                            <label for="example-datetime-local-input" class=" my-1 mr-2">Entrada:</label>
                                            <input class="form-control" type="date" value="<?php echo $retorno['DATA_INICIO']; ?>" id="dataEntrada" name="dataEntrada">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-datetime-local-input" class=" my-1 mr-2">Saída:</label>
                                            <input class="form-control" type="date" value="<?php echo $retorno['DATA_FIM']; ?>" id="dataSaida" name="dataSaida">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block btn-round" id="botao" value="SALVAR ALTERAÇÃO" onclick="validarOS();"></input>
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
        $(function() {
            $('.formOS').submit(function() { //Linha para submit, quando o usuário apertar o botão
                $.ajax({
                    url: './php/updateOsFun.php', //Arquivo php que fará as validações
                    type: 'post', //Método utilizado
                    data: $('.formOS').serialize(), //Pega as informações inseridas
                    success: function(data) {
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
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <!-- JS -->
    <script src="./js/ordemservicofuncionario.js"></script>
    <script src="./js/sair.js"></script>

</body>

</html>