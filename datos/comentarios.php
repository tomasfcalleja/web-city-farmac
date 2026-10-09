<?php
/*
 * Datos de ejemplo — Comentarios de productos.
 *
 * producto_id apunta a la tabla productos.
 * valoracion: de 1 a 5 estrellas. aprobado: false = pendiente de moderación.
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/comentarios.php.
 */

return [
    ['id' => 1,  'producto_id' => 1,  'email' => 'laura.gomez@mail.com',    'texto' => 'Infaltable en el botiquín, hace efecto rápido.',              'valoracion' => 5, 'fecha' => '2026-08-12', 'aprobado' => true],
    ['id' => 2,  'producto_id' => 1,  'email' => 'martin.r@mail.com',       'texto' => 'Buen precio comparado con otras farmacias.',                 'valoracion' => 4, 'fecha' => '2026-09-03', 'aprobado' => true],
    ['id' => 3,  'producto_id' => 4,  'email' => 'sofi.perez@mail.com',     'texto' => 'Me cambió la piel en dos semanas. No reseca.',                'valoracion' => 5, 'fecha' => '2026-07-21', 'aprobado' => true],
    ['id' => 4,  'producto_id' => 4,  'email' => 'carla.m@mail.com',        'texto' => 'Está bien, pero el envase dura poco.',                        'valoracion' => 3, 'fecha' => '2026-09-15', 'aprobado' => true],
    ['id' => 5,  'producto_id' => 5,  'email' => 'juan.ibarra@mail.com',    'texto' => 'No deja la cara blanca y no pica en los ojos.',               'valoracion' => 5, 'fecha' => '2026-01-10', 'aprobado' => true],
    ['id' => 6,  'producto_id' => 8,  'email' => 'valen.sosa@mail.com',     'texto' => 'El perfume dura todo el día, muy elegante.',                  'valoracion' => 5, 'fecha' => '2026-06-02', 'aprobado' => true],
    ['id' => 7,  'producto_id' => 8,  'email' => 'anonimo123@mail.com',     'texto' => 'Compren en otro lado!!!',                                     'valoracion' => 1, 'fecha' => '2026-09-28', 'aprobado' => false],
    ['id' => 8,  'producto_id' => 15, 'email' => 'mama.de.tomi@mail.com',   'texto' => 'Los mejores que probamos, nunca tuvimos pérdidas.',           'valoracion' => 5, 'fecha' => '2026-08-30', 'aprobado' => true],
    ['id' => 9,  'producto_id' => 15, 'email' => 'ezequiel.l@mail.com',     'texto' => 'Muy buenos, aunque el talle M viene algo chico.',             'valoracion' => 4, 'fecha' => '2026-09-19', 'aprobado' => true],
    ['id' => 10, 'producto_id' => 17, 'email' => 'graciela.f@mail.com',     'texto' => 'Lo tomo hace tres meses y me siento con más energía.',        'valoracion' => 4, 'fecha' => '2026-05-14', 'aprobado' => true],
    ['id' => 11, 'producto_id' => 13, 'email' => 'nico.alvarez@mail.com',   'texto' => 'Sabor un poco fuerte, pero cumple.',                          'valoracion' => 3, 'fecha' => '2026-09-30', 'aprobado' => false],
    ['id' => 12, 'producto_id' => 6,  'email' => 'flor.diaz@mail.com',      'texto' => 'Se absorbe enseguida y deja la piel luminosa.',               'valoracion' => 4, 'fecha' => '2026-10-01', 'aprobado' => true],
];
