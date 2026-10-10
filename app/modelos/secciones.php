<?php
/*
 * Modelo de secciones del panel. Lee los datos de datos/secciones.php.
 */

function obtener_secciones()
{
    return require __DIR__ . '/../../datos/secciones.php';
}
