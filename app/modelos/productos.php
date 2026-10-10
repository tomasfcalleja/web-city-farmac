<?php
/*
 * Modelo de productos.
 * Lee los datos de datos/productos.php. En el Parcial 2 estas funciones
 * pasan a hacer consultas SQL y devuelven lo mismo.
 * Nunca imprime HTML ni lee $_GET/$_POST: eso es trabajo del controlador y la vista.
 *
 * Regla de nombres: obtener_productos() es para el sitio público (solo activos);
 * obtener_productos_admin() es para el panel (todos, también los inactivos).
 *
 * $filtros es opcional en las dos y puede tener:
 *   'categoria' => id de categoría (si es principal, incluye sus subcategorías)
 *   'marca'     => id de marca
 *   'orden'     => 'destacados' (por defecto), 'ranking', 'az' o 'za'
 */

// Productos ACTIVOS para el sitio público. Ej: obtener_productos(['categoria' => 2, 'orden' => 'az'])
function obtener_productos($filtros = [])
{
    return buscar_productos($filtros, true);
}

// Todos los productos (activos e inactivos) para el panel. Por defecto, ordenados A-Z.
function obtener_productos_admin($filtros = [])
{
    $filtros['orden'] = $filtros['orden'] ?? 'az';
    return buscar_productos($filtros, false);
}

// Un producto por su id (activo o no), o null si no existe.
// Decidir si se puede mostrar es trabajo del controlador.
function obtener_producto($id)
{
    $productos = require __DIR__ . '/../../datos/productos.php';
    $producto = buscar_por_id($productos, $id);

    return $producto ? completar_producto($producto) : null;
}

// Productos destacados y activos (para la home)
function obtener_destacados()
{
    $resultado = [];
    foreach (obtener_productos() as $producto) {
        if ($producto['destacado']) {
            $resultado[] = $producto;
        }
    }
    return $resultado;
}


/* ---------- Funciones internas del modelo ---------- */

// Filtra y ordena los productos. La usan obtener_productos() y obtener_productos_admin(),
// que solo se diferencian en si se quedan con los activos o no.
// (En SQL: SELECT ... WHERE activo = 1 AND categoria_id IN (...) AND marca_id = ? ORDER BY ...)
function buscar_productos($filtros, $solo_activos)
{
    $productos = require __DIR__ . '/../../datos/productos.php';

    $categoria = $filtros['categoria'] ?? 0;
    $marca = $filtros['marca'] ?? 0;
    $orden = $filtros['orden'] ?? 'destacados';

    // Ids de categoría aceptados (en SQL: WHERE categoria_id IN (...))
    $ids_categoria = $categoria ? obtener_ids_de_categoria($categoria) : [];

    $resultado = [];
    foreach ($productos as $producto) {
        if ($solo_activos && !$producto['activo']) {
            continue;
        }
        if ($categoria && !in_array($producto['categoria_id'], $ids_categoria)) {
            continue;
        }
        if ($marca && $producto['marca_id'] != $marca) {
            continue;
        }
        $resultado[] = completar_producto($producto);
    }

    return ordenar_productos($resultado, $orden);
}

// Agrega a un producto los datos de otras tablas, como haría un JOIN en SQL:
// nombre de marca y categoría, ranking promedio y cantidad de opiniones.
function completar_producto($producto)
{
    $marca = obtener_marca($producto['marca_id']);
    $categoria = obtener_categoria($producto['categoria_id']);
    $ranking = obtener_ranking($producto['id']);

    $producto['marca'] = $marca ? $marca['nombre'] : '';
    $producto['categoria'] = $categoria ? $categoria['nombre'] : '';
    $producto['ranking'] = $ranking['promedio'];
    $producto['opiniones'] = $ranking['cantidad'];
    return $producto;
}

// Ordena una lista de productos (en SQL: ORDER BY ...)
function ordenar_productos($productos, $orden)
{
    usort($productos, function ($a, $b) use ($orden) {
        if ($orden === 'az') {
            return strcmp($a['nombre'], $b['nombre']);
        }
        if ($orden === 'za') {
            return strcmp($b['nombre'], $a['nombre']);
        }
        if ($orden === 'ranking') {
            // Mayor promedio primero; los que no tienen opiniones (0) quedan al final
            return $b['ranking'] <=> $a['ranking'] ?: strcmp($a['nombre'], $b['nombre']);
        }
        // 'destacados': primero los destacados, después alfabético
        return $b['destacado'] <=> $a['destacado'] ?: strcmp($a['nombre'], $b['nombre']);
    });
    return $productos;
}
