<?php
/*
 * Parcial: barra superior del sitio público (wordmark + menú).
 * Usa $seccion para marcar el link activo con aria-current="page".
 */

// Links del menú: clave = sección, valor = [texto, archivo]
$menu = [
    'inicio'    => ['Inicio', 'index.php'],
    'productos' => ['Productos', 'productos.php'],
    'contacto'  => ['Contáctenos', 'contacto.php'],
    'panel'     => ['Panel', 'admin/index.php'],
];
?>
    <header class="border-b border-borde bg-white">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
            <a href="<?= url('index.php') ?>" class="text-2xl font-extrabold tracking-tight text-bosque-900">
                City <span class="text-bosque-700">Farmac</span>
            </a>

            <button type="button" class="btn-secundario md:hidden"
                    data-menu aria-controls="menu-principal" aria-expanded="false">
                <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                Menú
            </button>

            <nav aria-label="Principal" class="w-full md:w-auto">
                <ul id="menu-principal" class="hidden flex-col gap-1 md:flex md:flex-row md:gap-2">
                    <?php foreach ($menu as $clave => $item): ?>
                        <li>
                            <a href="<?= url($item[1]) ?>"
                               class="block rounded-full px-4 py-2 font-semibold hover:bg-menta-50 aria-[current=page]:bg-menta-200 aria-[current=page]:text-bosque-900"
                               <?= $clave === $seccion ? 'aria-current="page"' : '' ?>>
                                <?= e($item[0]) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>
