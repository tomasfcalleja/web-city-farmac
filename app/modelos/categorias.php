<?php
/*
 * Modelo de categorías. Lee los datos de datos/categorias.php.
 * Las principales tienen padre_id null; las subcategorías tienen el id de su padre.
 */

// Todas las categorías (principales y subcategorías)
function obtener_categorias()
{
    return require __DIR__ . '/../../datos/categorias.php';
}

// Una categoría por su id, o null si no existe
function obtener_categoria($id)
{
    return buscar_por_id(obtener_categorias(), $id);
}

// Solo las categorías principales (en SQL: WHERE padre_id IS NULL)
function obtener_categorias_principales()
{
    $resultado = [];
    foreach (obtener_categorias() as $categoria) {
        if ($categoria['padre_id'] === null) {
            $resultado[] = $categoria;
        }
    }
    return $resultado;
}

// Subcategorías de una categoría (en SQL: WHERE padre_id = ?)
function obtener_subcategorias($padre_id)
{
    $resultado = [];
    foreach (obtener_categorias() as $categoria) {
        if ($categoria['padre_id'] == $padre_id) {
            $resultado[] = $categoria;
        }
    }
    return $resultado;
}

// El id de una categoría más los de sus subcategorías.
// Sirve para filtrar: elegir "Perfumes" incluye "Perfumes de mujer" y "de hombre".
function obtener_ids_de_categoria($id)
{
    $ids = [$id];
    foreach (obtener_subcategorias($id) as $subcategoria) {
        $ids[] = $subcategoria['id'];
    }
    return $ids;
}
