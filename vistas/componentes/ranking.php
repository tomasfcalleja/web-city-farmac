<?php
/*
 * Componente: ranking con estrellas.
 * Necesita: $valor (número entero de 1 a 5)
 *
 * Las estrellas son solo decorativas (aria-hidden). Para lectores de pantalla
 * se agrega el texto oculto "Valoración: 4 de 5".
 */
?>
<p class="inline-flex items-center gap-0.5">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <svg aria-hidden="true" viewBox="0 0 20 20"
             class="size-5 <?= $i <= $valor ? 'fill-bosque-700' : 'fill-borde' ?>">
            <path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8L10 14.8l-5.2 2.8 1-5.8L1.5 7.7l5.9-.9z"/>
        </svg>
    <?php endfor; ?>
    <span class="sr-only">Valoración: <?= (int) $valor ?> de 5</span>
</p>
