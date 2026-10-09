<?php
/*
 * Configuración general del sitio.
 * Todos los controladores (los .php de la raíz y de admin/) cargan este archivo primero.
 */

define('NOMBRE_SITIO', 'City Farmac');

/*
 * BASE_URL: dirección web de la carpeta raíz del proyecto, siempre terminada en "/".
 *
 * Se calcula sola: tomamos la carpeta donde está este archivo (la raíz del proyecto)
 * y le sacamos adelante la carpeta raíz del servidor (DOCUMENT_ROOT).
 *   - php -S localhost:8000 desde la raíz       →  "/"
 *   - htdocs/trabajos/city-farmac/ en XAMPP     →  "/trabajos/city-farmac/"
 * Como depende de dónde está config.php (y no de la página que se abrió),
 * desde admin/ también apunta a la raíz.
 *
 * Si en algún servidor no funciona, comentá el cálculo y fijala a mano:
 */
// define('BASE_URL', '/city-farmac/');

if (!defined('BASE_URL')) {
    $carpeta_proyecto = str_replace('\\', '/', realpath(__DIR__));
    $carpeta_servidor = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));
    $ruta = substr($carpeta_proyecto, strlen($carpeta_servidor));
    define('BASE_URL', rtrim($ruta, '/') . '/');
}

/*
 * Cargamos acá las funciones de ayuda y todos los modelos, así cada
 * controlador hace un solo require (el de este archivo) y ya tiene todo.
 */
require __DIR__ . '/app/helpers.php';
require __DIR__ . '/app/modelos/productos.php';
require __DIR__ . '/app/modelos/categorias.php';
require __DIR__ . '/app/modelos/marcas.php';
require __DIR__ . '/app/modelos/comentarios.php';
require __DIR__ . '/app/modelos/usuarios.php';
require __DIR__ . '/app/modelos/perfiles.php';
require __DIR__ . '/app/modelos/areas.php';
