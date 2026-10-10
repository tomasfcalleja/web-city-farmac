<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<?php if ($categorias): ?>
    <div class="tabla-contenedor">
        <table class="tabla">
            <caption class="sr-only"><?= e($encabezado['titulo']) ?></caption>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <?php if (!$padre): ?>
                        <th scope="col" class="text-right">Subcategorías</th>
                    <?php endif; ?>
                    <th scope="col" class="text-right">Productos</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td class="font-bold text-bosque-900"><?= e($categoria['nombre']) ?></td>
                        <?php if (!$padre): ?>
                            <td class="text-right"><?= $categoria['subcategorias'] ?></td>
                        <?php endif; ?>
                        <td class="text-right"><?= $categoria['productos'] ?></td>
                        <td><?php $badge = ['activo' => $categoria['activo'], 'si' => 'Activa', 'no' => 'Inactiva']; include __DIR__ . '/../componentes/badge-estado.php'; ?></td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="<?= url('admin/categoria-form.php?id=' . $categoria['id']) ?>" class="btn-chico"
                                   aria-label="Modificar <?= e($categoria['nombre']) ?>">Modificar</a>
                                <?php
                                $accion = $categoria['activo']
                                    ? ['id' => $categoria['id'], 'accion' => 'inactivar', 'texto' => 'Inactivar', 'etiqueta' => 'Inactivar ' . $categoria['nombre']]
                                    : ['id' => $categoria['id'], 'accion' => 'activar', 'texto' => 'Activar', 'etiqueta' => 'Activar ' . $categoria['nombre']];
                                include __DIR__ . '/../componentes/boton-accion.php';
                                ?>
                                <?php if (!$padre): ?>
                                    <a href="<?= url('admin/categorias.php?padre=' . $categoria['id']) ?>" class="btn-chico"
                                       aria-label="Ver subcategorías de <?= e($categoria['nombre']) ?>">Subcategorías</a>
                                <?php endif; ?>
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
