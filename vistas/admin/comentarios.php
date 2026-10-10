<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<div class="mb-6 flex flex-wrap items-center gap-4">
    <!-- Filtro por estado: son links (cambian la URL), no botones -->
    <nav aria-label="Filtrar por estado">
        <ul class="inline-flex flex-wrap gap-1 rounded-full border border-borde bg-white p-1">
            <?php foreach ($pestanas as $pestana): ?>
                <li>
                    <a href="<?= url($pestana['url']) ?>"
                       class="inline-block rounded-full px-4 py-1.5 text-sm font-semibold transition-colors hover:bg-menta-50 aria-[current=true]:bg-menta-200 aria-[current=true]:text-bosque-900"
                       <?= $pestana['activa'] ? 'aria-current="true"' : '' ?>>
                        <?= e($pestana['texto']) ?> <span class="text-gris">(<?= $pestana['cantidad'] ?>)</span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?php if ($producto): ?>
        <!-- Chip del filtro por producto, con su link para quitarlo -->
        <p class="inline-flex items-center gap-2 rounded-full bg-menta-50 py-1 pr-1 pl-4 text-sm font-semibold text-bosque-900">
            Producto: <?= e($producto['nombre']) ?>
            <a href="<?= url($url_sin_producto) ?>" class="grid size-7 place-items-center rounded-full hover:bg-menta-200"
               aria-label="Quitar el filtro de producto <?= e($producto['nombre']) ?>">
                <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <path d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </a>
        </p>
    <?php endif; ?>
</div>

<?php if ($comentarios): ?>
    <div class="tabla-contenedor">
        <table class="tabla">
            <caption class="sr-only">Comentarios (<?= count($comentarios) ?>)</caption>
            <thead>
                <tr>
                    <th scope="col">Comentario</th>
                    <th scope="col">Valoración</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comentarios as $comentario): ?>
                    <tr>
                        <td class="min-w-60">
                            <!-- title: al pasar el mouse se ve el texto completo -->
                            <p title="<?= e($comentario['texto']) ?>"><?= e(recortar($comentario['texto'], 60)) ?></p>
                            <p class="mt-1 text-xs text-gris"><?= e($comentario['email']) ?></p>
                        </td>
                        <td><?php $valor = $comentario['valoracion']; include __DIR__ . '/../componentes/ranking.php'; ?></td>
                        <td class="whitespace-nowrap"><time datetime="<?= e($comentario['fecha']) ?>"><?= fecha($comentario['fecha']) ?></time></td>
                        <td><?= e($comentario['producto']) ?></td>
                        <td><?php $badge = ['activo' => $comentario['aprobado'], 'si' => 'Aprobado', 'no' => 'Pendiente']; include __DIR__ . '/../componentes/badge-estado.php'; ?></td>
                        <td>
                            <div class="flex justify-end">
                                <?php
                                $accion = $comentario['aprobado']
                                    ? ['id' => $comentario['id'], 'accion' => 'desaprobar', 'texto' => 'Desaprobar', 'etiqueta' => 'Desaprobar el comentario de ' . $comentario['email']]
                                    : ['id' => $comentario['id'], 'accion' => 'aprobar', 'texto' => 'Aprobar', 'etiqueta' => 'Aprobar el comentario de ' . $comentario['email']];
                                include __DIR__ . '/../componentes/boton-accion.php';
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php include __DIR__ . '/../componentes/estado-vacio.php'; ?>
<?php endif; ?>
