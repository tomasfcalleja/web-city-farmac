<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<form method="post" class="tarjeta max-w-xl space-y-6">
    <?php
    $campo = ['nombre' => 'nombre', 'etiqueta' => 'Nombre', 'valor' => $perfil['nombre'] ?? '', 'requerido' => true,
              'atributos' => ['maxlength' => 60]];
    include __DIR__ . '/../componentes/campo-form.php';
    ?>

    <!-- Checkboxes agrupados: el <legend> es la "etiqueta" del grupo para los lectores de pantalla.
         name="secciones[]": los corchetes hacen que PHP reciba todas las marcadas como un array. -->
    <fieldset>
        <legend class="etiqueta">Secciones habilitadas</legend>
        <div class="mt-2 grid gap-2 sm:grid-cols-2">
            <?php foreach ($secciones as $seccion_panel): ?>
                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-borde px-4 py-3 font-semibold transition-colors hover:bg-menta-50 has-[:checked]:border-menta-400 has-[:checked]:bg-menta-50">
                    <input type="checkbox" name="secciones[]" value="<?= e($seccion_panel['clave']) ?>" class="size-5 accent-bosque-700"
                        <?= in_array($seccion_panel['clave'], $perfil['secciones'] ?? []) ? 'checked' : '' ?>>
                    <?= e($seccion_panel['nombre']) ?>
                </label>
            <?php endforeach; ?>
        </div>
    </fieldset>

    <div class="flex flex-wrap gap-3 border-t border-borde pt-6">
        <button type="submit" class="btn">Guardar</button>
        <a href="<?= url('admin/perfiles.php') ?>" class="btn-secundario">Cancelar</a>
    </div>
</form>
