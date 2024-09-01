// Scripts para el menú dinámico
document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');

    // Toggle para abrir y cerrar el menú
    menuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('open');
    });
});
