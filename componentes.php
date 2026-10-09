<?php
/*
 * Controlador TEMPORAL: guía de estilos con todos los componentes juntos.
 * Borrar (junto con vistas/publico/componentes.php) antes de la entrega final.
 */
require __DIR__ . '/config.php';

vista('publico/componentes', [
    'titulo'     => 'Componentes',
    'destacados' => array_slice(obtener_destacados(), 0, 3),
    'valores'    => [5, 4, 3, 2, 1],
    'alertas'    => [
        ['tipo' => 'exito', 'mensaje' => 'El producto se guardó correctamente.'],
        ['tipo' => 'error', 'mensaje' => 'Revisá los campos marcados: el precio es obligatorio.'],
    ],
    'vacios'     => [
        ['mensaje' => 'Este producto todavía no tiene comentarios.', 'accion' => null],
        ['mensaje' => 'No hay marcas cargadas.', 'accion' => ['texto' => 'Agregar marca', 'url' => 'admin/marca-form.php']],
    ],
]);
