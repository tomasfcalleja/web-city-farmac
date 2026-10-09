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
