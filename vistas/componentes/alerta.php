<?php
/*
 * Componente: alerta.
 * Necesita: $alerta = ['tipo' => 'exito' | 'error' | 'info', 'mensaje' => 'Texto a mostrar']
 *
 * role="alert" hace que el lector de pantalla lea el error apenas aparece;
 * role="status" avisa el éxito o la información sin interrumpir.
 */

// Lo único que cambia entre tipos: rol, colores y el dibujo del ícono
$tipos_alerta = [
    'exito' => ['rol' => 'status', 'colores' => 'border-menta-400 bg-menta-50 font-semibold text-bosque-900', 'icono' => 'M8 12.5l2.5 2.5L16 9.5'],
    'error' => ['rol' => 'alert',  'colores' => 'border-error bg-white font-semibold text-error',             'icono' => 'M15 9l-6 6M9 9l6 6'],
    'info'  => ['rol' => 'status', 'colores' => 'border-borde bg-white text-tinta',                           'icono' => 'M12 11v5M12 8h.01'],
];
$estilo = $tipos_alerta[$alerta['tipo']] ?? $tipos_alerta['info'];
?>
<div role="<?= $estilo['rol'] ?>" class="mb-6 flex items-start gap-3 rounded-2xl border p-4 <?= $estilo['colores'] ?>">
    <svg aria-hidden="true" class="mt-0.5 size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="9"/><path d="<?= $estilo['icono'] ?>"/>
    </svg>
    <p><?= e($alerta['mensaje']) ?></p>
</div>
