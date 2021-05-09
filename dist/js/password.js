//Alerta
function alerta() {
    Swal.fire({
        title: 'Preencha um email valido!',
        icon: 'error',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    })
}

function validarEmail(){
    //email
    let email = document.getElementById('email').value;
    let regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi;
    if (email.value == "") {
        alerta();
        return false;
    }
    else if (!regex.test(email)) {
        alerta();
        return false;
    }
    return true;
}