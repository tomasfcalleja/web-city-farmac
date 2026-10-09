<?php
/*
 * Componente: selector de valoración de 1 a 5 (para formularios).
 * No necesita variables. Envía el campo "valoracion".
 *
 * Son radios reales dentro de un <fieldset> con <legend>: se puede elegir con
 * mouse, con teclado (Tab para entrar, flechas para moverse) y los lectores
 * de pantalla anuncian "Valoración, 3 estrellas, 3 de 5".
 * Cada radio está oculto visualmente (sr-only, pero sigue enfocable) y su
 * <label> muestra la estrella. El pintado lo hace la clase .estrellas de input.css.
 */
?>
<fieldset>
    <legend class="etiqueta">Valoración</legend>
    <!-- Sin gap entre estrellas: el espacio va como padding, así el mouse nunca "cae" entre dos -->
    <div class="estrellas relative inline-flex">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <input type="radio" name="valoracion" id="valoracion-<?= $i ?>" value="<?= $i ?>" class="sr-only" required>
            <label for="valoracion-<?= $i ?>" class="cursor-pointer rounded-md p-1">
                <svg aria-hidden="true" viewBox="0 0 20 20" class="size-8">
                    <path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8L10 14.8l-5.2 2.8 1-5.8L1.5 7.7l5.9-.9z"/>
                </svg>
                <span class="sr-only"><?= $i ?> <?= $i === 1 ? 'estrella' : 'estrellas' ?></span>
            </label>
        <?php endfor; ?>
    </div>
</fieldset>
