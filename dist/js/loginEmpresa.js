//Alerta
function alerta() {
  Swal.fire({
    title: 'Email ou senha inválidos!',
    icon: 'error',
    showClass: {
      popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
      popup: 'animate__animated animate__fadeOutUp'
    }
  })
}

//Validação do form
function checkForm() {
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
  return true;
}



