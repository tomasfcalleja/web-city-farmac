<?php
/*
 * Layout del panel de administración (con menú lateral).
 * Lo usa vista(..., 'admin'). Recibe $contenido, $titulo y $seccion.
 */
$titulo = $titulo ?? 'Panel';
$seccion = $seccion ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include __DIR__ . '/../parciales/head.php'; ?>
    <title><?= e($titulo) ?> | Panel <?= e(NOMBRE_SITIO) ?></title>
    <meta name="robots" content="noindex">
</head>
<body class="min-h-screen">
    <a href="#contenido" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 btn">
        Saltar al contenido
    </a>

    <div class="md:flex md:min-h-screen">
<?php include __DIR__ . '/../parciales/sidebar-admin.php'; ?>

        <main id="contenido" class="min-w-0 flex-1 px-4 py-8 md:px-10">
<?= $contenido ?>

            <footer class="mt-16 border-t border-borde pt-4 text-xs text-gris">
                © <?= date('Y') ?> <?= e(NOMBRE_SITIO) ?> · Panel de administración
            </footer>
        </main>
    </div>

    <script src="<?= url('assets/js/app.js') ?>"></script>
</body>
</html>
