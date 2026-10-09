<?php
/*
 * Componente: tarjeta de producto.
 * Necesita: $producto (un producto que el controlador pasó a la vista)
 *
 * Uso desde una vista de vistas/publico/, dentro de un foreach ($destacados as $producto):
 *   include __DIR__ . '/../componentes/tarjeta-producto.php';
 */
?>
<article class="group relative flex flex-col overflow-hidden rounded-2xl border border-borde bg-white transition-colors hover:border-menta-400">
    <img src="<?= url('assets/img/productos/' . $producto['imagen']) ?>"
         alt="<?= e($producto['nombre']) ?>"
         width="400" height="400" loading="lazy"
         class="aspect-square w-full bg-menta-50 object-cover">

    <div class="flex flex-1 flex-col gap-2 p-5">
        <p class="text-sm font-semibold text-gris"><?= e($producto['marca']) ?></p>
        <h3 class="text-lg leading-snug">
            <!-- El ::after estira el link a toda la tarjeta: se puede clickear en cualquier parte -->
            <a href="<?= url('producto.php?id=' . $producto['id']) ?>" class="after:absolute after:inset-0 hover:underline">
                <?= e($producto['nombre']) ?>
            </a>
        </h3>
        <p class="text-sm text-gris"><?= e($producto['modelo']) ?></p>
        <p class="mt-auto pt-2 text-xl font-extrabold text-bosque-900"><?= precio($producto['precio']) ?></p>
    </div>

    <?php if ($producto['destacado']): ?>
        <span class="chip absolute left-3 top-3">Destacado</span>
    <?php endif; ?>
</article>
