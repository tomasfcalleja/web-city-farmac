<?php
/*
 * Componente: pastilla de estado (Activo/Inactivo, Aprobado/Pendiente...).
 * Necesita: $badge = ['activo' => true]
 * Opcional: 'si' y 'no' para cambiar los textos (por defecto "Activo" e "Inactivo").
 *   Ej: $badge = ['activo' => $comentario['aprobado'], 'si' => 'Aprobado', 'no' => 'Pendiente'];
 *
 * El estado se entiende por el texto, no solo por el color (accesibilidad).
 */
?>
<?php if ($badge['activo']): ?>
    <span class="inline-flex items-center gap-1.5 rounded-full bg-menta-50 px-2.5 py-1 text-xs font-bold whitespace-nowrap text-bosque-900">
        <span class="size-1.5 rounded-full bg-bosque-700" aria-hidden="true"></span>
        <?= e($badge['si'] ?? 'Activo') ?>
    </span>
<?php else: ?>
    <span class="inline-flex items-center gap-1.5 rounded-full border border-borde bg-white px-2.5 py-1 text-xs font-bold whitespace-nowrap text-gris">
        <span class="size-1.5 rounded-full bg-gris" aria-hidden="true"></span>
        <?= e($badge['no'] ?? 'Inactivo') ?>
    </span>
<?php endif; ?>
