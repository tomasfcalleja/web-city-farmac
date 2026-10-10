<?php
// Controlador: inicio de sesión (panel, layout sin menú lateral)
require __DIR__ . '/../config.php';

// SIMULADO: al enviar el formulario no se valida nada, se entra directo al panel.
// PARCIAL 2: acá se busca el usuario por email, se verifica la contraseña con
// password_verify() y se guarda en $_SESSION. Si falla, se muestra una alerta de error.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ' . url('admin/index.php'));
    exit;
}

vista('admin/login', [
    'titulo' => 'Iniciar sesión',
], 'auth');
