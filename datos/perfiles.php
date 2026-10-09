<?php
/*
 * Datos de ejemplo — Perfiles (roles del panel).
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/perfiles.php.
 */

return [
    ['id' => 1, 'nombre' => 'Administrador', 'descripcion' => 'Acceso completo al panel, incluida la gestión de usuarios y perfiles.'],
    ['id' => 2, 'nombre' => 'Editor',        'descripcion' => 'Gestiona productos, categorías, marcas y modera comentarios.'],
];
