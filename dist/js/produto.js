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
    $("#valorProduto").mask('#.##0,00', { reverse: true });
})


//aceita somente letras
jQuery('.meucampo').keyup(function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
});

//Validar Modal
function validarModal() {
    //nome
    let nome = frmCadastro.nomeProduto;
    if (nome.value == "" ||
        nome.value == null ||
        nome.value.length < 4) {
        nome.focus();
        alerta();
        return false;
    }

    //Descrição
    let descricao = frmCadastro.descricao;
    if (descricao.value == "" ||
        descricao.value == null) {
        descricao.focus();
        alerta();
        return false;
    }

    //Fornecedor
    if (document.getElementById("nomeFornecedor").selectedIndex == "") {
        nomeFornecedor.focus();
        alerta();
        return false;
    }

    //Departamento
    if (document.getElementById("nomeDepartamento").selectedIndex == "") {
        nomeDepartamento.focus();
        alerta();
        return false;
    }

    //Valor do Produto
    let valorProduto = frmCadastro.valorProduto;
    if(valorProduto.value == ""){
        valorProduto.focus();
        alerta();
        return false;
    }

    //Estoque
    let estoque = frmCadastro.estoque;
    if(estoque.value == ""){
        estoque.focus();
        alerta();
        return false;
    }
    
    return true;
}
