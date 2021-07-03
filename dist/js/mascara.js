//Máscaras, puxadas pelos id dos inputs>
$(document).ready(function () {
    $("#cnpj").mask("00.000.000/0000-00");
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

//Mascara para valor
$(document).ready(function () {
    $(".valor").mask('#.##0,00', { reverse: true });
})

//aceita somente letras
jQuery('.meucampo').keyup(function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, ' ');
});
