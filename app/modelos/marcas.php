<?php
/*
 * Modelo de marcas. Lee los datos de datos/marcas.php.
 *
 * Regla de nombres: obtener_marcas() es para el sitio público (solo activas);
 * obtener_marcas_admin() es para el panel (todas, también las inactivas).
 */

// Marcas activas (sitio público: filtros del listado)
function obtener_marcas()
{
    $resultado = [];
    foreach (obtener_todas_las_marcas() as $marca) {
        if ($marca['activo']) {
            $resultado[] = $marca;
        }
    }
    return $resultado;
}

// Todas las marcas con la cantidad de productos de cada una (panel)
// (En SQL: SELECT marcas.*, COUNT(productos.id) ... GROUP BY marcas.id)
function obtener_marcas_admin()
{
    $resultado = [];
    foreach (obtener_todas_las_marcas() as $marca) {
        $marca['productos'] = count(obtener_productos_admin(['marca' => $marca['id']]));
        $resultado[] = $marca;
    }
    return $resultado;
}

// Una marca por su id (activa o no), o null si no existe
function obtener_marca($id)
{
    return buscar_por_id(obtener_todas_las_marcas(), $id);
}

// Lectura de la "tabla" completa, sin filtrar. La usan las funciones de arriba.
function obtener_todas_las_marcas()
{
    return require __DIR__ . '/../../datos/marcas.php';
}
