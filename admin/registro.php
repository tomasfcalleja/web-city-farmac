<?php
// Controlador: registro de usuarios (panel, layout sin menú lateral)
require __DIR__ . '/../config.php';

// SIMULADO: no se crea ninguna cuenta, solo se muestra el mensaje de éxito.
// PARCIAL 2: acá se valida $_POST (email único, que las dos contraseñas coincidan),
// se guarda la contraseña con password_hash() y se inserta el usuario.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alerta = alerta_simulada('Cuenta creada. Ya podés iniciar sesión');
}

vista('admin/registro', [
    'titulo' => 'Crear cuenta',
    'alerta' => $alerta,
], 'auth');
