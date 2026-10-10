<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<!-- Filtros por GET. Sin JS: la subcategoría se habilita después de aplicar una principal. -->
<form method="get" action="<?= url('admin/productos.php') ?>"
      class="mb-6 flex flex-col gap-4 rounded-2xl border border-borde bg-white p-4 sm:flex-row sm:flex-wrap sm:items-end">
    <div class="sm:flex-1">
        <label for="filtro-categoria" class="etiqueta">Categoría</label>
        <select id="filtro-categoria" name="categoria" class="campo">
            <option value="0">Todas</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] === $categoria_id ? 'selected' : '' ?>>
                    <?= e($categoria['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="sm:flex-1">
        <label for="filtro-subcategoria" class="etiqueta">Subcategoría</label>
        <select id="filtro-subcategoria" name="subcategoria" class="campo disabled:cursor-not-allowed disabled:bg-crema disabled:text-gris"
                <?= $subcategorias ? '' : 'disabled aria-describedby="filtro-subcategoria-ayuda"' ?>>
            <option value="0">Todas</option>
            <?php foreach ($subcategorias as $subcategoria): ?>
                <option value="<?= $subcategoria['id'] ?>" <?= $subcategoria['id'] === $subcategoria_id ? 'selected' : '' ?>>
                    <?= e($subcategoria['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (!$subcategorias): ?>
            <p id="filtro-subcategoria-ayuda" class="mt-1 text-xs text-gris">Elegí una categoría y aplicá para ver sus subcategorías.</p>
        <?php endif; ?>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="btn">Aplicar</button>
        <a href="<?= url('admin/productos.php') ?>" class="enlace">Limpiar</a>
    </div>
</form>

<?php if ($productos): ?>
    <div class="tabla-contenedor">
        <table class="tabla">
            <caption class="sr-only">Productos (<?= count($productos) ?>)</caption>
            <thead>
                <tr>
                    <th scope="col"><span class="sr-only">Imagen</span></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoría</th>
                    <th scope="col" class="text-right">Precio</th>
                    <th scope="col">Destacado</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td>
                            <img src="<?= url('assets/img/productos/' . $producto['imagen']) ?>" alt=""
                                 width="48" height="48" loading="lazy" class="size-12 max-w-none rounded-lg border border-borde object-cover">
                        </td>
                        <td class="min-w-44">
                            <p class="font-bold text-bosque-900"><?= e($producto['nombre']) ?></p>
                            <p class="text-xs text-gris"><?= e($producto['modelo']) ?></p>
                        </td>
                        <td><?= e($producto['marca']) ?></td>
                        <td><?= e($producto['categoria']) ?></td>
                        <td class="text-right font-semibold whitespace-nowrap"><?= precio($producto['precio']) ?></td>
                        <td>
                            <?php if ($producto['destacado']): ?>
                                <span class="chip">Sí</span>
                            <?php else: ?>
                                <span class="text-gris" aria-hidden="true">—</span><span class="sr-only">No</span>
                            <?php endif; ?>
                        </td>
                        <td><?php $badge = ['activo' => $producto['activo']]; include __DIR__ . '/../componentes/badge-estado.php'; ?></td>
                        <td>
                            <!-- 3 botones: apilados hasta pantallas muy anchas, así la tabla entra sin scroll en 1280px -->
                            <div class="flex flex-col items-end gap-1.5 2xl:flex-row 2xl:justify-end">
                                <a href="<?= url('admin/producto-form.php?id=' . $producto['id']) ?>" class="btn-chico"
                                   aria-label="Modificar <?= e($producto['nombre']) ?>">Modificar</a>
                                <?php
                                $accion = $producto['activo']
                                    ? ['id' => $producto['id'], 'accion' => 'inactivar', 'texto' => 'Inactivar', 'etiqueta' => 'Inactivar ' . $producto['nombre']]
                                    : ['id' => $producto['id'], 'accion' => 'activar', 'texto' => 'Activar', 'etiqueta' => 'Activar ' . $producto['nombre']];
                                include __DIR__ . '/../componentes/boton-accion.php';
                                ?>
                                <a href="<?= url('admin/comentarios.php?producto=' . $producto['id']) ?>" class="btn-chico"
                                   aria-label="Ver comentarios de <?= e($producto['nombre']) ?>">Comentarios</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <p class="mt-3 text-sm text-gris"><?= count($productos) ?> <?= count($productos) === 1 ? 'producto' : 'productos' ?></p>
<?php else: ?>
    <?php include __DIR__ . '/../componentes/estado-vacio.php'; ?>
<?php endif; ?>
