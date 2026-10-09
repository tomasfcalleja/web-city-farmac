<?php
// Controlador: inicio de sesión (panel, layout sin menú lateral)
require __DIR__ . '/../config.php';

vista('admin/login', [
    'titulo' => 'Iniciar sesión',
], 'auth');
