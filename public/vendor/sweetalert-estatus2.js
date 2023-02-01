$('.formulario-estatus2').submit(function(e) {
    e.preventDefault();
   
    Swal.fire({
        title: '¿Deseas Cambiar el status?',
        text: "¡Si activa este registro prodrá ser utilizado nuevamente!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar!',
        confirmButtonText: '¡Sí, áctivalo!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })  
});