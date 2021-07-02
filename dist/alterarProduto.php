<?php
include('verificaSessao2.php');
require 'conexao.php';
$id = addslashes($_GET['COD_PROD']);

$verifica = ("SELECT COD_PROD, NOME_PROD, CATEGORIA_PROD, DESCRICAO_PROD, ESTOQUE_PROD, VALOR_PROD, COD_FOR
FROM TBL_PRODUTO WHERE COD_PROD = '$id'");

$resultadoVerifica = mysqli_query($conn, $verifica);

$retorno = mysqli_fetch_assoc($resultadoVerifica);

//---------------------------------------------------------
$FOR = $retorno['COD_FOR'];

$verifica1 = ("SELECT NOME_FANTASIA_FOR FROM TBL_FORNECEDOR WHERE COD_FOR = '$FOR'");

$resultadoVerifica1 = mysqli_query ($conn, $verifica1 );

$retorno1 = mysqli_fetch_assoc($resultadoVerifica1);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro Produto</title>
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
    <!-- alerta css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.all.js"></script>
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
                    <h6 class="navbar-heading p-0">
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
                            <a class="nav-link active" href="produto.php">
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
                            <a class="nav-link" href="ordemservicoEmpresa.php">
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
                    <div class="card card-ipgrade">
                        <!-- card header -->
                        <div class="card-header">
                            <h2 class="text-center my-2">Alterar Produto:
                                <?php echo 'Nº ' . $retorno['COD_PROD'] . ''; ?></h2>
                        </div>
                        <!-- Cadastro Produto -->
                        <div class="card-body">
                            <form method="POST" action="" class="formPro" id="frmCadastro">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="<?php echo $retorno['COD_PROD']; ?>"></input>
                                            <label for="nomeProduto">Nome do produto</label>
                                            <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" value="<?php echo $retorno['NOME_PROD']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomeFornecedor">Fornecedor:</label>
                                            <select class="form-control" id="nomeFornecedor" name="nomeFornecedor">
                                            <option selected value="<?php echo $retorno['COD_FOR'];?>"><?php echo $retorno1['NOME_FANTASIA_FOR'];?></option>
                                                <?php
                                                //------------------ CHAMA O PROG DE CONEXÃO COM A BASE DE DADOS -------------------
                                                include_once './php/readFor.php';
                                                //----------------------------------FIM---------------------------------------------

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descricao">Descrição:</label>
                                            <input class="form-control" id="descricao" name="descricao" value="<?php echo $retorno['DESCRICAO_PROD']; ?>" rows="2"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="categoriaProduto">Categoria:</label>
                                            <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $retorno['CATEGORIA_PROD']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="valorProduto">Valor do produto:</label>
                                            <input type="text" class="form-control valorProduto" id="valorProduto" name="valorProduto" value="<?php echo $retorno['VALOR_PROD']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="estoque">Estoque do produto:</label>
                                            <input type="number" class="form-control" id="estoque" name="estoque" value="<?php echo $retorno['ESTOQUE_PROD']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block btn-round" id="botao" value="Salvar Alteração"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0" style="margin: auto;width: 100%;bottom: 0; position: fixed;">
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
    <div class="pro"></div>
    <!-- Scripts -->
    <!-- Core -->
    <script>
        //Função ajax
        $(function() {
            $('.formPro').submit(function() { //Linha para submit, quando o usuário apertar o botão
                $.ajax({
                    url: './php/updateProd.php', //Arquivo php que fará as validações
                    type: 'post', //Método utilizado
                    data: $('.formPro').serialize(), //Pega as informações inseridas
                    success: function(data) {
                        $('.pro').html(data); //Caso todas as informações foram inseridas irá aparecer o nome abaixo a partir da div "mostrar"
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
    <script src="./js/sweetalert.js"></script>
    <script src="./js/scripts.js"></script>
    <script src="./js/produto.js"></script>
    <script src="./js/sair.js"></script>

</body>

</html>