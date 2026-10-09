<?php
// Controlador: alta y edición de usuario (panel)
require __DIR__ . '/../config.php';

vista('admin/usuario-form', [
    'titulo'  => 'Usuario',
    'seccion' => 'usuarios',
], 'admin');
