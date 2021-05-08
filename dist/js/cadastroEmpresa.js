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
    $("#cnpj").mask("00.000.000/0000-00");
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


//validar cadastro
function validarCadastro() {
    //nome
    let nome = frmCadastro.nome;
    if (nome.value == "" ||
        nome.value == null ||
        nome.value.length < 4) {
        nome.focus();
        alerta();
        return false;
    }

    //email
    let email = document.getElementById('email').value;
    let validationEmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi;
    if (email.value == "") {
        alerta();
        return false;
    }
    else if (!validationEmail.test(email)) {
        alerta();
        return false;
    }

   //CNPJ
    let cnpj = document.getElementById("cnpj").value;
    cnpj = cnpj.replace(/[^\d]+/g, '');
    if (cnpj == '') {
        alerta();
        return false;
    }

    if (cnpj.length != 14) {
        alerta();
        return false;
    }

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999") {
        alerta();
        return false;
    }

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)) {
        alerta();
        return false;
    }
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)) {
        alerta();
        return false;
    }

    //telefone
    let telefone = frmCadastro.telefone;
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
    let celular = frmCadastro.celular;
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

    //cep
    let cep = frmCadastro.cep;
    if (cep.value == "" || cep.value == null) {
        cep.focus();
        alerta();
        return false;

    }

    //complemento
    let complemento = frmCadastro.complemento;
    if (complemento.value == "" || complemento.value == null) {
        complemento.focus();
        alerta();
        return false;

    }

    //numero
    let numero = frmCadastro.numero;
    if (numero.value == "" || numero.value == null) {
        numero.focus();
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
//cep
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alerta();
    }
}

function pesquisacep(valor) {

    //Nova letiável "cep" somente com dígitos.
    let cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        let validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            document.getElementById('cep').value = cep.substring(0, 5)
                + "-"
                + cep.substring(5);

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            //Cria um elemento javascript.
            let script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alerta();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};



