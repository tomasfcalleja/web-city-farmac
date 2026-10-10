<?php
// Controlador: alta y edición de marca (panel)
//   admin/marca-form.php        → "Nueva marca"
//   admin/marca-form.php?id=3   → "Modificar ..."
require __DIR__ . '/../config.php';

// ---------- 1. ¿Alta o edición? ----------
$id = (int) ($_GET['id'] ?? 0);
$marca = null;
if ($id) {
    $marca = obtener_marca($id);
    if (!$marca) {
        mostrar_404('admin');
    }
}

// ---------- 2. Envío del formulario ----------
// SIMULADO: no se guarda nada. PARCIAL 2: acá se valida $_POST y se hace el INSERT o UPDATE.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $alerta = alerta_simulada($marca ? 'Cambios en "' . $nombre . '" guardados' : 'Marca "' . $nombre . '" creada');
}

$titulo = $marca ? 'Modificar ' . $marca['nombre'] : 'Nueva marca';

vista('admin/marca-form', [
    'titulo'     => $titulo,
    'seccion'    => 'marcas',
    'marca'      => $marca,
    'alerta'     => $alerta,
    'encabezado' => [
        'titulo' => $titulo,
        'volver' => ['texto' => 'Volver a marcas', 'url' => 'admin/marcas.php'],
    ],
], 'admin');
