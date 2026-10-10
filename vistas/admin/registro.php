<div class="tarjeta">
    <h1 class="text-2xl">Crear cuenta</h1>
    <p class="mt-1 text-sm text-gris">Completá tus datos para acceder al panel.</p>

    <form method="post" class="mt-6 space-y-5">
        <?php if ($alerta): ?>
            <?php include __DIR__ . '/../componentes/alerta.php'; ?>
        <?php endif; ?>

        <?php
        $campo = ['nombre' => 'nombre', 'etiqueta' => 'Nombre y apellido', 'requerido' => true,
                  'atributos' => ['autocomplete' => 'name', 'maxlength' => 100]];
        include __DIR__ . '/../componentes/campo-form.php';

        $campo = ['nombre' => 'email', 'etiqueta' => 'Email', 'tipo' => 'email', 'requerido' => true,
                  'atributos' => ['autocomplete' => 'email']];
        include __DIR__ . '/../componentes/campo-form.php';

        $campo = ['nombre' => 'clave', 'etiqueta' => 'Contraseña', 'tipo' => 'password', 'requerido' => true,
                  'ayuda' => 'Mínimo 8 caracteres.',
                  'atributos' => ['autocomplete' => 'new-password', 'minlength' => 8]];
        include __DIR__ . '/../componentes/campo-form.php';

        $campo = ['nombre' => 'clave_confirmacion', 'etiqueta' => 'Repetí la contraseña', 'tipo' => 'password', 'requerido' => true,
                  'atributos' => ['autocomplete' => 'new-password', 'minlength' => 8]];
        include __DIR__ . '/../componentes/campo-form.php';
        ?>

        <button type="submit" class="btn w-full">Crear cuenta</button>
    </form>

    <p class="mt-6 text-center text-sm">¿Ya tenés cuenta? <a class="enlace" href="<?= url('admin/login.php') ?>">Iniciá sesión</a></p>
</div>
