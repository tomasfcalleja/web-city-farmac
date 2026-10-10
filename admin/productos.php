<?php
// Controlador: listado de productos (panel)
// URL: admin/productos.php?categoria=3&subcategoria=12  (los dos filtros son opcionales)
require __DIR__ . '/../config.php';

// ---------- 1. Acción enviada desde la tabla (Activar / Inactivar) ----------
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = obtener_producto((int) ($_POST['id'] ?? 0));
    $accion = $_POST['accion'] ?? '';

    // PARCIAL 2: acá va el UPDATE productos SET activo = 1/0 WHERE id = ?
    if ($producto && in_array($accion, ['activar', 'inactivar'])) {
        $alerta = alerta_simulada('Producto "' . $producto['nombre'] . '" ' . ($accion === 'activar' ? 'activado' : 'inactivado'));
    } else {
        $alerta = ['tipo' => 'error', 'mensaje' => 'No se pudo realizar la acción.'];
    }
}

// ---------- 2. Filtros de la URL, validados ----------
// Categoría principal: tiene que existir y ser principal (padre_id null); si no, se ignora.
$categoria_id = (int) ($_GET['categoria'] ?? 0);
$categoria = obtener_categoria($categoria_id);
if (!$categoria || $categoria['padre_id'] !== null) {
    $categoria_id = 0;
}

// Subcategoría: solo vale si pertenece a la principal elegida.
$subcategoria_id = (int) ($_GET['subcategoria'] ?? 0);
$subcategoria = obtener_categoria($subcategoria_id);
if (!$categoria_id || !$subcategoria || $subcategoria['padre_id'] !== $categoria_id) {
    $subcategoria_id = 0;
}

// ---------- 3. Datos para la vista ----------
$productos = obtener_productos_admin([
    'categoria' => $subcategoria_id ?: $categoria_id,   // la más específica que haya
]);

vista('admin/productos', [
    'titulo'          => 'Productos',
    'seccion'         => 'productos',
    'alerta'          => $alerta,
    'productos'       => $productos,
    'categorias'      => obtener_categorias_admin(),
    'subcategorias'   => $categoria_id ? obtener_categorias_admin($categoria_id) : [],
    'categoria_id'    => $categoria_id,
    'subcategoria_id' => $subcategoria_id,
    'encabezado'      => [
        'titulo' => 'Productos',
        'boton'  => ['texto' => 'Nuevo producto', 'url' => 'admin/producto-form.php'],
    ],
    'vacio'           => [
        'mensaje' => 'No hay productos con estos filtros.',
        'accion'  => ['texto' => 'Ver todos los productos', 'url' => 'admin/productos.php'],
    ],
], 'admin');
