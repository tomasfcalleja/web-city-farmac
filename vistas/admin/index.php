<h1 class="text-3xl">¡Hola! Te damos la bienvenida</h1>
<p class="mt-2 text-gris">Este es el resumen de City Farmac. Elegí una sección para empezar.</p>

<?php if ($pendientes > 0): ?>
    <!-- Aviso destacado: lo que necesita atención va primero -->
    <a href="<?= url('admin/comentarios.php?estado=pendientes') ?>"
       class="mt-8 flex items-center justify-between gap-4 rounded-2xl border border-menta-400 bg-menta-50 p-5 transition-colors hover:bg-menta-200">
        <span class="flex items-center gap-3 font-semibold text-bosque-900">
            <span class="grid size-10 shrink-0 place-items-center rounded-full bg-white text-lg font-extrabold"><?= $pendientes ?></span>
            <?= $pendientes === 1 ? 'Comentario pendiente' : 'Comentarios pendientes' ?> de aprobación
        </span>
        <span class="font-bold whitespace-nowrap text-bosque-700">Revisar <span aria-hidden="true">→</span></span>
    </a>
<?php endif; ?>

<ul class="mt-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
    <?php foreach ($tarjetas as $tarjeta): ?>
        <li class="relative rounded-2xl border border-borde bg-white p-6 transition hover:-translate-y-0.5 hover:border-menta-400 focus-within:border-menta-400">
            <div class="flex items-start justify-between gap-4">
                <span class="grid size-12 place-items-center rounded-xl bg-menta-50 text-bosque-700">
                    <?php $icono = $tarjeta['icono']; include __DIR__ . '/../componentes/icono.php'; ?>
                </span>
                <p class="text-4xl font-extrabold text-bosque-900"><?= $tarjeta['cantidad'] ?></p>
            </div>
            <h2 class="mt-4 text-lg">
                <!-- El ::after estira el link a toda la tarjeta -->
                <a href="<?= url($tarjeta['url']) ?>" class="after:absolute after:inset-0 hover:underline"><?= e($tarjeta['titulo']) ?></a>
            </h2>
            <p class="mt-1 text-sm text-gris">
                <?= !empty($tarjeta['detalle']) ? e($tarjeta['detalle']) : 'Ver y administrar' ?>
            </p>
        </li>
    <?php endforeach; ?>
</ul>
