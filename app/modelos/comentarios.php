<?php
/*
 * Modelo de comentarios. Lee los datos de datos/comentarios.php.
 */

// Comentarios aprobados de un producto, del más nuevo al más viejo
function obtener_comentarios($producto_id)
{
    $comentarios = require __DIR__ . '/../../datos/comentarios.php';

    $resultado = [];
    foreach ($comentarios as $comentario) {
        if ($comentario['producto_id'] == $producto_id && $comentario['aprobado']) {
            $resultado[] = $comentario;
        }
    }

    usort($resultado, function ($a, $b) {
        return strcmp($b['fecha'], $a['fecha']);
    });
    return $resultado;
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
