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
    this.value = this.value.replace(/[^a-zA-Z]/g, ' ');
});

//Validar Campos 
$(document).ready(function(){
				$("#frmCadastro").validate({
					rules:{
						nome: {
							required: true,
							minlength: 3,
						},
                        email: {
                            required: true,
                        },
                        cnpj: {
                            required: true,
                        },
                        telefone: {
                            required: true,
                        },
                        celular: {
                            required: true,
                        },
                        cep: {
                            required: true,
                        },
                        rua: {
                            required: true,
                        },
                        bairro: {
                            required: true,
                        },
                        cidade: {
                            required: true,
                        },
                        uf: {
                            required: true,
                        },
                        numero: {
                            required: true,
                        },
                        pais: {
                            required: true,
                        },
                        senha: {
                            required: true,
                        },
                        confirma_senha: {
                            required: true,
                        }
					}
				})
			})

//Função validar cep
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
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};
