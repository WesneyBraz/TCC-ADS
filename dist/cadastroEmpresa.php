<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro Empresa</title>
    <!-- Favicon --> 
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- alerta css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                            <h3 class="text-center font-weight-light my-4">Cadastre sua Empresa!</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="frmCadastro" name="frmCadastro" class="formEmp">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="nome">Nome:</label>
                                            <input class="form-control meucampo py-4" id="nome" name="nome" type="text"
                                                placeholder="Nome fantasia..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="email">Email:</label>
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
                                            <input class="form-control py-4" id="telefone" name="telefone"
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
                                            <input class="form-control py-4" name="cep" type="text" id="cep"
                                                size="10" maxlength="9" onblur="pesquisacep(this.value);"
                                                placeholder="00.000-000" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="rua">Lougradoro:</label>
                                            <input class="form-control py-4" id="rua" name="rua" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="complemento">Complemento:</label>
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
                                            <label class=" mb-1" for="bairro">Bairro:</label>
                                            <input class="form-control py-4" id="bairro" name="bairro" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class=" mb-1" for="cidade">Cidade:</label>
                                            <input class="form-control py-4" id="cidade" name="cidade" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="uf">Estado:</label>
                                            <input class="form-control py-4" id="uf" name="uf" type="text"
                                                placeholder="Digite seu endereço..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" mb-1" for="pais">País:</label>
                                            <input class="form-control py-4" id="pais" name="pais" type="text"
                                                placeholder="Digite seu País..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="senha">Senha:</label>
                                            <input class="form-control py-4" id="senha" name="senha" type="password"
                                                placeholder="Digite sua senha..." />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1" for="confirma_senha">Confirme
                                                sua senha:
                                            </label>
                                            <input class="form-control py-4" id="confirma_senha" name="confirma_senha"
                                                type="password" placeholder="Digite novamente a senha..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>
                                                Minímo 8 digitos e máximo de 10 contendo uma letra maiúscula e
                                                minúscula, um número e um
                                                caractere especial.
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0 text-white"><input class="btn btn-primary btn-block"
                                        id="botao" type="submit" onclick="return validarCadastro();"></input>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="loginEmpresa.php">Possui uma conta? Vá para o login!</a>
                            </div>
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
    <!--  teste -->
    <div class="emp"></div>
    <!-- Core -->
    <script>
        //Função ajax
        $(function () {
            $('.formEmp').submit(function () { //Linha para submit, quando o usuário apertar o botão
                $.ajax({
                    url: 'cadastraEmpresa.php', //Arquivo php que fará as validações
                    type: 'post', //Método utilizado
                    data: $('.formEmp').serialize(), //Pega as informações inseridas
                    success: function (data) {
                        $('.emp').html(data); //Caso todas as informações foram inseridas irá aparecer o nome abaixo a partir da div "mostrar"
                    }
                });
                return false;
            });
        });
    </script>
    <!--  teste -->
    <!-- Core -->
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
    <script src="./js/cadastroEmpresa.js"></script>

</body>

</html>