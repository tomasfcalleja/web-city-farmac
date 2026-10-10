<?php
/*
 * Parcial: menú lateral del panel. En mobile se colapsa detrás del botón "Menú".
 * Usa $seccion para marcar el link activo con aria-current="page".
 */

$menu_panel = [
    'inicio'      => ['Inicio', 'admin/index.php'],
    'productos'   => ['Productos', 'admin/productos.php'],
    'categorias'  => ['Categorías', 'admin/categorias.php'],
    'marcas'      => ['Marcas', 'admin/marcas.php'],
    'comentarios' => ['Comentarios', 'admin/comentarios.php'],
    'usuarios'    => ['Usuarios', 'admin/usuarios.php'],
    'perfiles'    => ['Perfiles', 'admin/perfiles.php'],
];
?>
        <aside class="border-b border-borde bg-white lg:w-64 lg:shrink-0 lg:border-r lg:border-b-0">
            <div class="flex items-center justify-between gap-4 p-4 lg:p-6">
                <a href="<?= url('admin/index.php') ?>" class="text-xl font-extrabold text-bosque-900">
                    City <span class="text-bosque-700">Farmac</span>
                    <span class="chip ml-1 align-middle">Panel</span>
                </a>
                <button type="button" class="btn-secundario lg:hidden"
                        data-menu aria-controls="menu-panel" aria-expanded="false">
                    <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    Menú
                </button>
            </div>

            <nav aria-label="Panel de administración">
                <ul id="menu-panel" class="hidden space-y-1 px-3 pb-4 lg:block">
                    <?php foreach ($menu_panel as $clave => $item): ?>
                        <li>
                            <a href="<?= url($item[1]) ?>" class="item-menu"
                               <?= $clave === $seccion ? 'aria-current="page"' : '' ?>>
                                <?= e($item[0]) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="mt-3 border-t border-borde pt-3">
                        <a href="<?= url('index.php') ?>" class="block rounded-xl px-4 py-2 font-semibold text-bosque-700 hover:bg-menta-50">
                            Ver sitio ↗
                        </a>
                    </li>
                    <li>
                        <a href="<?= url('admin/login.php') ?>" class="block rounded-xl px-4 py-2 font-semibold text-gris hover:bg-menta-50">
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
