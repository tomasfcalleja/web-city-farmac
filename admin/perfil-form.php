<?php
// Controlador: alta y edición de perfil (panel)
//   admin/perfil-form.php        → "Nuevo perfil"
//   admin/perfil-form.php?id=2   → "Modificar ..."
require __DIR__ . '/../config.php';

// ---------- 1. ¿Alta o edición? ----------
$id = (int) ($_GET['id'] ?? 0);
$perfil = null;
if ($id) {
    $perfil = obtener_perfil($id);
    if (!$perfil) {
        mostrar_404('admin');
    }
}

// ---------- 2. Envío del formulario ----------
// SIMULADO: no se guarda nada. PARCIAL 2: acá se valida $_POST (las secciones llegan
// como array en $_POST['secciones']) y se guardan el perfil y su relación con las secciones.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $alerta = alerta_simulada($perfil ? 'Cambios en "' . $nombre . '" guardados' : 'Perfil "' . $nombre . '" creado');
}

$titulo = $perfil ? 'Modificar ' . $perfil['nombre'] : 'Nuevo perfil';

vista('admin/perfil-form', [
    'titulo'     => $titulo,
    'seccion'    => 'perfiles',
    'perfil'     => $perfil,
    'alerta'     => $alerta,
    'secciones'  => obtener_secciones(),
    'encabezado' => [
        'titulo' => $titulo,
        'volver' => ['texto' => 'Volver a perfiles', 'url' => 'admin/perfiles.php'],
    ],
], 'admin');
