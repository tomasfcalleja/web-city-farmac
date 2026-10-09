<?php
// Controlador: listado de usuarios (panel)
require __DIR__ . '/../config.php';

vista('admin/usuarios', [
    'titulo'  => 'Usuarios',
    'seccion' => 'usuarios',
], 'admin');
