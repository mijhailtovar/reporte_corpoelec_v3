const menu = document.getElementById('menu'); // Cambiado a .menu
const menuToggle = document.querySelector('.menu-toggle');
const submenu = document.querySelector('.submenu');

//esta linea pone el stilo del submenu en oculto para que reaccione al primer click
submenu.style.display = 'none';

// Opción 1: Desplegar al hacer clic
menuToggle.addEventListener('click', () => {
  //submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
  if (submenu.style.display === 'none') {
    submenu.style.display = 'block';
  }else{
    submenu.style.display = 'none';
  }
});

// Opcional: Desplegar al pasar el ratón (y ocultar al quitarlo)
/*
menuToggle.addEventListener('mouseenter', () => {
  submenu.style.display = 'block';
});

menu.addEventListener('mouseleave', () => { // Cambiado a .menu
  submenu.style.display = 'none';
});
*/

// Opcional: Cerrar el menú al hacer clic fuera de él
document.addEventListener('click', (event) => {
  if (!menu.contains(event.target) && submenu.style.display === 'block') { // Cambiado a .menu
    submenu.style.display = 'none';
  }
});