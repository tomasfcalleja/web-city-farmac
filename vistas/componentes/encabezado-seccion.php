<?php
/*
 * Componente: encabezado de una sección del panel (título + botón "Nuevo..." opcional).
 * Necesita: $encabezado = ['titulo' => 'Marcas']
 * Opcional:
 *   'descripcion' => 'Texto chico debajo del título'
 *   'boton'       => ['texto' => 'Nueva marca', 'url' => 'admin/marca-form.php']
 *   'volver'      => ['texto' => 'Volver a categorías', 'url' => 'admin/categorias.php']
 */
?>
<div class="mb-8">
    <?php if (!empty($encabezado['volver'])): ?>
        <a href="<?= url($encabezado['volver']['url']) ?>" class="enlace mb-3 inline-block text-sm">
            <span aria-hidden="true">←</span> <?= e($encabezado['volver']['texto']) ?>
        </a>
    <?php endif; ?>

    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl"><?= e($encabezado['titulo']) ?></h1>
            <?php if (!empty($encabezado['descripcion'])): ?>
                <p class="mt-1 text-gris"><?= e($encabezado['descripcion']) ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($encabezado['boton'])): ?>
            <a href="<?= url($encabezado['boton']['url']) ?>" class="btn">
                <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                <?= e($encabezado['boton']['texto']) ?>
            </a>
        <?php endif; ?>
    </div>
</div>
