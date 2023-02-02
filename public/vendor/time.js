sessionTimeout({
    //El texto en el botón de cierre de sesión.
    logOutBtnText:'Cerrar sesion ahora!' ,
    //El texto del botón "permanecer conectado".
    stayConnectedBtnText: 'Mantener la sesion activa' ,
    //Tiempo en salir la alerta en milisegundos
    warnAfter: 276000,
    //warnAfter: 276000,
    //Una vez transcurrido el tiempo de espera, el navegador del usuario será dirigido a esta URL.
    timeOutAfter: 300100,
    //timeOutAfter: 300100,
    // timeOutUrl: 'login',
    logOutUrl: "auth/login",
    timeOutUrl: "/",
    message: 'Alerta, Deseas mantener la sesion activa?',
    confirmButtonColor: '#d33',
});