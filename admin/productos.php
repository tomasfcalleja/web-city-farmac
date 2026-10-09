<?php
// Controlador: listado de productos (panel)
require __DIR__ . '/../config.php';

vista('admin/productos', [
    'titulo'  => 'Productos',
    'seccion' => 'productos',
], 'admin');
