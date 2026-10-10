<?php
// Controlador: inicio del panel
require __DIR__ . '/../config.php';

$pendientes = count(obtener_comentarios_admin(['estado' => 'pendientes']));

// Una tarjeta por sección: cuántos registros tiene y a dónde lleva.
// 'detalle' es un dato extra opcional. (En SQL cada cantidad sería un SELECT COUNT(*).)
$tarjetas = [
    [
        'icono' => 'productos', 'titulo' => 'Productos', 'url' => 'admin/productos.php',
        'cantidad' => count(obtener_productos_admin()),
    ],
    [
        'icono' => 'categorias', 'titulo' => 'Categorías', 'url' => 'admin/categorias.php',
        'cantidad' => count(obtener_todas_las_categorias()),
        'detalle' => count(obtener_categorias_admin()) . ' principales',
    ],
    [
        'icono' => 'marcas', 'titulo' => 'Marcas', 'url' => 'admin/marcas.php',
        'cantidad' => count(obtener_marcas_admin()),
    ],
    [
        'icono' => 'comentarios', 'titulo' => 'Comentarios', 'url' => 'admin/comentarios.php',
        'cantidad' => count(obtener_comentarios_admin()),
    ],
    [
        'icono' => 'usuarios', 'titulo' => 'Usuarios', 'url' => 'admin/usuarios.php',
        'cantidad' => count(obtener_usuarios()),
    ],
    [
        'icono' => 'perfiles', 'titulo' => 'Perfiles', 'url' => 'admin/perfiles.php',
        'cantidad' => count(obtener_perfiles()),
    ],
];

vista('admin/index', [
    'titulo'     => 'Inicio del panel',
    'seccion'    => 'inicio',
    'tarjetas'   => $tarjetas,
    'pendientes' => $pendientes,
], 'admin');
