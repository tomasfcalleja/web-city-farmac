<?php
// Controlador: listado de perfiles (panel)
require __DIR__ . '/../config.php';

vista('admin/perfiles', [
    'titulo'  => 'Perfiles',
    'seccion' => 'perfiles',
], 'admin');
