<?php
/*
 * Datos de ejemplo — Usuarios del panel.
 *
 * perfil_id apunta a la tabla perfiles.
 * Sin contraseñas: en el Parcial 1 no hay login real.
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/usuarios.php.
 */

return [
    ['id' => 1, 'nombre' => 'Lucía Fernández', 'email' => 'lucia@cityfarmac.com.ar',  'perfil_id' => 1, 'activo' => true],
    ['id' => 2, 'nombre' => 'Diego Martínez',  'email' => 'diego@cityfarmac.com.ar',  'perfil_id' => 2, 'activo' => true],
    ['id' => 3, 'nombre' => 'Paula Benítez',   'email' => 'paula@cityfarmac.com.ar',  'perfil_id' => 2, 'activo' => false],
];
