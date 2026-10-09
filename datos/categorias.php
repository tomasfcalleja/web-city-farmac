<?php
/*
 * Datos de ejemplo — Categorías.
 *
 * padre_id = null  → categoría principal
 * padre_id = 3     → subcategoría de la categoría 3
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/categorias.php.
 */

return [
    ['id' => 1,  'nombre' => 'Medicamentos de venta libre', 'padre_id' => null],
    ['id' => 2,  'nombre' => 'Dermocosmética',              'padre_id' => null],
    ['id' => 3,  'nombre' => 'Perfumes',                    'padre_id' => null],
    ['id' => 4,  'nombre' => 'Cuidado personal',            'padre_id' => null],
    ['id' => 5,  'nombre' => 'Bebés y maternidad',          'padre_id' => null],
    ['id' => 6,  'nombre' => 'Nutrición y suplementos',     'padre_id' => null],

    ['id' => 7,  'nombre' => 'Analgésicos',                 'padre_id' => 1],
    ['id' => 8,  'nombre' => 'Antigripales',                'padre_id' => 1],
    ['id' => 9,  'nombre' => 'Digestivos',                  'padre_id' => 1],
    ['id' => 10, 'nombre' => 'Cuidado facial',              'padre_id' => 2],
    ['id' => 11, 'nombre' => 'Protección solar',            'padre_id' => 2],
    ['id' => 12, 'nombre' => 'Perfumes de mujer',           'padre_id' => 3],
    ['id' => 13, 'nombre' => 'Perfumes de hombre',          'padre_id' => 3],
    ['id' => 14, 'nombre' => 'Cuidado capilar',             'padre_id' => 4],
    ['id' => 15, 'nombre' => 'Higiene corporal',            'padre_id' => 4],
    ['id' => 16, 'nombre' => 'Higiene bucal',               'padre_id' => 4],
    ['id' => 17, 'nombre' => 'Pañales y toallitas',         'padre_id' => 5],
    ['id' => 18, 'nombre' => 'Cuidado del bebé',            'padre_id' => 5],
    ['id' => 19, 'nombre' => 'Vitaminas y minerales',       'padre_id' => 6],
    ['id' => 20, 'nombre' => 'Proteínas',                   'padre_id' => 6],
];
