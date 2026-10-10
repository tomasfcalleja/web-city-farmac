<?php
/*
 * Modelo de usuarios del panel. Lee los datos de datos/usuarios.php.
 * Solo los usa el panel, así que devuelven también los inactivos.
 */

// Todos los usuarios, con el nombre de su perfil agregado (como un JOIN)
function obtener_usuarios()
{
    $usuarios = require __DIR__ . '/../../datos/usuarios.php';

    $resultado = [];
    foreach ($usuarios as $usuario) {
        $perfil = obtener_perfil($usuario['perfil_id']);
        $usuario['perfil'] = $perfil ? $perfil['nombre'] : '';
        $resultado[] = $usuario;
    }
    return $resultado;
}

// Un usuario por su id, o null si no existe
function obtener_usuario($id)
{
    return buscar_por_id(obtener_usuarios(), $id);
}
