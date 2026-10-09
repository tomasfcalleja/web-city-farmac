<?php
/*
 * Layout del sitio público.
 * Lo usa vista(). Recibe $contenido (el HTML de la vista ya armado),
 * $titulo y $seccion (el link del menú que queda marcado).
 */
$titulo = $titulo ?? NOMBRE_SITIO;
$seccion = $seccion ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include __DIR__ . '/../parciales/head.php'; ?>
    <title><?= e($titulo) ?> | <?= e(NOMBRE_SITIO) ?></title>
    <meta name="description" content="City Farmac: farmacia y perfumería. Medicamentos, dermocosmética, perfumes y cuidado personal.">
</head>
<body class="flex min-h-screen flex-col">
    <a href="#contenido" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 btn">
        Saltar al contenido
    </a>

<?php include __DIR__ . '/../parciales/header.php'; ?>

    <main id="contenido" class="mx-auto w-full max-w-6xl flex-1 px-4 py-10">
<?= $contenido ?>
    </main>

<?php include __DIR__ . '/../parciales/footer.php'; ?>

    <script src="<?= url('assets/js/app.js') ?>"></script>
</body>
</html>
