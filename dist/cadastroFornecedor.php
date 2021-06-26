<?php
include('verificaSessao2.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro Fornecedor</title>
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
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Acesso:</span>
                    </h6>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="cadastroCliente.php">
                                <i class="ni ni-single-02 text-primary"></i>
                                <span class="nav-link-text">Cliente</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastroFuncionario.php">
                                <i class="ni ni-circle-08 text-primary"></i>
                                <span class="nav-link-text">Funcionario</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produto.php">
                                <i class="ni ni-cart text-primary"></i>
                                <span class="nav-link-text">Produto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cadastroFornecedor.php">
                                <i class="ni ni-delivery-fast text-primary"></i>
                                <span class="nav-link-text">Fornecedor</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ordemservicoEmpresa.php">
                                <i class="ni ni-bullet-list-67 text-primary"></i>
                                <span class="nav-link-text">Ordem de Serviço</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="consultar.php">
                                <i class="ni ni-bullet-list-67 text-primary"></i>
                                <span class="nav-link-text">Consultar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button id="sair" type="button" class="text-dark nav-link"
                                style="background-color: transparent;
                            border: 0;color: #00f;cursor: pointer;display: inline-block;padding:0;margin:1em;position: relative;text-decoration: none;">
                                <i class="ni ni-ui-04 text-danger"></i>
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
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Cadastre seus Fornecedores!</h3>
                        </div>
                        <div class="card-body">
                            <form name="frmCadastro" method="post" action="" class="formFor" id="frmCadastro"
                                onsubmit="validarCadastro()">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="">Nome:</label>
                                            <input class="form-control meucampo py-4" id="nome" name="nome" type="text"
                                                placeholder="Nome fantasia..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="#">Email:</label>
                                            <input class="form-control py-4" id="email" name="email" type="email"
                                                aria-describedby="emailHelp"
                                                placeholder="Coloque seu melhor email..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="cnpj">CNPJ:</label>
                                            <input class="form-control py-4" id="cnpj" name="cnpj" type="text"
                                                placeholder="00.000.000/0000-00" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="telefone">Telefone:</label>
                                            <input class="form-control py-4 numeric" id="telefone" name="telefone"
                                                type="text" placeholder="(00) 00000-0000" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="celular">Celular:</label>
                                            <input class="form-control py-4" id="celular" type="text" name="celular"
                                                placeholder="(00) 00000-0000" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="cep">Cep:</label>
                                            <input class="form-control py-4" name="cep" type="text" id="cep" value=""
                                                size="10" maxlength="9" onblur="pesquisacep(this.value);"
                                                placeholder="00.000-000" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="">Lougradoro:</label>
                                            <input class="form-control py-4" id="rua" name="rua" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="">Complemento:</label>
                                            <input class="form-control py-4" id="complemento" name="complemento"
                                                type="text" placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class=" mb-1" for="numero">N°:</label>
                                            <input class="form-control py-4" id="numero" name="numero" type="number" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" mb-1" for="">Bairro:</label>
                                            <input class="form-control py-4" id="bairro" name="bairro" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class=" mb-1" for="">Cidade:</label>
                                            <input class="form-control py-4" id="cidade" name="cidade" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="">Estado:</label>
                                            <input class="form-control py-4" id="uf" name="uf" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="">País:</label>
                                            <input class="form-control py-4" id="pais" name="pais" type="text"
                                                placeholder="Digite seu País..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0 text-white">
                                    <input class="btn btn-primary btn-block" type="Submit" value="Cadastrar"
                                        onclick="validarCadastro();">
                                    </input>
                                </div>
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
                            &copy; 2021 <a href="index.html" class="font-weight-bold ml-1" target="_blank">DMW</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="for"></div>
    <!-- Core -->
    <script>
        //Função ajax
        $(function () {
            $('.formFor').submit(function () { //Linha para submit, quando o usuário apertar o botão
                $.ajax({
                    url: './php/createFor.php', //Arquivo php que fará as validações
                    type: 'post', //Método utilizado
                    data: $('.formFor').serialize(), //Pega as informações inseridas
                    success: function (data) {
                        $('.for').html(data); //Caso todas as informações foram inseridas irá aparecer o nome abaixo a partir da div "mostrar"
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
    <script src="./js/cadastroFornecedor.js"></script>
    <script src="./js/sair.js"></script>


</body>

</html>