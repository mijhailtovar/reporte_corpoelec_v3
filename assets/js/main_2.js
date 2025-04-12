const buttonEl = document.querySelector('.menu-toggle');

buttonEl.addEventListener('click', () => {
    const menu = document.querySelector('.submenu');
    menu.classList.toggle('active');
    //console.log("Click");
});

// Opcional: Cerrar el menú al hacer clic fuera de él
/*
document.addEventListener('click', (event) => {
    const menu = document.querySelector('.submenu');
    console.log( menu.classList);
    if (!menu.contains(event.target) && menu.classList.contains('active')) { // Cambiado a .menu
        //console.log("entro aqui");
        menu.classList.toggle('active');
    }
});
*/