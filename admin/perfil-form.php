<?php
// Controlador: alta y edición de perfil (panel)
require __DIR__ . '/../config.php';

vista('admin/perfil-form', [
    'titulo'  => 'Perfil',
    'seccion' => 'perfiles',
], 'admin');
