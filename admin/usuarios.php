<?php
// Controlador: listado de usuarios del panel
require __DIR__ . '/../config.php';

// ---------- 1. Acción enviada desde la tabla (Activar / Inactivar) ----------
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = obtener_usuario((int) ($_POST['id'] ?? 0));
    $accion = $_POST['accion'] ?? '';

    // PARCIAL 2: acá va el UPDATE usuarios SET activo = 1/0 WHERE id = ?
    if ($usuario && in_array($accion, ['activar', 'inactivar'])) {
        $alerta = alerta_simulada('Usuario "' . $usuario['nombre'] . '" ' . ($accion === 'activar' ? 'activado' : 'inactivado'));
    } else {
        $alerta = ['tipo' => 'error', 'mensaje' => 'No se pudo realizar la acción.'];
    }
}

// ---------- 2. Datos para la vista ----------
vista('admin/usuarios', [
    'titulo'     => 'Usuarios',
    'seccion'    => 'usuarios',
    'alerta'     => $alerta,
    'usuarios'   => obtener_usuarios(),
    'encabezado' => [
        'titulo' => 'Usuarios',
        'boton'  => ['texto' => 'Nuevo usuario', 'url' => 'admin/usuario-form.php'],
    ],
    'vacio'      => [
        'mensaje' => 'No hay usuarios cargados.',
        'accion'  => ['texto' => 'Nuevo usuario', 'url' => 'admin/usuario-form.php'],
    ],
], 'admin');
