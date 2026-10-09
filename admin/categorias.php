<?php
// Controlador: listado de categorías (panel)
require __DIR__ . '/../config.php';

vista('admin/categorias', [
    'titulo'  => 'Categorías',
    'seccion' => 'categorias',
], 'admin');
