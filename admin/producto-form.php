<?php
// Controlador: alta y edición de producto (panel)
//   admin/producto-form.php        → "Nuevo producto", formulario vacío
//   admin/producto-form.php?id=4   → "Modificar ...", formulario completo
require __DIR__ . '/../config.php';

// ---------- 1. ¿Alta o edición? ----------
$id = (int) ($_GET['id'] ?? 0);
$producto = null;
if ($id) {
    $producto = obtener_producto($id);
    if (!$producto) {
        mostrar_404('admin');   // vino un id, pero no existe
    }
}

// ---------- 2. Envío del formulario ----------
// SIMULADO: no se guarda nada. PARCIAL 2: acá se valida $_POST, se mueve la imagen
// subida ($_FILES['imagen']) a assets/img/productos/ y se hace el INSERT o UPDATE.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $alerta = alerta_simulada($producto ? 'Cambios en "' . $nombre . '" guardados' : 'Producto "' . $nombre . '" creado');
}

// ---------- 3. Opciones de los selects ----------
// Marcas (todas: si un producto tiene una marca inactiva, tiene que poder verse)
$opciones_marcas = [];
foreach (obtener_marcas_admin() as $marca) {
    $opciones_marcas[] = [
        'valor' => $marca['id'],
        'texto' => $marca['nombre'] . ($marca['activo'] ? '' : ' (inactiva)'),
    ];
}

// Categorías agrupadas: cada principal con sus subcategorías (para agrupar el select con optgroup)
$grupos_categorias = [];
foreach (obtener_categorias_admin() as $principal) {
    $principal['subcategorias'] = obtener_categorias_admin($principal['id']);
    $grupos_categorias[] = $principal;
}

vista('admin/producto-form', [
    'titulo'            => $producto ? 'Modificar ' . $producto['nombre'] : 'Nuevo producto',
    'seccion'           => 'productos',
    'producto'          => $producto,
    'alerta'            => $alerta,
    'opciones_marcas'   => $opciones_marcas,
    'grupos_categorias' => $grupos_categorias,
    'encabezado'        => [
        'titulo' => $producto ? 'Modificar ' . $producto['nombre'] : 'Nuevo producto',
        'volver' => ['texto' => 'Volver a productos', 'url' => 'admin/productos.php'],
    ],
], 'admin');
