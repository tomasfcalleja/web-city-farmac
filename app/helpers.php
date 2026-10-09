<?php
/*
 * Funciones de ayuda que usan los controladores, los modelos y las vistas.
 */


/* ---------- Para las vistas ---------- */

// Arma una URL desde la raíz del proyecto. Ej: url('admin/index.php')
function url($ruta = '')
{
    return BASE_URL . ltrim($ruta, '/');
}

// Escapa texto antes de mostrarlo en el HTML (evita que se inyecte código)
function e($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

// Formatea un número como precio en pesos argentinos. Ej: 12345.5 → "$ 12.345,50"
function precio($numero)
{
    return '$ ' . number_format($numero, 2, ',', '.');
}


/* ---------- Para los controladores ---------- */

/*
 * Muestra una página: la vista adentro de un layout.
 *
 *   vista('publico/productos', ['titulo' => 'Productos', 'productos' => $productos]);
 *
 * 1. extract() convierte cada clave de $datos en una variable: ['titulo' => 'x'] → $titulo
 * 2. ob_start() empieza a "grabar" lo que se imprime en vez de mandarlo al navegador.
 * 3. Se ejecuta la vista (vistas/publico/productos.php) y lo grabado se guarda en $contenido.
 * 4. Se ejecuta el layout (vistas/layouts/publico.php), que imprime $contenido dentro de su <main>.
 *
 * Como todo pasa dentro de esta función, la vista y el layout solo ven
 * las variables que les pasó el controlador.
 */
function vista($nombre, $datos = [], $layout = 'publico')
{
    extract($datos);

    ob_start();
    require __DIR__ . '/../vistas/' . $nombre . '.php';
    $contenido = ob_get_clean();

    require __DIR__ . '/../vistas/layouts/' . $layout . '.php';
}


/* ---------- Para los modelos ---------- */

// Busca en una lista el elemento que tenga ese id. Si no existe devuelve null.
// (En el Parcial 2 lo reemplaza un "WHERE id = ?" en SQL.)
function buscar_por_id($lista, $id)
{
    foreach ($lista as $elemento) {
        if ($elemento['id'] == $id) {
            return $elemento;
        }
    }
    return null;
}
