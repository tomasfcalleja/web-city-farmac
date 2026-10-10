<?php
/*
 * Datos de ejemplo — Perfiles (roles del panel).
 *
 * secciones: claves de datos/secciones.php a las que el perfil tiene acceso.
 * (En SQL sería una tabla intermedia perfil_seccion; acá alcanza con un array.)
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/perfiles.php.
 */

return [
    [
        'id' => 1, 'nombre' => 'Administrador', 'activo' => true,
        'descripcion' => 'Acceso completo al panel, incluida la gestión de usuarios y perfiles.',
        'secciones' => ['productos', 'categorias', 'marcas', 'comentarios', 'usuarios', 'perfiles'],
    ],
    [
        'id' => 2, 'nombre' => 'Editor', 'activo' => true,
        'descripcion' => 'Gestiona productos, categorías, marcas y modera comentarios.',
        'secciones' => ['productos', 'categorias', 'marcas', 'comentarios'],
    ],
];
