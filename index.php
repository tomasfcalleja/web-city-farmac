<?php
// Controlador: página de inicio (sitio público)
require __DIR__ . '/config.php';

vista('publico/inicio', [
    'titulo'     => 'Inicio',
    'seccion'    => 'inicio',
    'categorias' => obtener_categorias_principales(),
    'destacados' => obtener_destacados(),
]);
