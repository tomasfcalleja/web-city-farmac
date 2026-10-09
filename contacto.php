<?php
// Controlador: contacto (sitio público)
require __DIR__ . '/config.php';

vista('publico/contacto', [
    'titulo'  => 'Contáctenos',
    'seccion' => 'contacto',
]);
