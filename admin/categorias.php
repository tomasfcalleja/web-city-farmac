<?php
// Controlador: listado de categorías (panel)
//   admin/categorias.php          → categorías principales
//   admin/categorias.php?padre=2  → subcategorías de la categoría 2
require __DIR__ . '/../config.php';

// ---------- 1. Acción enviada desde la tabla (Activar / Inactivar) ----------
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = obtener_categoria((int) ($_POST['id'] ?? 0));
    $accion = $_POST['accion'] ?? '';

    // PARCIAL 2: acá va el UPDATE categorias SET activo = 1/0 WHERE id = ?
    if ($categoria && in_array($accion, ['activar', 'inactivar'])) {
        $alerta = alerta_simulada('Categoría "' . $categoria['nombre'] . '" ' . ($accion === 'activar' ? 'activada' : 'inactivada'));
    } else {
        $alerta = ['tipo' => 'error', 'mensaje' => 'No se pudo realizar la acción.'];
    }
}

// ---------- 2. Filtro "padre", validado ----------
// Tiene que existir y ser principal; si no, se ignora y se muestran las principales.
$padre_id = (int) ($_GET['padre'] ?? 0);
$padre = obtener_categoria($padre_id);
if (!$padre || $padre['padre_id'] !== null) {
    $padre = null;
}

// ---------- 3. Datos para la vista ----------
if ($padre) {
    $encabezado = [
        'titulo' => 'Subcategorías de ' . $padre['nombre'],
        'boton'  => ['texto' => 'Nueva subcategoría', 'url' => 'admin/categoria-form.php?padre=' . $padre['id']],
        'volver' => ['texto' => 'Volver a categorías principales', 'url' => 'admin/categorias.php'],
    ];
} else {
    $encabezado = [
        'titulo' => 'Categorías',
        'boton'  => ['texto' => 'Nueva categoría', 'url' => 'admin/categoria-form.php'],
    ];
}

vista('admin/categorias', [
    'titulo'     => $encabezado['titulo'],
    'seccion'    => 'categorias',
    'alerta'     => $alerta,
    'padre'      => $padre,
    'categorias' => obtener_categorias_admin($padre ? $padre['id'] : null),
    'encabezado' => $encabezado,
    'vacio'      => [
        'mensaje' => 'Esta categoría todavía no tiene subcategorías.',
        'accion'  => $padre ? ['texto' => 'Nueva subcategoría', 'url' => 'admin/categoria-form.php?padre=' . $padre['id']] : null,
    ],
], 'admin');
