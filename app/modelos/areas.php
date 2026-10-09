<?php
/*
 * Modelo de áreas de la empresa. Lee los datos de datos/areas.php.
 */

function obtener_areas()
{
    return require __DIR__ . '/../../datos/areas.php';
}
