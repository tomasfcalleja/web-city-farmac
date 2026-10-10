<?php
// Controlador: listado de marcas (panel)
require __DIR__ . '/../config.php';

// ---------- 1. Acción enviada desde la tabla (Activar / Inactivar) ----------
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = obtener_marca((int) ($_POST['id'] ?? 0));
    $accion = $_POST['accion'] ?? '';

    // PARCIAL 2: acá va el UPDATE marcas SET activo = 1/0 WHERE id = ?
    if ($marca && in_array($accion, ['activar', 'inactivar'])) {
        $alerta = alerta_simulada('Marca "' . $marca['nombre'] . '" ' . ($accion === 'activar' ? 'activada' : 'inactivada'));
    } else {
        $alerta = ['tipo' => 'error', 'mensaje' => 'No se pudo realizar la acción.'];
    }
}

// ---------- 2. Datos para la vista ----------
vista('admin/marcas', [
    'titulo'     => 'Marcas',
    'seccion'    => 'marcas',
    'alerta'     => $alerta,
    'marcas'     => obtener_marcas_admin(),
    'encabezado' => [
        'titulo' => 'Marcas',
        'boton'  => ['texto' => 'Nueva marca', 'url' => 'admin/marca-form.php'],
    ],
    'vacio'      => [
        'mensaje' => 'No hay marcas cargadas.',
        'accion'  => ['texto' => 'Nueva marca', 'url' => 'admin/marca-form.php'],
    ],
], 'admin');
