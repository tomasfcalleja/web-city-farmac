<?php
// Controlador: registro de usuarios (panel, layout sin menú lateral)
require __DIR__ . '/../config.php';

vista('admin/registro', [
    'titulo' => 'Crear cuenta',
], 'auth');
