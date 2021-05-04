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
//AlertaSenha
function alertaSenha() {
    Swal.fire({
        title: 'Senhas diferentes, digite senhas iguais!',
        icon: 'error',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    })
}

//Máscaras, puxadas pelos id dos inputs>
$(document).ready(function () {
    $("#cpf").mask("000.000.000-00");
    $("#cep").mask("00000-000");
    $("#celular").mask("(00) 00000-0009");
    $("#telefone").mask("(00) 0000-0000");
    //Função reconhece se será nr com o "9" na frente ou não
    $("#celular").blur(function (event) {
        if ($(this).val().length == 15) {
            $("#celular").mask("(00) 00000-0009")
        }
        else {
            $("#celular").mask("(00) 0000-00009")
        }
    })
})

//aceita somente letras
jQuery('.meucampo').keyup(function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, '');
});

//Validar Modal
function validarModal() {
    //nome
    let nomeDepartamento = frmCadastro.nomeDepartamento;
    if (nomeDepartamento.value == "" ||
        nomeDepartamento.value == null) {
        nomeDepartamento.focus();
        alerta();
        return false;
    }
    return true;
}


//validar cadastro
function validarCadastro() {
    //nome
    let nome = frmCadastro2.nome;
    if (nome.value == "" ||
        nome.value == null ||
        nome.value.length < 4) {
        nome.focus();
        alerta();
        return false;
    }

    //cpf
    let cpf = document.getElementById("cpf").value;
    if (typeof cpf !== "string") return false
    cpf = cpf.replace(/[\s.-]*/igm, '')
    if (
        cpf.length !== 11 || !Array.from(cpf).filter(e => e !== cpf[0]).length
    ) {
        alerta();
        return false
    }
    let soma = 0
    let resto
    for (let i = 1; i <= 9; i++)
        soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11)) resto = 0
    if (resto != parseInt(cpf.substring(9, 10))) return false
    soma = 0
    for (let i = 1; i <= 10; i++)
        soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11)) resto = 0
    if (resto != parseInt(cpf.substring(10, 11))) return false;


    //telefone
    let telefone = frmCadastro2.telefone;
    if (telefone.value == "" || telefone.value == null) {
        telefone.focus();
        alerta();
        return false;

    } else if (telefone.value == "00000000000" ||
        telefone.value == "11111111111" ||
        telefone.value == "22222222222" ||
        telefone.value == "33333333333" ||
        telefone.value == "44444444444" ||
        telefone.value == "55555555555" ||
        telefone.value == "66666666666" ||
        telefone.value == "77777777777" ||
        telefone.value == "88888888888" ||
        telefone.value == "99999999999") {

        telefone.focus();
        alerta();
        return false;
    }

    //Celular
    let celular = frmCadastro2.celular;
    if (celular.value == "" || celular.value == null) {
        celular.focus();
        alerta();
        return false;

    } else if (celular.value == "00000000000" ||
        celular.value == "11111111111" ||
        celular.value == "22222222222" ||
        celular.value == "33333333333" ||
        celular.value == "44444444444" ||
        celular.value == "55555555555" ||
        celular.value == "66666666666" ||
        celular.value == "77777777777" ||
        celular.value == "88888888888" ||
        celular.value == "99999999999") {
        celular.focus();
        alerta();
        return false;

    }
    
    //Validação da senha
    // Pelo menos uma letra maiúscula
    // Pelo menos uma letra minúscula
    // Pelo menos um dígito
    // Pelo menos um caractere especial
    let senha = document.getElementById('senha').value;
    let regex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    if (senha.value == "") {
        alerta();
        return false;
    }
    else if (!regex.test(senha)) {
        alerta();
        return false;
    }
    var confirma_senha = frmCadastro2.confirma_senha;
    if (confirma_senha.value == "" || confirma_senha.value == null) {
        confirma_senha.focus();
        alertaSenha();
        return false;

    }
    senha = document.frmCadastro2.senha.value;
    confirma_senha = document.frmCadastro.confirma_senha.value;

    if (senha != confirma_senha)
        alertaSenha();
    return true;
}



