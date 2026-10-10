<?php
// Controlador: alta y edición de usuario del panel
//   admin/usuario-form.php        → "Nuevo usuario"
//   admin/usuario-form.php?id=2   → "Modificar ..."
require __DIR__ . '/../config.php';

// ---------- 1. ¿Alta o edición? ----------
$id = (int) ($_GET['id'] ?? 0);
$usuario = null;
if ($id) {
    $usuario = obtener_usuario($id);
    if (!$usuario) {
        mostrar_404('admin');
    }
}

// ---------- 2. Envío del formulario ----------
// SIMULADO: no se guarda nada. PARCIAL 2: acá se valida $_POST, se hashea la
// contraseña con password_hash() (solo si se escribió una) y se hace el INSERT o UPDATE.
$alerta = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $alerta = alerta_simulada($usuario ? 'Cambios en "' . $nombre . '" guardados' : 'Usuario "' . $nombre . '" creado');
}

// ---------- 3. Opciones del select de perfil ----------
$opciones_perfiles = [];
foreach (obtener_perfiles() as $perfil) {
    $opciones_perfiles[] = [
        'valor' => $perfil['id'],
        'texto' => $perfil['nombre'] . ($perfil['activo'] ? '' : ' (inactivo)'),
    ];
}

$titulo = $usuario ? 'Modificar ' . $usuario['nombre'] : 'Nuevo usuario';

vista('admin/usuario-form', [
    'titulo'            => $titulo,
    'seccion'           => 'usuarios',
    'usuario'           => $usuario,
    'alerta'            => $alerta,
    'opciones_perfiles' => $opciones_perfiles,
    'encabezado'        => [
        'titulo' => $titulo,
        'volver' => ['texto' => 'Volver a usuarios', 'url' => 'admin/usuarios.php'],
    ],
], 'admin');
