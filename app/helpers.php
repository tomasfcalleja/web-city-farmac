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

// Formatea un número al estilo argentino (coma decimal, punto de miles). Ej: numero(4.5, 1) → "4,5"
function numero($numero, $decimales = 0)
{
    return number_format($numero, $decimales, ',', '.');
}

// Formatea un número como precio en pesos argentinos. Ej: 12345.5 → "$ 12.345,50"
function precio($numero)
{
    return '$ ' . numero($numero, 2);
}

// Convierte una fecha de la base (año-mes-día) al formato argentino. Ej: "2026-08-12" → "12/08/2026"
function fecha($fecha)
{
    return date('d/m/Y', strtotime($fecha));
}

// Oculta parte de un email para mostrarlo en público. Ej: "laura.gomez@mail.com" → "la***@mail.com"
function ocultar_email($email)
{
    $partes = explode('@', $email);
    return substr($partes[0], 0, 2) . '***@' . ($partes[1] ?? '');
}

// Acorta un texto largo y agrega "…". Ej: recortar('Me cambió la piel en dos semanas', 15) → "Me cambió la p…"
// (mb_ cuenta letras y no bytes, así no se corta una "á" por la mitad)
function recortar($texto, $largo)
{
    return mb_strlen($texto) > $largo ? rtrim(mb_substr($texto, 0, $largo)) . '…' : $texto;
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

/*
 * Responde "no encontrado" (404) y corta el controlador.
 *   mostrar_404();          → página 404 del sitio público
 *   mostrar_404('admin');   → "No encontramos ese registro" dentro del panel
 */
function mostrar_404($layout = 'publico')
{
    http_response_code(404);

    if ($layout === 'admin') {
        vista('admin/404', ['titulo' => 'Registro no encontrado'], 'admin');
    } else {
        vista('publico/404', ['titulo' => 'Página no encontrada']);
    }
    exit;
}

/*
 * Alerta de éxito para las acciones del panel, que en el Parcial 1 son simuladas.
 * Ej: alerta_simulada('Marca "Bayer" inactivada')
 *   → ['tipo' => 'exito', 'mensaje' => 'Marca "Bayer" inactivada (simulado: ...)']
 */
function alerta_simulada($texto)
{
    return [
        'tipo'    => 'exito',
        'mensaje' => $texto . ' (simulado: los cambios se guardan a partir del Parcial 2).',
    ];
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
