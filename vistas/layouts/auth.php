<?php
/*
 * Layout de login y registro: tarjeta centrada, sin menú lateral.
 * Lo usa vista(..., 'auth'). Recibe $contenido y $titulo.
 */
$titulo = $titulo ?? 'Panel';
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

    <main id="contenido" class="mx-auto flex min-h-screen max-w-md flex-col justify-center px-4 py-10">
        <a href="<?= url('index.php') ?>" class="mb-6 text-center text-2xl font-extrabold text-bosque-900">
            City <span class="text-bosque-700">Farmac</span>
        </a>
<?= $contenido ?>
    </main>

    <script src="<?= url('assets/js/app.js') ?>"></script>
</body>
</html>
