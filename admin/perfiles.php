<?php
// Controlador: listado de perfiles (roles del panel)
require __DIR__ . '/../config.php';

// ---------- 1. Acción enviada desde la tabla (Activar / Inactivar) ----------
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $perfil = obtener_perfil((int) ($_POST['id'] ?? 0));
    $accion = $_POST['accion'] ?? '';

    // PARCIAL 2: acá va el UPDATE perfiles SET activo = 1/0 WHERE id = ?
    if ($perfil && in_array($accion, ['activar', 'inactivar'])) {
        $alerta = alerta_simulada('Perfil "' . $perfil['nombre'] . '" ' . ($accion === 'activar' ? 'activado' : 'inactivado'));
    } else {
        $alerta = ['tipo' => 'error', 'mensaje' => 'No se pudo realizar la acción.'];
    }
}

// ---------- 2. Datos para la vista ----------
vista('admin/perfiles', [
    'titulo'     => 'Perfiles',
    'seccion'    => 'perfiles',
    'alerta'     => $alerta,
    'perfiles'   => obtener_perfiles(),
    'encabezado' => [
        'titulo'      => 'Perfiles',
        'descripcion' => 'Cada perfil define a qué secciones del panel pueden entrar sus usuarios.',
        'boton'       => ['texto' => 'Nuevo perfil', 'url' => 'admin/perfil-form.php'],
    ],
    'vacio'      => [
        'mensaje' => 'No hay perfiles cargados.',
        'accion'  => ['texto' => 'Nuevo perfil', 'url' => 'admin/perfil-form.php'],
    ],
], 'admin');
