<?php
// Controlador: alta y edición de marca (panel)
require __DIR__ . '/../config.php';

vista('admin/marca-form', [
    'titulo'  => 'Marca',
    'seccion' => 'marcas',
], 'admin');
