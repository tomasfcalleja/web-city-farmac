<?php
/*
 * Controlador TEMPORAL: guía de estilos con todos los componentes juntos.
 * Borrar (junto con vistas/publico/componentes.php) antes de la entrega final.
 */
require __DIR__ . '/config.php';

vista('publico/componentes', [
    'titulo'     => 'Componentes',
    'destacados' => array_slice(obtener_destacados(), 0, 3),
    'valores'    => [5, 4.5, 4, 3, 2, 1],
    'alertas'    => [
        ['tipo' => 'exito', 'mensaje' => '¡Gracias! Tu comentario quedará visible cuando sea aprobado.'],
        ['tipo' => 'error', 'mensaje' => 'Revisá los campos marcados: el precio es obligatorio.'],
        ['tipo' => 'info',  'mensaje' => 'Respondemos de lunes a viernes, dentro de las 48 horas hábiles.'],
    ],
    'vacios'     => [
        ['mensaje' => 'Este producto todavía no tiene comentarios.', 'accion' => null],
        ['mensaje' => 'No hay marcas cargadas.', 'accion' => ['texto' => 'Agregar marca', 'url' => 'admin/marca-form.php']],
    ],
]);
