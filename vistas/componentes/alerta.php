<?php
/*
 * Componente: alerta de éxito o de error.
 * Necesita: $alerta = ['tipo' => 'exito' o 'error', 'mensaje' => 'Texto a mostrar']
 *
 * role="alert" hace que el lector de pantalla lea el error apenas aparece;
 * role="status" avisa el éxito sin interrumpir.
 */
$es_error = $alerta['tipo'] === 'error';
?>
<div role="<?= $es_error ? 'alert' : 'status' ?>"
     class="mb-6 flex items-start gap-3 rounded-2xl border-l-4 p-4 font-semibold
            <?= $es_error ? 'border-error bg-white text-error' : 'border-bosque-700 bg-menta-50 text-bosque-900' ?>">
    <span aria-hidden="true"><?= $es_error ? '✕' : '✓' ?></span>
    <p><?= e($alerta['mensaje']) ?></p>
</div>
