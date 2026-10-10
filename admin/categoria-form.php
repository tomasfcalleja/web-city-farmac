<?php
// Controlador: alta y edición de categoría (panel)
//   admin/categoria-form.php           → "Nueva categoría"
//   admin/categoria-form.php?padre=2   → "Nueva categoría" con la principal ya elegida
//   admin/categoria-form.php?id=12     → "Modificar ..."
require __DIR__ . '/../config.php';

// ---------- 1. ¿Alta o edición? ----------
$id = (int) ($_GET['id'] ?? 0);
$categoria = null;
if ($id) {
    $categoria = obtener_categoria($id);
    if (!$categoria) {
        mostrar_404('admin');
    }
}

// Categoría padre elegida: la del registro (al editar) o la de ?padre= (al crear desde "Nueva subcategoría")
$padre_id = $categoria ? $categoria['padre_id'] : (int) ($_GET['padre'] ?? 0);

// ---------- 2. Envío del formulario ----------
// SIMULADO: no se guarda nada. PARCIAL 2: acá se valida $_POST y se hace el INSERT o UPDATE.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $alerta = alerta_simulada($categoria ? 'Cambios en "' . $nombre . '" guardados' : 'Categoría "' . $nombre . '" creada');
}

// ---------- 3. Opciones del select "Categoría padre" ----------
// Solo principales (no hay sub-subcategorías) y nunca la misma categoría que se edita.
$opciones_padre = [];
foreach (obtener_categorias_admin() as $principal) {
    if ($categoria && $principal['id'] === $categoria['id']) {
        continue;
    }
    $opciones_padre[] = ['valor' => $principal['id'], 'texto' => $principal['nombre']];
}

$titulo = $categoria ? 'Modificar ' . $categoria['nombre'] : 'Nueva categoría';

vista('admin/categoria-form', [
    'titulo'         => $titulo,
    'seccion'        => 'categorias',
    'categoria'      => $categoria,
    'padre_id'       => $padre_id,
    'alerta'         => $alerta,
    'opciones_padre' => $opciones_padre,
    'encabezado'     => [
        'titulo' => $titulo,
        'volver' => [
            'texto' => 'Volver a categorías',
            'url'   => $padre_id ? 'admin/categorias.php?padre=' . $padre_id : 'admin/categorias.php',
        ],
    ],
], 'admin');
