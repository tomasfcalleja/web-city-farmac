<?php
/*
 * Modelo de perfiles (roles del panel). Lee los datos de datos/perfiles.php.
 * Solo los usa el panel, así que devuelven también los inactivos.
 */

// Todos los perfiles, cada uno con 'secciones_nombres' (los nombres de sus secciones)
function obtener_perfiles()
{
    $perfiles = require __DIR__ . '/../../datos/perfiles.php';

    $resultado = [];
    foreach ($perfiles as $perfil) {
        $resultado[] = completar_perfil($perfil);
    }
    return $resultado;
}

// Un perfil por su id, o null si no existe
function obtener_perfil($id)
{
    return buscar_por_id(obtener_perfiles(), $id);
}

// Agrega los nombres de las secciones habilitadas (como un JOIN con la tabla secciones)
function completar_perfil($perfil)
{
    $perfil['secciones_nombres'] = [];
    foreach (obtener_secciones() as $seccion) {
        if (in_array($seccion['clave'], $perfil['secciones'])) {
            $perfil['secciones_nombres'][] = $seccion['nombre'];
        }
    }
    return $perfil;
}
