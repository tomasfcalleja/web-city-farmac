<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<?php if ($perfiles): ?>
    <div class="tabla-contenedor">
        <table class="tabla">
            <caption class="sr-only">Perfiles (<?= count($perfiles) ?>)</caption>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Secciones habilitadas</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perfiles as $perfil): ?>
                    <tr>
                        <td class="min-w-48">
                            <p class="font-bold text-bosque-900"><?= e($perfil['nombre']) ?></p>
                            <p class="text-xs text-gris"><?= e($perfil['descripcion']) ?></p>
                        </td>
                        <td>
                            <ul class="flex min-w-56 flex-wrap gap-1.5">
                                <?php foreach ($perfil['secciones_nombres'] as $seccion_nombre): ?>
                                    <li class="chip"><?= e($seccion_nombre) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td><?php $badge = ['activo' => $perfil['activo']]; include __DIR__ . '/../componentes/badge-estado.php'; ?></td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="<?= url('admin/perfil-form.php?id=' . $perfil['id']) ?>" class="btn-chico"
                                   aria-label="Modificar <?= e($perfil['nombre']) ?>">Modificar</a>
                                <?php
                                $accion = $perfil['activo']
                                    ? ['id' => $perfil['id'], 'accion' => 'inactivar', 'texto' => 'Inactivar', 'etiqueta' => 'Inactivar ' . $perfil['nombre']]
                                    : ['id' => $perfil['id'], 'accion' => 'activar', 'texto' => 'Activar', 'etiqueta' => 'Activar ' . $perfil['nombre']];
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
