<?php
/*
 * Modelo de categorías. Lee los datos de datos/categorias.php.
 */

// Todas las categorías. Las principales tienen padre_id null;
// las subcategorías tienen el id de su categoría padre.
function obtener_categorias()
{
    return require __DIR__ . '/../../datos/categorias.php';
}

// Una categoría por su id, o null si no existe
function obtener_categoria($id)
{
    return buscar_por_id(obtener_categorias(), $id);
}
