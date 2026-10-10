<div class="tarjeta">
    <h1 class="text-2xl">Iniciar sesión</h1>
    <p class="mt-1 text-sm text-gris">Ingresá con tu cuenta del panel.</p>

    <form method="post" class="mt-6 space-y-5">
        <?php
        $campo = ['nombre' => 'email', 'etiqueta' => 'Email', 'tipo' => 'email', 'requerido' => true,
                  'atributos' => ['autocomplete' => 'email', 'placeholder' => 'nombre@cityfarmac.com.ar']];
        include __DIR__ . '/../componentes/campo-form.php';

        $campo = ['nombre' => 'clave', 'etiqueta' => 'Contraseña', 'tipo' => 'password', 'requerido' => true,
                  'atributos' => ['autocomplete' => 'current-password']];
        include __DIR__ . '/../componentes/campo-form.php';
        ?>

        <button type="submit" class="btn w-full">Ingresar</button>
    </form>

    <p class="mt-6 text-center text-sm">¿No tenés cuenta? <a class="enlace" href="<?= url('admin/registro.php') ?>">Creá una</a></p>
</div>
