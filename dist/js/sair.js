//Alerta Sair
function alerta(){
     Swal.fire({
            title: 'Deseja sair?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sair'
}).then((result) => {
  if (result.isConfirmed) {
   location.href = "http://localhost/tcc/TCC-ADS/dist/";
  }
})
 };
 //Função Onclick Sair
document.getElementById("sair").onclick = function () {
        alerta();
    };