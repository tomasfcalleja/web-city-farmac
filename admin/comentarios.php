<?php
// Controlador: moderación de comentarios (panel)
// URL: admin/comentarios.php?estado=pendientes&producto=8  (los dos filtros son opcionales)
require __DIR__ . '/../config.php';

// ---------- 1. Acción enviada desde la tabla (Aprobar / Desaprobar) ----------
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comentario = obtener_comentario((int) ($_POST['id'] ?? 0));
    $accion = $_POST['accion'] ?? '';

    // PARCIAL 2: acá va el UPDATE comentarios SET aprobado = 1/0 WHERE id = ?
    if ($comentario && in_array($accion, ['aprobar', 'desaprobar'])) {
        $alerta = alerta_simulada('Comentario de ' . $comentario['email'] . ' ' . ($accion === 'aprobar' ? 'aprobado' : 'desaprobado'));
    } else {
        $alerta = ['tipo' => 'error', 'mensaje' => 'No se pudo realizar la acción.'];
    }
}

// ---------- 2. Filtros de la URL, validados ----------
// Estados permitidos: clave = valor en la URL ('' = todos), valor = texto de la pestaña.
$estados = [
    ''           => 'Todos',
    'aprobados'  => 'Aprobados',
    'pendientes' => 'Pendientes',
];
$estado = $_GET['estado'] ?? '';
if (!array_key_exists($estado, $estados)) {
    $estado = '';
}

// Producto: tiene que existir; si no, se ignora.
$producto = obtener_producto((int) ($_GET['producto'] ?? 0));
$producto_id = $producto ? $producto['id'] : 0;

// ---------- 3. Links de las pestañas y del chip ----------
// http_build_query() arma "estado=pendientes&producto=8" a partir de un array
// (array_filter saca los valores vacíos para no ensuciar la URL con "estado=&producto=0").
$pestanas = [];
foreach ($estados as $clave => $texto) {
    $pestanas[] = [
        'texto'    => $texto,
        'url'      => 'admin/comentarios.php?' . http_build_query(array_filter(['estado' => $clave, 'producto' => $producto_id])),
        'activa'   => $clave === $estado,
        'cantidad' => count(obtener_comentarios_admin(['estado' => $clave, 'producto' => $producto_id])),
    ];
}
$url_sin_producto = 'admin/comentarios.php?' . http_build_query(array_filter(['estado' => $estado]));

// ---------- 4. Datos para la vista ----------
vista('admin/comentarios', [
    'titulo'           => 'Comentarios',
    'seccion'          => 'comentarios',
    'alerta'           => $alerta,
    'comentarios'      => obtener_comentarios_admin(['estado' => $estado, 'producto' => $producto_id]),
    'pestanas'         => $pestanas,
    'producto'         => $producto,
    'url_sin_producto' => $url_sin_producto,
    'encabezado'       => [
        'titulo'      => 'Comentarios',
        'descripcion' => 'Los comentarios se publican en el sitio recién cuando se aprueban.',
    ],
    'vacio'            => [
        'mensaje' => 'No hay comentarios para mostrar con estos filtros.',
        'accion'  => null,
    ],
], 'admin');
