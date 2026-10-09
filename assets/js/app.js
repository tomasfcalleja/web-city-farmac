/*
 * Menú mobile: abre y cierra el menú del sitio y el lateral del panel.
 *
 * Cada botón con el atributo data-menu indica en aria-controls el id
 * de la lista que muestra/oculta. aria-expanded le avisa a los lectores
 * de pantalla si el menú está abierto ("true") o cerrado ("false").
 */
document.querySelectorAll('[data-menu]').forEach(function (boton) {
    var menu = document.getElementById(boton.getAttribute('aria-controls'));

    boton.addEventListener('click', function () {
        var abierto = boton.getAttribute('aria-expanded') === 'true';
        boton.setAttribute('aria-expanded', abierto ? 'false' : 'true');
        menu.classList.toggle('hidden');
    });
});
