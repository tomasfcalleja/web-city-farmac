<?php
/*
 * Modelo de categorías. Lee los datos de datos/categorias.php.
 * Las principales tienen padre_id null; las subcategorías tienen el id de su padre.
 *
 * Regla de nombres: las funciones sin sufijo son para el sitio público (solo activas);
 * las que terminan en _admin son para el panel (todas, también las inactivas).
 */

// Una categoría por su id (activa o no), o null si no existe
function obtener_categoria($id)
{
    return buscar_por_id(obtener_todas_las_categorias(), $id);
}

// Categorías principales activas (en SQL: WHERE padre_id IS NULL AND activo = 1)
function obtener_categorias_principales()
{
    $resultado = [];
    foreach (obtener_todas_las_categorias() as $categoria) {
        if ($categoria['padre_id'] === null && $categoria['activo']) {
            $resultado[] = $categoria;
        }
    }
    return $resultado;
}

// Subcategorías activas de una categoría (en SQL: WHERE padre_id = ? AND activo = 1)
function obtener_subcategorias($padre_id)
{
    $resultado = [];
    foreach (obtener_todas_las_categorias() as $categoria) {
        if ($categoria['padre_id'] == $padre_id && $categoria['activo']) {
            $resultado[] = $categoria;
        }
    }
    return $resultado;
}

/*
 * Panel: categorías principales (sin $padre_id) o las subcategorías de $padre_id,
 * activas e inactivas, con dos datos calculados:
 *   'subcategorias' → cuántas subcategorías tiene
 *   'productos'     → cuántos productos tiene (sumando los de sus subcategorías)
 */
function obtener_categorias_admin($padre_id = null)
{
    $todas = obtener_todas_las_categorias();

    $resultado = [];
    foreach ($todas as $categoria) {
        if ($categoria['padre_id'] != $padre_id) {
            continue;
        }

        $subcategorias = 0;
        foreach ($todas as $otra) {
            if ($otra['padre_id'] == $categoria['id']) {
                $subcategorias++;
            }
        }

        $categoria['subcategorias'] = $subcategorias;
        $categoria['productos'] = count(obtener_productos_admin(['categoria' => $categoria['id']]));
        $resultado[] = $categoria;
    }
    return $resultado;
}

// El id de una categoría más los de todas sus subcategorías.
// Sirve para filtrar: elegir "Perfumes" incluye "Perfumes de mujer" y "de hombre".
function obtener_ids_de_categoria($id)
{
    $ids = [$id];
    foreach (obtener_todas_las_categorias() as $categoria) {
        if ($categoria['padre_id'] == $id) {
            $ids[] = $categoria['id'];
        }
    }
    return $ids;
}

// Lectura de la "tabla" completa, sin filtrar. La usan las funciones de arriba.
function obtener_todas_las_categorias()
{
    return require __DIR__ . '/../../datos/categorias.php';
}
