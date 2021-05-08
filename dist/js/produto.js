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
    $(".valorProduto").mask('#.##0,00', { reverse: true });
})

//Validar Modal
function validarProduto() {
    //Nome do produto
    let produto = frmCadastro.nomeProduto;
    if (produto.value == "" ||
        produto.value == null) {
        produto.focus();
        alerta();
        return false;
    }

    //Nome do fornecedor
    if (document.getElementById("nomeFornecedor").selectedIndex == "") {
        nomeFornecedor.focus();
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

     //Nome categoria
    let categoria = frmCadastro.categoria;
    if (categoria.value == "" ||
        categoria.value == null) {
        categoria.focus();
        alerta();
        return false;
    }

    //Estoque
    let estoque = frmCadastro.estoque;
    if (estoque.value == "") {
        estoque.focus();
        alerta();
        return false;
    }
    
    //Valor do Produto
    let valor = frmCadastro.valorProduto;
    if (valor.value == "") {
        valor.focus();
        alerta();
        return false;
    }

    return true;
}
