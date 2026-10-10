<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<?php if ($marcas): ?>
    <div class="tabla-contenedor">
        <table class="tabla">
            <caption class="sr-only">Marcas (<?= count($marcas) ?>)</caption>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col" class="text-right">Productos</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marcas as $marca): ?>
                    <tr>
                        <td class="font-bold text-bosque-900"><?= e($marca['nombre']) ?></td>
                        <td class="text-right"><?= $marca['productos'] ?></td>
                        <td><?php $badge = ['activo' => $marca['activo'], 'si' => 'Activa', 'no' => 'Inactiva']; include __DIR__ . '/../componentes/badge-estado.php'; ?></td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="<?= url('admin/marca-form.php?id=' . $marca['id']) ?>" class="btn-chico"
                                   aria-label="Modificar <?= e($marca['nombre']) ?>">Modificar</a>
                                <?php
                                $accion = $marca['activo']
                                    ? ['id' => $marca['id'], 'accion' => 'inactivar', 'texto' => 'Inactivar', 'etiqueta' => 'Inactivar ' . $marca['nombre']]
                                    : ['id' => $marca['id'], 'accion' => 'activar', 'texto' => 'Activar', 'etiqueta' => 'Activar ' . $marca['nombre']];
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
