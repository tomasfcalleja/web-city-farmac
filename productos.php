<?php
// Controlador: listado de productos (sitio público)
// URL: productos.php?categoria=2&marca=3&orden=az  (los tres parámetros son opcionales)
require __DIR__ . '/config.php';

// Órdenes permitidos: clave = valor en la URL, valor = texto que ve el usuario en el select.
// La misma lista sirve para validar y para armar el select de la vista.
$ordenes = [
    'destacados' => 'Destacados',
    'ranking'    => 'Mejor ranqueados',
    'az'         => 'Nombre: A-Z',
    'za'         => 'Nombre: Z-A',
];

// 1. Leer los filtros de la URL. (int) convierte a número: "abc" o nada → 0 (= sin filtro)
$categoria_id = (int) ($_GET['categoria'] ?? 0);
$marca_id = (int) ($_GET['marca'] ?? 0);
$orden = $_GET['orden'] ?? 'destacados';

// Si el orden no está en la lista permitida, usamos el de por defecto
if (!array_key_exists($orden, $ordenes)) {
    $orden = 'destacados';
}

// 2. Pedir los datos al modelo
$productos = obtener_productos([
    'categoria' => $categoria_id,
    'marca'     => $marca_id,
    'orden'     => $orden,
]);

$categoria = $categoria_id ? obtener_categoria($categoria_id) : null;

// Categoría principal que queda desplegada en el menú: la elegida o, si es una
// subcategoría, su padre.
$categoria_abierta = 0;
if ($categoria) {
    $categoria_abierta = $categoria['padre_id'] ?? $categoria['id'];
}

// Menú: cada categoría principal con sus subcategorías adentro
$menu_categorias = [];
foreach (obtener_categorias_principales() as $principal) {
    $principal['subcategorias'] = obtener_subcategorias($principal['id']);
    $menu_categorias[] = $principal;
}

// 3. Mostrar la vista
vista('publico/productos', [
    'titulo'            => $categoria ? $categoria['nombre'] : 'Productos',
    'seccion'           => 'productos',
    'productos'         => $productos,
    'categoria'         => $categoria,
    'categoria_id'      => $categoria_id,
    'categoria_abierta' => $categoria_abierta,
    'menu_categorias'   => $menu_categorias,
    'marcas'            => obtener_marcas(),
    'marca_id'          => $marca_id,
    'ordenes'           => $ordenes,
    'orden'             => $orden,
    'vacio'             => [
        'mensaje' => 'No hay productos para mostrar',
        'accion'  => ['texto' => 'Ver todos los productos', 'url' => 'productos.php'],
    ],
]);
