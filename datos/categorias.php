<?php
/*
 * Datos de ejemplo — Categorías.
 *
 * padre_id = null  → categoría principal
 * padre_id = 3     → subcategoría de la categoría 3
 * activo = false   → oculta en el sitio público (se sigue viendo en el panel)
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/categorias.php.
 */

return [
    ['id' => 1,  'nombre' => 'Medicamentos de venta libre', 'padre_id' => null, 'activo' => true],
    ['id' => 2,  'nombre' => 'Dermocosmética',              'padre_id' => null, 'activo' => true],
    ['id' => 3,  'nombre' => 'Perfumes',                    'padre_id' => null, 'activo' => true],
    ['id' => 4,  'nombre' => 'Cuidado personal',            'padre_id' => null, 'activo' => true],
    ['id' => 5,  'nombre' => 'Bebés y maternidad',          'padre_id' => null, 'activo' => true],
    ['id' => 6,  'nombre' => 'Nutrición y suplementos',     'padre_id' => null, 'activo' => true],

    ['id' => 7,  'nombre' => 'Analgésicos',                 'padre_id' => 1, 'activo' => true],
    ['id' => 8,  'nombre' => 'Antigripales',                'padre_id' => 1, 'activo' => true],
    ['id' => 9,  'nombre' => 'Digestivos',                  'padre_id' => 1, 'activo' => true],
    ['id' => 10, 'nombre' => 'Cuidado facial',              'padre_id' => 2, 'activo' => true],
    ['id' => 11, 'nombre' => 'Protección solar',            'padre_id' => 2, 'activo' => true],
    ['id' => 12, 'nombre' => 'Perfumes de mujer',           'padre_id' => 3, 'activo' => true],
    ['id' => 13, 'nombre' => 'Perfumes de hombre',          'padre_id' => 3, 'activo' => true],
    ['id' => 14, 'nombre' => 'Cuidado capilar',             'padre_id' => 4, 'activo' => true],
    ['id' => 15, 'nombre' => 'Higiene corporal',            'padre_id' => 4, 'activo' => true],
    ['id' => 16, 'nombre' => 'Higiene bucal',               'padre_id' => 4, 'activo' => true],
    ['id' => 17, 'nombre' => 'Pañales y toallitas',         'padre_id' => 5, 'activo' => true],
    ['id' => 18, 'nombre' => 'Cuidado del bebé',            'padre_id' => 5, 'activo' => true],
    ['id' => 19, 'nombre' => 'Vitaminas y minerales',       'padre_id' => 6, 'activo' => true],
    ['id' => 20, 'nombre' => 'Proteínas',                   'padre_id' => 6, 'activo' => true],
    ['id' => 21, 'nombre' => 'Maquillaje',                  'padre_id' => 2, 'activo' => false],
];
