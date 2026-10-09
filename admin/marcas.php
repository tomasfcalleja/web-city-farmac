<?php
// Controlador: listado de marcas (panel)
require __DIR__ . '/../config.php';

vista('admin/marcas', [
    'titulo'  => 'Marcas',
    'seccion' => 'marcas',
], 'admin');
