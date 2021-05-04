var capturando = "";
function capturar () {
    capturando = document.getElementById('valor').value;
    document.getElementById('valorDigitado').innerHTML = capturando;
}
//Alerta
function alerta() {
    Swal.fire({
        title: 'Preencha os campos vazios!',
        icon: 'error',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    })
}

//Mascara para valor do produto
$(document).ready(function () {
    $(".valor").mask('#.##0,00', { reverse: true });
})

//Validar Modal
function validarModal() {
    //Descrição
    let descricao = frmCadastro.descricaoOs;
    if (descricao.value == "" ||
        descricao.value == null) {
        descricao.focus();
        alerta();
        return false;
    }

    //Diagnostico
    let diagnostico = frmCadastro.diagnostico;
    if (diagnostico.value == "" ||
        diagnostico.value == null) {
        diagnostico.focus();
        alerta();
        return false;
    }

    //Departamento
    if (document.getElementById("nomeDepartamento").selectedIndex == "") {
        nomeDepartamento.focus();
        alerta();
        return false;
    }

    //Funcionario
    if (document.getElementById("nomeFuncionario").selectedIndex == "") {
        nomeFuncionario.focus();
        alerta();
        return false;
    }

    //Cliente
    if (document.getElementById("nomeCliente").selectedIndex == "") {
        nomeCliente.focus();
        alerta();
        return false;
    }

    //Produto
    if (document.getElementById("nomeProduto").selectedIndex == "") {
        nomeProduto.focus();
        alerta();
        return false;
    }

    //Valor do Produto
    let valor = frmCadastro.valorOs;
    if (valor.value == "") {
        valor.focus();
        alerta();
        return false;
    }

    //Estoque
    let lucro = frmCadastro.lucro;
    if (lucro.value == "") {
        lucro.focus();
        alerta();
        return false;
    }

    return true;
}
