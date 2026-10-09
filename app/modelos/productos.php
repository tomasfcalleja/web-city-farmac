<?php
/*
 * Modelo de productos.
 * Lee los datos de datos/productos.php. En el Parcial 2 estas funciones
 * pasan a hacer consultas SQL y devuelven lo mismo.
 * Nunca imprime HTML ni lee $_GET/$_POST: eso es trabajo del controlador y la vista.
 */

// Todos los productos (activos e inactivos), con el nombre de su marca y categoría
// agregados, como haría un JOIN en SQL.
function obtener_productos()
{
    $productos = require __DIR__ . '/../../datos/productos.php';

    $resultado = [];
    foreach ($productos as $producto) {
        $marca = obtener_marca($producto['marca_id']);
        $categoria = obtener_categoria($producto['categoria_id']);

        $producto['marca'] = $marca ? $marca['nombre'] : '';
        $producto['categoria'] = $categoria ? $categoria['nombre'] : '';
        $resultado[] = $producto;
    }
    return $resultado;
}

// Un producto por su id, o null si no existe
function obtener_producto($id)
{
    return buscar_por_id(obtener_productos(), $id);
}

// Productos destacados que además estén activos (para la home)
function obtener_destacados()
{
    $resultado = [];
    foreach (obtener_productos() as $producto) {
        if ($producto['destacado'] && $producto['activo']) {
            $resultado[] = $producto;
        }
    }
    return $resultado;
}
