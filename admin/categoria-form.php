<?php
// Controlador: alta y edición de categoría (panel)
require __DIR__ . '/../config.php';

vista('admin/categoria-form', [
    'titulo'  => 'Categoría',
    'seccion' => 'categorias',
], 'admin');
