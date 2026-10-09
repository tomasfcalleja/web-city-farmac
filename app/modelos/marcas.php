<?php
/*
 * Modelo de marcas. Lee los datos de datos/marcas.php.
 */

function obtener_marcas()
{
    return require __DIR__ . '/../../datos/marcas.php';
}

// Una marca por su id, o null si no existe
function obtener_marca($id)
{
    return buscar_por_id(obtener_marcas(), $id);
}
