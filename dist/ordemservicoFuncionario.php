<?php
include('verificaSessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ordem de Serviço</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
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
                                <i class="ni ni-bullet-list-67 text-primary"></i>
                                <span class="nav-link-text">Minhas Ordens de Serviço</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produtoFuncionario.php">
                                <i class="ni ni-cart text-primary"></i>
                                <span class="nav-link-text">Produto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button id="sair" class="text-dark nav-link"
                                style="background-color: transparent;
                            border: 0;color: #00f;cursor: pointer;display: inline-block;padding:0;margin:1em;position: relative;text-decoration: none;">
                                <i class="ni ni-ui-04 text-danger"></i>
                                Sair</button>
                        </li>
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
                    <h2 class="mb-0">Ordem de serviço:</h2>
                </div>
                <!-- Light table -->
                <div class="input-group mb-3 p-2">
                    <input type="text" class="form-control" placeholder="Pesquisar"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <span class="ni ni-active-40">
                        </button>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Ordem de Serviço</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Saida</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Esteira Parou</th>
                        <td>05/04/2021</td>
                        <td>05/04/2021</td>
                        <td>Atrasado</td>
                        <td>
                        <!-- Modal Ver -->
                        <span class="badge badge-dot mr-4">
                            <button class="btn-sm btn-group btn-primary" data-toggle="modal"
                                data-target="#verModa">
                                + Ver
                            </button>
                            <div class="modal fade" id="verModa" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                    <div class="modal-header">
                                        <h5 class="modal-title row">Ordem de Serviço:</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="row" >Descrição:</h4>
                                            <p class="row">Esteira Parou,o equipamento se encontra em pessimo estado ...</p>
                                            <h4 class="row" >Diagnostico:</h4>
                                            <p class="row">O diagnostico foi feito de acordo com ...</p>
                                            <h4 class="row" >Departamento:</h4>
                                            <p class="row">TI</p>
                                            <h4 class="row" >Funcionario:</h4>
                                            <p class="row">José</p>
                                            <h4 class="row" >Entrada:</h4>
                                            <p class="row">05/04/2021</p>
                                            <h4 class="row" >Saída:</h4>
                                            <p class="row">05/04/2021</p>
                                            <h4 class="row" >Status:</h4>
                                            <p class="row">Atrasado</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button  type="button" class="btn btn-danger"
                                                data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </span></td>
                <td>
                <!-- Modal Editar -->
                <span class="badge badge-dot mr-4">
                    <button class="btn-sm btn-group btn-primary" data-toggle="modal" data-target="#editarModal">
                        + Editar
                    </button>
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-title text-center">
                                        <h3>Editar Ordem de Serviço</h3>
                                    </div>
                                    <div class="d-flex flex-column mx-5 my-5">
                                        <form>
                                            <div class="form-group row ">
                                                <label for="exampleFormControlTextarea1" class="">
                                                    Descrição:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="2"
                                                    placeholder="Esteira Parou,o equipamento se encontra em pessimo estado ..."></textarea>
                                            </div>
                                            <div class="form-group row ">
                                                <label for="exampleFormControlTextarea1"
                                                    class="">Diagnostico:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="2"
                                                    placeholder="O diagnostico foi feito de acordo com........"></textarea>
                                            </div>
                                            <div class="form-group row">
                                                <label class="my-1 mr-2"
                                                    for="inlineFormCustomSelectPref">Departamento:</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Eletrico...</option>
                                                    <option value="1">Mecanico</option>
                                                    <option value="2">TI</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="my-1 mr-2"
                                                    for="inlineFormCustomSelectPref">Funcionario:</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>José...</option>
                                                    <option value="1">João</option>
                                                    <option value="2">Pedro</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="my-1 mr-2"
                                                    for="inlineFormCustomSelectPref">Cliente:</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Alice...</option>
                                                    <option value="1">Maria</option>
                                                    <option value="2">Lucas</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="my-1 mr-2"
                                                    for="inlineFormCustomSelectPref">Produto:</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Esteira...</option>
                                                    <option value="1">Placa</option>
                                                    <option value="2">Tela</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-datetime-local-input"
                                                    class=" my-1 mr-2">Entrada:</label>
                                                <input class="form-control" type="datetime-local"
                                                    value="2018-11-23T10:30:00" id="example-datetime-local-input">
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-datetime-local-input"
                                                    class=" my-1 mr-2">Saída:</label>
                                                <input class="form-control" type="datetime-local"
                                                    value="2018-11-23T10:30:00" id="example-datetime-local-input">
                                            </div>
                                            <div class="form-group row">
                                                <label class="my-1 mr-2"
                                                    for="inlineFormCustomSelectPref">Status:</label>
                                                <select class="custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Atrasado</option>
                                                    <option value="1">Concluido</option>
                                                    <option value="2">Em processo</option>
                                                </select>
                                            </div>
                                            <button type="button"
                                                class="btn btn-success btn-block btn-round">Salvar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
            </td>
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
                        &copy; 2021 <a href="index.html" class="font-weight-bold ml-1" target="_blank">DMW</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</div>
</div>
</div>
    <!-- Scripts -->
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