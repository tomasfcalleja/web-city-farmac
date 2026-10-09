<?php
/*
 * Modelo de usuarios del panel. Lee los datos de datos/usuarios.php.
 */

function obtener_usuarios()
{
    return require __DIR__ . '/../../datos/usuarios.php';
}
