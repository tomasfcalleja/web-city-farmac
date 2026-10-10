<?php include __DIR__ . '/../componentes/encabezado-seccion.php'; ?>

<?php if ($alerta): ?>
    <?php include __DIR__ . '/../componentes/alerta.php'; ?>
<?php endif; ?>

<?php if ($usuarios): ?>
    <div class="tabla-contenedor">
        <table class="tabla">
            <caption class="sr-only">Usuarios (<?= count($usuarios) ?>)</caption>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td class="font-bold whitespace-nowrap text-bosque-900"><?= e($usuario['nombre']) ?></td>
                        <td><?= e($usuario['email']) ?></td>
                        <td><span class="chip"><?= e($usuario['perfil']) ?></span></td>
                        <td><?php $badge = ['activo' => $usuario['activo']]; include __DIR__ . '/../componentes/badge-estado.php'; ?></td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="<?= url('admin/usuario-form.php?id=' . $usuario['id']) ?>" class="btn-chico"
                                   aria-label="Modificar <?= e($usuario['nombre']) ?>">Modificar</a>
                                <?php
                                $accion = $usuario['activo']
                                    ? ['id' => $usuario['id'], 'accion' => 'inactivar', 'texto' => 'Inactivar', 'etiqueta' => 'Inactivar ' . $usuario['nombre']]
                                    : ['id' => $usuario['id'], 'accion' => 'activar', 'texto' => 'Activar', 'etiqueta' => 'Activar ' . $usuario['nombre']];
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
