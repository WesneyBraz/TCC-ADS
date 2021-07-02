<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Empresa</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                    <h6 class="navbar-heading p-0">
                        <span class="docs-normal">Acesso:</span>
                    </h6>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                            <i class="bi-house-door" style="font-size: 1rem; color: cornflowerblue;"></i>
                                <span class="nav-link-text">Home</span>
                            </a>
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
                        <div class="card-body">
                            <h3 class="text-center font-weight-light my-4">Olá!, indentifique-se:</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" name="frmCadastro" action="verificaLoginEmpresa.php">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" id="email" name="email" type="email" placeholder="Coloque seu melhor email..." />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPassword">Senha</label>
                                    <input class="form-control py-4" id="senha" name="senha" type="password" autocomplete="off" maxlength="10" placeholder="Informe sua senha..." />
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                        <label class="custom-control-label" for="rememberPasswordCheck">Lembrar
                                            da Senha</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-3">
                                    <a class="small" href="password.php">Esqueci minha Senha</a>
                                    <input class="btn btn-primary text-white" id="botao" type="submit" value="Login" onclick="checkForm()"></input>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="cadastroEmpresa.php">Cadastrar empresa</a>
                                    </div>
                                </div>
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
                            &copy; 2021<a href="index.html" class="font-weight-bold ml-1" target="_blank">DMW</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!--Scripts -->
            <!-- Core -->
            <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
            <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
            <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
            <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <!-- JS -->
            <script src="./js/sweetalert.js"></script>
            <script src="./js/scripts.js"></script>
            <script src="./js/loginEmpresa.js"></script>
</body>

</html>