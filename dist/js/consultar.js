//Alerta
function alerta() {
    Swal.fire({
        title: 'Tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, exclua!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Excluído!',
                'Foi excluído com sucesso.',
                'success'
            )
        }
    })
}

function excluir() {
    document.getElementById('excluir').onclick
    alerta();
}