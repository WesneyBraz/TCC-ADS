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

//Mascara para valor
$(document).ready(function () {
    $(".valor").mask('#.##0,00', { reverse: true });
})

//Validar Modal
function validarOS() {
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

    //Produto
    if (document.getElementById("produto").selectedIndex == "") {
        nomeProduto.focus();
        alerta();
        return false;
    }

    //Valor
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

    //Status
    let status = frmCadastro.status;
    if (status.value == "" ||
        status.value == null) {
        status.focus();
        alerta();
        return false;
    }

    return true;
}
