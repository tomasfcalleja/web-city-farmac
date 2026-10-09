<h1 class="text-3xl md:text-4xl"><?= e($categoria ? $categoria['nombre'] : 'Productos') ?></h1>

<div class="mt-8 grid gap-8 lg:grid-cols-[15rem_1fr] lg:gap-10">

    <!-- Menú de categorías: cada principal se despliega con <details> (sin JS) -->
    <nav aria-label="Categorías">
        <h2 class="mb-3 text-lg">Categorías</h2>
        <ul class="space-y-1">
            <li>
                <a href="<?= url('productos.php') ?>" class="item-menu" <?= $categoria_id === 0 ? 'aria-current="true"' : '' ?>>
                    Todas las categorías
                </a>
            </li>
            <?php foreach ($menu_categorias as $principal): ?>
                <li>
                    <details class="group" <?= $principal['id'] === $categoria_abierta ? 'open' : '' ?>>
                        <summary class="flex cursor-pointer list-none items-center justify-between rounded-xl px-4 py-2 font-semibold hover:bg-menta-50 [&::-webkit-details-marker]:hidden">
                            <?= e($principal['nombre']) ?>
                            <svg aria-hidden="true" class="size-4 shrink-0 transition-transform group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </summary>
                        <ul class="mt-1 ml-4 space-y-1 border-l border-borde pl-2 text-sm">
                            <li>
                                <a href="<?= url('productos.php?categoria=' . $principal['id']) ?>" class="item-menu"
                                   <?= $principal['id'] === $categoria_id ? 'aria-current="true"' : '' ?>>
                                    Todo en <?= e($principal['nombre']) ?>
                                </a>
                            </li>
                            <?php foreach ($principal['subcategorias'] as $sub): ?>
                                <li>
                                    <a href="<?= url('productos.php?categoria=' . $sub['id']) ?>" class="item-menu"
                                       <?= $sub['id'] === $categoria_id ? 'aria-current="true"' : '' ?>>
                                        <?= e($sub['nombre']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </details>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <div>
        <!-- Filtros: GET para que la URL se pueda compartir y el botón "atrás" funcione -->
        <form action="<?= url('productos.php') ?>" method="get"
              class="flex flex-col gap-4 rounded-2xl border border-borde bg-white p-4 sm:flex-row sm:flex-wrap sm:items-end">
            <?php if ($categoria_id): ?>
                <input type="hidden" name="categoria" value="<?= $categoria_id ?>">
            <?php endif; ?>

            <div class="sm:flex-1">
                <label for="filtro-marca" class="etiqueta">Marca</label>
                <select id="filtro-marca" name="marca" class="campo">
                    <option value="0">Todas las marcas</option>
                    <?php foreach ($marcas as $marca): ?>
                        <option value="<?= $marca['id'] ?>" <?= $marca['id'] === $marca_id ? 'selected' : '' ?>>
                            <?= e($marca['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="sm:flex-1">
                <label for="filtro-orden" class="etiqueta">Ordenar por</label>
                <select id="filtro-orden" name="orden" class="campo">
                    <?php foreach ($ordenes as $clave => $texto): ?>
                        <option value="<?= $clave ?>" <?= $clave === $orden ? 'selected' : '' ?>><?= e($texto) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="btn">Aplicar</button>
                <a href="<?= url('productos.php') ?>" class="enlace">Limpiar filtros</a>
            </div>
        </form>

        <p class="mt-6 text-sm font-semibold text-gris">
            <?= count($productos) ?> <?= count($productos) === 1 ? 'producto' : 'productos' ?>
        </p>

        <?php if ($productos): ?>
            <div class="mt-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($productos as $producto): ?>
                    <?php include __DIR__ . '/../componentes/tarjeta-producto.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="mt-4">
                <?php include __DIR__ . '/../componentes/estado-vacio.php'; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
