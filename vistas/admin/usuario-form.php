<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<!-- autocomplete="off" en el form: evita que el navegador complete con TU usuario los datos de otra persona -->
<form method="post" class="tarjeta max-w-xl space-y-5" autocomplete="off">
    <?php
    $campo = ['nombre' => 'nombre', 'etiqueta' => 'Nombre y apellido', 'valor' => $usuario['nombre'] ?? '', 'requerido' => true,
              'atributos' => ['maxlength' => 100]];
    include __DIR__ . '/../componentes/campo-form.php';

    $campo = ['nombre' => 'email', 'etiqueta' => 'Email', 'tipo' => 'email', 'valor' => $usuario['email'] ?? '', 'requerido' => true];
    include __DIR__ . '/../componentes/campo-form.php';

    // Contraseña: obligatoria al crear; al editar, vacía = no se cambia
    $campo = ['nombre' => 'clave', 'etiqueta' => 'Contraseña', 'tipo' => 'password', 'requerido' => !$usuario,
              'ayuda' => $usuario ? 'Dejar vacío para no cambiarla. Mínimo 8 caracteres.' : 'Mínimo 8 caracteres.',
              'atributos' => ['autocomplete' => 'new-password', 'minlength' => 8]];
    include __DIR__ . '/../componentes/campo-form.php';

    $campo = ['nombre' => 'perfil_id', 'etiqueta' => 'Perfil', 'tipo' => 'select', 'valor' => $usuario['perfil_id'] ?? '',
              'requerido' => true, 'vacia' => 'Elegí un perfil', 'opciones' => $opciones_perfiles,
              'ayuda' => 'Define a qué secciones del panel puede entrar.'];
    include __DIR__ . '/../componentes/campo-form.php';
    ?>

    <div class="flex flex-wrap gap-3 border-t border-borde pt-6">
        <button type="submit" class="btn">Guardar</button>
        <a href="<?= url('admin/usuarios.php') ?>" class="btn-secundario">Cancelar</a>
    </div>
</form>
