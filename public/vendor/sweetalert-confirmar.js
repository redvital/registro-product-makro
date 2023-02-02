$('.confirmar').submit(function(e) {
    e.preventDefault();
   
    Swal.fire({
        title: '¿Deseas procesar el documento?',
        text: "¡Si Procesa este documento no prodrá ser modificado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        cancelButtonText: '¡No, Cancelar!',
        confirmButtonText: '¡Sí, Deseo Procesarlo!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })  
});