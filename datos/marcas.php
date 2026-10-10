<?php
/*
 * Datos de ejemplo — Marcas.
 * activo = false → oculta en el sitio público (se sigue viendo en el panel).
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/marcas.php.
 */

return [
    ['id' => 1, 'nombre' => 'Bayer', 'activo' => true],
    ['id' => 2, 'nombre' => 'La Roche-Posay', 'activo' => true],
    ['id' => 3, 'nombre' => 'Vichy', 'activo' => true],
    ['id' => 4, 'nombre' => 'Natura', 'activo' => true],
    ['id' => 5, 'nombre' => 'Dove', 'activo' => true],
    ['id' => 6, 'nombre' => 'Colgate', 'activo' => true],
    ['id' => 7, 'nombre' => 'Pampers', 'activo' => true],
    ['id' => 8, 'nombre' => 'Centrum', 'activo' => true],
    ['id' => 9, 'nombre' => 'Garnier', 'activo' => false],
];
