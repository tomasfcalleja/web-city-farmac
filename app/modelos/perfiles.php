<?php
/*
 * Modelo de perfiles (roles del panel). Lee los datos de datos/perfiles.php.
 */

function obtener_perfiles()
{
    return require __DIR__ . '/../../datos/perfiles.php';
}
