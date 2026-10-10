<?php
/*
 * Datos de ejemplo — Secciones del panel (las que se habilitan por perfil).
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/secciones.php.
 */

return [
    ['clave' => 'productos',   'nombre' => 'Productos'],
    ['clave' => 'categorias',  'nombre' => 'Categorías'],
    ['clave' => 'marcas',      'nombre' => 'Marcas'],
    ['clave' => 'comentarios', 'nombre' => 'Comentarios'],
    ['clave' => 'usuarios',    'nombre' => 'Usuarios'],
    ['clave' => 'perfiles',    'nombre' => 'Perfiles'],
];
