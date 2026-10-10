<?php
/*
 * Componente: ícono de una sección del panel (trazos de 24x24, estilo línea).
 * Necesita: $icono = 'productos' | 'categorias' | 'marcas' | 'comentarios' | 'usuarios' | 'perfiles'
 * Es decorativo (aria-hidden): el texto de al lado ya dice qué es.
 */
$trazos_iconos = [
    'productos'   => 'M9 3h6v4H9zM7 7h10l1 4v9a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-9zM10 14h4',
    'categorias'  => 'M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z',
    'marcas'      => 'M3 12V4h8l10 10-8 8L3 12zM7.5 7.5h.01',
    'comentarios' => 'M4 5h16v11H9l-5 4V5zM8 9h8M8 12h5',
    'usuarios'    => 'M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM2 21a7 7 0 0 1 14 0M16 3.5a4 4 0 0 1 0 7.5M22 21a7 7 0 0 0-4-6.3',
    'perfiles'    => 'M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6l8-3zM9 12l2 2 4-4',
];
?>
<svg aria-hidden="true" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
    <path d="<?= $trazos_iconos[$icono] ?? '' ?>"/>
</svg>
