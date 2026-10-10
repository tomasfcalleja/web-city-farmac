<?php
// Controlador: detalle de un producto (sitio público). URL: producto.php?id=1
require __DIR__ . '/config.php';

// 1. Leer el id de la URL. (int) lo convierte a número: "abc" o nada → 0
$id = (int) ($_GET['id'] ?? 0);

// 2. Pedirle el producto al modelo
$producto = obtener_producto($id);

// 3. Si no existe (o está oculto en el sitio), responder 404 y mostrar esa vista
if (!$producto || !$producto['activo']) {
    mostrar_404();
}

// 4. Si se envió el formulario de comentario (POST a esta misma página)...
//    SIMULADO: en el Parcial 1 no hay base de datos, así que no se guarda nada.
//    Solo mostramos el mensaje de éxito. En el Parcial 2 acá se validan los
//    datos de $_POST y se inserta el comentario con aprobado = 0.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alerta = [
        'tipo'    => 'exito',
        'mensaje' => '¡Gracias! Tu comentario quedará visible cuando sea aprobado.',
    ];
}

// 5. Mostrar el detalle
vista('publico/producto', [
    'titulo'      => $producto['nombre'],
    'seccion'     => 'productos',
    'producto'    => $producto,
    'categoria'   => obtener_categoria($producto['categoria_id']),
    'comentarios' => obtener_comentarios($producto['id']),
    'alerta'      => $alerta,
]);
