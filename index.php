<?php
// Controlador: página de inicio (sitio público)
require __DIR__ . '/config.php';

vista('publico/index', [
    'titulo'  => 'Inicio',
    'seccion' => 'inicio',
]);
