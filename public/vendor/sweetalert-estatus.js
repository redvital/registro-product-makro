$('.formulario-estatus').submit(function(e) {
    e.preventDefault();
   
    Swal.fire({
        title: '¿Deseas Cambiar el status?',
        text: "¡Si lo inactiva no podrá realizar ninguna acción con este registro!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar!',
        confirmButtonText: '¡Sí, Ináctivarlo!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })  
});