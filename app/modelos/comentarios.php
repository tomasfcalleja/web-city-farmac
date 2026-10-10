<?php
/*
 * Modelo de comentarios. Lee los datos de datos/comentarios.php.
 *
 * Regla de nombres: obtener_comentarios() es para el sitio público (solo aprobados);
 * obtener_comentarios_admin() es para el panel (aprobados y pendientes).
 */

// Comentarios aprobados de un producto, del más nuevo al más viejo
function obtener_comentarios($producto_id)
{
    return obtener_comentarios_admin([
        'producto' => $producto_id,
        'estado'   => 'aprobados',
    ]);
}

/*
 * Panel: comentarios del más nuevo al más viejo, con el nombre del producto agregado.
 *
 * $filtros es opcional y puede tener:
 *   'estado'   => 'aprobados' o 'pendientes' (sin estado: todos)
 *   'producto' => id de producto
 */
function obtener_comentarios_admin($filtros = [])
{
    $comentarios = require __DIR__ . '/../../datos/comentarios.php';

    $estado = $filtros['estado'] ?? '';
    $producto_id = $filtros['producto'] ?? 0;

    // Nombres de los productos por id, para no buscarlos uno por uno (como un JOIN)
    $productos = require __DIR__ . '/../../datos/productos.php';
    $nombres = [];
    foreach ($productos as $producto) {
        $nombres[$producto['id']] = $producto['nombre'];
    }

    $resultado = [];
    foreach ($comentarios as $comentario) {
        if ($producto_id && $comentario['producto_id'] != $producto_id) {
            continue;
        }
        if ($estado === 'aprobados' && !$comentario['aprobado']) {
            continue;
        }
        if ($estado === 'pendientes' && $comentario['aprobado']) {
            continue;
        }
        $comentario['producto'] = $nombres[$comentario['producto_id']] ?? '';
        $resultado[] = $comentario;
    }

    usort($resultado, function ($a, $b) {
        return strcmp($b['fecha'], $a['fecha']);
    });
    return $resultado;
}

// Un comentario por su id, o null si no existe
function obtener_comentario($id)
{
    return buscar_por_id(obtener_comentarios_admin(), $id);
}

// Ranking de un producto: promedio de las valoraciones aprobadas (redondeado a 1 decimal)
// y cantidad de opiniones. Sin opiniones devuelve promedio 0.
// (En SQL: SELECT AVG(valoracion), COUNT(*) ... WHERE aprobado = 1)
function obtener_ranking($producto_id)
{
    $comentarios = obtener_comentarios($producto_id);
    $cantidad = count($comentarios);

    $suma = 0;
    foreach ($comentarios as $comentario) {
        $suma += $comentario['valoracion'];
    }

    return [
        'promedio' => $cantidad ? round($suma / $cantidad, 1) : 0,
        'cantidad' => $cantidad,
    ];
}
