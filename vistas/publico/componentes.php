<h1 class="text-3xl md:text-4xl">Componentes</h1>
<p class="mt-2 text-gris">Página temporal para revisar el diseño. No forma parte del sitio.</p>

<section class="mt-12" aria-labelledby="titulo-tarjetas">
    <h2 id="titulo-tarjetas" class="text-2xl">Tarjeta de producto</h2>
    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($destacados as $producto): ?>
            <?php include __DIR__ . '/../componentes/tarjeta-producto.php'; ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="mt-12" aria-labelledby="titulo-ranking">
    <h2 id="titulo-ranking" class="text-2xl">Ranking</h2>
    <ul class="mt-6 space-y-2">
        <?php foreach ($valores as $valor): ?>
            <li class="flex items-center gap-3">
                <?php include __DIR__ . '/../componentes/ranking.php'; ?>
                <span class="text-sm text-gris" aria-hidden="true"><?= numero($valor, 1) ?> de 5</span>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<section class="mt-12" aria-labelledby="titulo-alertas">
    <h2 id="titulo-alertas" class="text-2xl">Alertas</h2>
    <div class="mt-6">
        <?php foreach ($alertas as $alerta): ?>
            <?php include __DIR__ . '/../componentes/alerta.php'; ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="mt-12" aria-labelledby="titulo-vacio">
    <h2 id="titulo-vacio" class="text-2xl">Estado vacío</h2>
    <div class="mt-6 grid gap-6 md:grid-cols-2">
        <?php foreach ($vacios as $vacio): ?>
            <?php include __DIR__ . '/../componentes/estado-vacio.php'; ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="mt-12" aria-labelledby="titulo-basicos">
    <h2 id="titulo-basicos" class="text-2xl">Botones, chips, campos y selector de valoración</h2>
    <div class="mt-6 flex flex-wrap items-center gap-3">
        <a href="#" class="btn">Botón principal</a>
        <a href="#" class="btn-secundario">Botón secundario</a>
        <a href="#" class="enlace">Enlace</a>
        <span class="chip">Chip</span>
    </div>
    <form class="tarjeta mt-6 max-w-md space-y-4" action="#" method="post">
        <div>
            <label for="ejemplo-email" class="etiqueta">Email</label>
            <input type="email" id="ejemplo-email" name="email" class="campo" placeholder="nombre@mail.com" required>
        </div>
        <div>
            <label for="ejemplo-mensaje" class="etiqueta">Mensaje</label>
            <textarea id="ejemplo-mensaje" name="mensaje" class="campo" rows="3" required minlength="10"></textarea>
        </div>
        <?php include __DIR__ . '/../componentes/selector-estrellas.php'; ?>
        <button type="submit" class="btn">Enviar</button>
    </form>
</section>
