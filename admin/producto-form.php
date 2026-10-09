<?php
// Controlador: alta y edición de producto (panel)
require __DIR__ . '/../config.php';

vista('admin/producto-form', [
    'titulo'  => 'Producto',
    'seccion' => 'productos',
], 'admin');
