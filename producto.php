<?php
// Controlador: detalle de un producto (sitio público). URL: producto.php?id=1
require __DIR__ . '/config.php';

// 1. Leer el id de la URL. (int) lo convierte a número: "abc" o nada → 0
$id = (int) ($_GET['id'] ?? 0);

// 2. Pedirle el producto al modelo
$producto = obtener_producto($id);

// 3. Si no existe (o está oculto en el sitio), responder 404 y mostrar esa vista
if (!$producto || !$producto['activo']) {
    http_response_code(404);
    vista('publico/404', [
        'titulo' => 'Página no encontrada',
    ]);
    exit;
}

// 4. Si existe, mostrar el detalle
vista('publico/producto', [
    'titulo'      => 'Detalle de producto',
    'seccion'     => 'productos',
    'producto'    => $producto,
    'comentarios' => obtener_comentarios($producto['id']),
]);
