<?php
/*
 * Componente: estado vacío (cuando una lista no tiene elementos).
 * Necesita: $vacio = ['mensaje' => 'No hay marcas cargadas.', 'accion' => null]
 * 'accion' es opcional: ['texto' => 'Agregar marca', 'url' => 'admin/marca-form.php']
 */
?>
<div class="rounded-2xl border border-dashed border-borde bg-white px-6 py-12 text-center">
    <svg aria-hidden="true" class="mx-auto size-12 text-menta-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <path d="M3 7l9-4 9 4-9 4-9-4zM3 7v10l9 4 9-4V7M12 11v10"/>
    </svg>
    <p class="mt-4 text-gris"><?= e($vacio['mensaje']) ?></p>
    <?php if (!empty($vacio['accion'])): ?>
        <a href="<?= url($vacio['accion']['url']) ?>" class="btn mt-6"><?= e($vacio['accion']['texto']) ?></a>
    <?php endif; ?>
</div>
