$('.anular').submit(function(e) {
    e.preventDefault();
   
    Swal.fire({
        title: '¿Deseas Anular el documento?',
        text: "¡Si anula este documento no prodrá ser revertido!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '',
        cancelButtonText: 'Cancelar!',
        confirmButtonText: '¡Sí, ánulalo!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })  
});