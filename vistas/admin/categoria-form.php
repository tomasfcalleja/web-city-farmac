<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<form method="post" class="tarjeta max-w-xl space-y-5">
    <?php
    $campo = ['nombre' => 'nombre', 'etiqueta' => 'Nombre', 'valor' => $categoria['nombre'] ?? '', 'requerido' => true,
              'atributos' => ['maxlength' => 80]];
    include __DIR__ . '/../componentes/campo-form.php';

    $campo = ['nombre' => 'padre_id', 'etiqueta' => 'Categoría padre', 'tipo' => 'select', 'valor' => $padre_id ?: '',
              'vacia' => 'Ninguna (es principal)', 'opciones' => $opciones_padre,
              'ayuda' => 'Si elegís una, esta categoría pasa a ser una subcategoría.'];
    include __DIR__ . '/../componentes/campo-form.php';
    ?>

    <div class="flex flex-wrap gap-3 border-t border-borde pt-6">
        <button type="submit" class="btn">Guardar</button>
        <a href="<?= url($encabezado['volver']['url']) ?>" class="btn-secundario">Cancelar</a>
    </div>
</form>
