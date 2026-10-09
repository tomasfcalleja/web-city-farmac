<?php
/*
 * Parcial: lo que va dentro de <head> y es igual en los tres layouts
 * (codificación, viewport, favicon, tipografía y CSS).
 * El <title> lo pone cada layout, porque cambia entre el sitio y el panel.
 */
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url('assets/img/favicon.svg') ?>" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap">
    <link rel="stylesheet" href="<?= url('assets/css/app.css') ?>">
