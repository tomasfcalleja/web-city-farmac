<?php
/*
 * Componente: tarjeta de producto.
 * Necesita: $producto (un producto que el controlador pasó a la vista,
 *           con 'marca', 'ranking' y 'opiniones' agregados por el modelo)
 *
 * Uso desde una vista de vistas/publico/, dentro de un foreach ($productos as $producto):
 *   include __DIR__ . '/../componentes/tarjeta-producto.php';
 */
?>
<article class="relative flex flex-col overflow-hidden rounded-2xl border border-borde bg-white transition hover:-translate-y-0.5 hover:border-menta-400 focus-within:border-menta-400">
    <img src="<?= url('assets/img/productos/' . $producto['imagen']) ?>"
         alt="<?= e($producto['nombre']) ?>"
         width="800" height="600" loading="lazy"
         class="aspect-[4/3] w-full bg-menta-50 object-cover">

    <div class="flex flex-1 flex-col gap-2 p-5">
        <p class="text-sm font-semibold text-gris"><?= e($producto['marca']) ?></p>
        <h3 class="text-lg leading-snug">
            <!-- El ::after estira el link a toda la tarjeta: se puede clickear en cualquier parte -->
            <a href="<?= url('producto.php?id=' . $producto['id']) ?>" class="after:absolute after:inset-0 hover:underline">
                <?= e($producto['nombre']) ?>
            </a>
        </h3>
        <p class="text-sm text-gris"><?= e($producto['modelo']) ?></p>

        <div class="flex items-center gap-2 text-sm text-gris">
            <?php if ($producto['opiniones'] > 0): ?>
                <?php $valor = $producto['ranking']; include __DIR__ . '/ranking.php'; ?>
                <span>(<?= $producto['opiniones'] ?><span class="sr-only"> <?= $producto['opiniones'] === 1 ? 'opinión' : 'opiniones' ?></span>)</span>
            <?php else: ?>
                <span>Sin opiniones</span>
            <?php endif; ?>
        </div>

        <p class="mt-auto pt-2 text-xl font-extrabold text-bosque-900"><?= precio($producto['precio']) ?></p>
    </div>

    <?php if ($producto['destacado']): ?>
        <span class="chip absolute left-3 top-3">Destacado</span>
    <?php endif; ?>
</article>
