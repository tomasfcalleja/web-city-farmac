<nav aria-label="Ruta de navegación" class="text-sm">
    <ol class="flex flex-wrap items-center gap-2 text-gris">
        <li><a href="<?= url('index.php') ?>" class="enlace">Inicio</a></li>
        <li aria-hidden="true">/</li>
        <?php if ($categoria): ?>
            <li><a href="<?= url('productos.php?categoria=' . $categoria['id']) ?>" class="enlace"><?= e($categoria['nombre']) ?></a></li>
            <li aria-hidden="true">/</li>
        <?php endif; ?>
        <li aria-current="page" class="font-semibold text-tinta"><?= e($producto['nombre']) ?></li>
    </ol>
</nav>

<article class="mt-8 grid gap-8 md:grid-cols-2 md:gap-12">
    <img src="<?= url('assets/img/productos/' . $producto['imagen']) ?>"
         alt="<?= e($producto['nombre']) ?>"
         width="400" height="400"
         class="aspect-square w-full rounded-2xl border border-borde bg-menta-50 object-cover">

    <div class="flex flex-col gap-4">
        <p class="font-semibold text-gris"><?= e($producto['marca']) ?></p>
        <h1 class="text-3xl leading-tight md:text-4xl"><?= e($producto['nombre']) ?></h1>
        <p class="text-gris"><?= e($producto['modelo']) ?></p>

        <p class="flex flex-wrap items-center gap-2">
            <?php if ($producto['opiniones'] > 0): ?>
                <?php $valor = $producto['ranking']; include __DIR__ . '/../componentes/ranking.php'; ?>
                <span class="font-bold text-tinta"><?= numero($producto['ranking'], 1) ?></span>
                <a href="#opiniones" class="enlace text-sm">
                    <?= $producto['opiniones'] ?> <?= $producto['opiniones'] === 1 ? 'opinión' : 'opiniones' ?>
                </a>
            <?php else: ?>
                <span class="text-gris">Sin opiniones todavía</span>
            <?php endif; ?>
        </p>

        <p class="text-4xl font-extrabold text-bosque-900"><?= precio($producto['precio']) ?></p>

        <div class="border-t border-borde pt-4">
            <h2 class="text-lg">Descripción</h2>
            <p class="mt-2 leading-relaxed"><?= e($producto['descripcion']) ?></p>
        </div>
    </div>
</article>

<section id="opiniones" class="mt-16 grid scroll-mt-8 gap-10 lg:grid-cols-[1fr_24rem]" aria-labelledby="titulo-opiniones">
    <div>
        <h2 id="titulo-opiniones" class="text-2xl">Opiniones</h2>

        <?php if ($comentarios): ?>
            <ul class="mt-6 space-y-4">
                <?php foreach ($comentarios as $comentario): ?>
                    <li class="tarjeta">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <?php $valor = $comentario['valoracion']; include __DIR__ . '/../componentes/ranking.php'; ?>
                            <time datetime="<?= e($comentario['fecha']) ?>" class="text-sm text-gris"><?= fecha($comentario['fecha']) ?></time>
                        </div>
                        <p class="mt-3 leading-relaxed"><?= e($comentario['texto']) ?></p>
                        <p class="mt-3 text-sm font-semibold text-gris"><?= e(ocultar_email($comentario['email'])) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="mt-6 rounded-2xl bg-menta-50 p-6 text-tinta">
                Todavía nadie opinó sobre este producto. ¡Contanos qué te pareció con el formulario!
            </p>
        <?php endif; ?>
    </div>

    <div id="opinar" class="scroll-mt-8">
        <!-- El #opinar del action hace que, al recargar, la página baje directo al mensaje -->
        <form action="<?= url('producto.php?id=' . $producto['id']) ?>#opinar" method="post" class="tarjeta space-y-5 lg:sticky lg:top-8">
            <h2 class="text-xl">Dejá tu opinión</h2>

            <?php if ($alerta): ?>
                <?php include __DIR__ . '/../componentes/alerta.php'; ?>
            <?php endif; ?>

            <div>
                <label for="comentario-email" class="etiqueta">Email</label>
                <input type="email" id="comentario-email" name="email" class="campo"
                       autocomplete="email" placeholder="nombre@mail.com" required
                       aria-describedby="email-ayuda">
                <p id="email-ayuda" class="mt-1 text-xs text-gris">No lo publicamos completo.</p>
            </div>

            <div>
                <label for="comentario-texto" class="etiqueta">Comentario</label>
                <textarea id="comentario-texto" name="texto" class="campo" rows="4"
                          required minlength="10" maxlength="500"
                          aria-describedby="comentario-ayuda"></textarea>
                <p id="comentario-ayuda" class="mt-1 text-xs text-gris">Entre 10 y 500 caracteres.</p>
            </div>

            <?php include __DIR__ . '/../componentes/selector-estrellas.php'; ?>

            <button type="submit" class="btn w-full">Enviar comentario</button>
        </form>
    </div>
</section>
