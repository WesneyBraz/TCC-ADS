<?php
include('verificaSessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Produto</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- alerta css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                            <a class="nav-link"href="ordemservicoFuncionario.php">
                                <i class="ni ni-bullet-list-67 text-primary"></i>
                                <span class="nav-link-text">Minhas Ordens de Serviço</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="produtoFuncionario.php">
                                <i class="ni ni-cart text-primary"></i>
                                <span class="nav-link-text">Produto</span>
                            </a>
                        </li>
                         <li class="nav-item">
                           <button  id="sair" type="button" class="text-dark nav-link" style="background-color: transparent;
                            border: 0;color: #00f;cursor: pointer;display: inline-block;padding:0;margin:1em;position: relative;text-decoration: none;">
                             <i  class="ni ni-ui-04 text-danger"></i>
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
        <div class="container-fluid mt--6">
            <div class="row mt--5">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card shadow-lg border-0 rounded-lg mt-3">
                    <!-- Card header -->
                    <div class="card-header  border-0">
                        <h2 class="mb-0">Consultar Produtos:</h2>
                    </div>
                    <!-- Light table -->

                    <form name="frmProd" class="frmProd" id="frmProd" action="" method="POST"> 
                    <div class="input-group mb-3 p-2">
                        <input type="text" class="form-control" id="nomeProd" name="nomeProd" 
                        placeholder="Pesquisar" 
                        aria-label="Recipient's username" 
                        aria-describedby="basic-addon2"></input>
                        <div class="input-group-append">
                            <input class="btn btn-primary btn-block btn-round" type="submit" 
                            value="Checar"></input>
                        </div>
                        </div>
                     </form>


                    <table class="table table-hover">
                    <thead>

                    <tr>
                        <th scope="col">Cód</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Fornecedor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                            include_once 'detalhesProduto.php'

                        ?>
                        <?php
                        //retorno produtos
                        //include_once 'listaProdutoFuncionario.php';
                        ?>
     
                    </tr>
                </tbody>
                </table>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0" style="margin: auto;width: 100%;bottom: 0; position: fixed;">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2021 <a href="index.html" class="font-weight-bold ml-1"
                                target="_blank">DMW</a>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- Scripts 
    <div class="prod"></div>
    <script>
        //Função ajax
        $(function () {
            $('.formProd').submit(function () { //Linha para submit, quando o usuário apertar o botão
                $.ajax({
                    url: 'detalhesProduto.php', //Arquivo php que fará as validações
                    type: 'post', //Método utilizado
                    data: $('.formProd').serialize(), //Pega as informações inseridas
                    success: function (data) {
                        $('.prod').html(data); //Caso todas as informações foram inseridas irá aparecer o nome abaixo a partir da div "mostrar"
                    }
                });
                return false;
            });
        });
    </script>-->

    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- JS -->
    <!-- <script src="../assets/js/argon.js?v=1.2.0"></script> -->
    <script src="./js/sweetalert.js"></script>
    <script src="./js/sair.js"></script>
</body>
</html>
