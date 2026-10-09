<?php
// Controlador: listado de productos (sitio público)
require __DIR__ . '/config.php';

vista('publico/productos', [
    'titulo'  => 'Productos',
    'seccion' => 'productos',
]);
