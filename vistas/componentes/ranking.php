<?php
/*
 * Componente: ranking con estrellas.
 * Necesita: $valor (de 0 a 5, puede tener decimales: 4.5)
 *
 * Se pintan las estrellas redondeando el valor (4.5 → 5 llenas, 4.4 → 4).
 * Las estrellas son solo decorativas (aria-hidden). Para lectores de pantalla
 * se agrega el texto oculto "Valoración: 4,5 de 5".
 */
?>
<span class="inline-flex items-center gap-0.5">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <svg aria-hidden="true" viewBox="0 0 20 20"
             class="size-5 <?= $i <= round($valor) ? 'fill-bosque-700' : 'fill-borde' ?>">
            <path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8L10 14.8l-5.2 2.8 1-5.8L1.5 7.7l5.9-.9z"/>
        </svg>
    <?php endfor; ?>
    <span class="sr-only">Valoración: <?= numero($valor, $valor == (int) $valor ? 0 : 1) ?> de 5</span>
</span>
