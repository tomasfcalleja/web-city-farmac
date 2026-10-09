<section class="rounded-3xl bg-menta-50 px-6 py-14 text-center sm:px-12 md:py-20">
    <h1 class="mx-auto max-w-2xl text-4xl leading-tight md:text-5xl">Tu farmacia y perfumería, cerca de casa</h1>
    <p class="mx-auto mt-4 max-w-xl text-lg text-gris">Medicamentos, dermocosmética, perfumes y todo para tu cuidado diario, con la atención de siempre.</p>
    <a href="<?= url('productos.php') ?>" class="btn mt-8">Ver productos</a>
</section>

<section class="mt-14" aria-labelledby="titulo-categorias">
    <h2 id="titulo-categorias" class="text-2xl">Categorías</h2>
    <ul class="mt-5 flex flex-wrap gap-3">
        <?php foreach ($categorias as $categoria): ?>
            <li>
                <a href="<?= url('productos.php?categoria=' . $categoria['id']) ?>"
                   class="inline-block rounded-full border border-borde bg-white px-5 py-2.5 font-semibold text-bosque-900 transition-colors hover:border-menta-400 hover:bg-menta-50">
                    <?= e($categoria['nombre']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<section class="mt-14" aria-labelledby="titulo-destacados">
    <div class="flex flex-wrap items-end justify-between gap-4">
        <h2 id="titulo-destacados" class="text-2xl">Destacados</h2>
        <a href="<?= url('productos.php') ?>" class="enlace">Ver todos los productos</a>
    </div>
    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($destacados as $producto): ?>
            <?php include __DIR__ . '/../componentes/tarjeta-producto.php'; ?>
        <?php endforeach; ?>
    </div>
</section>
