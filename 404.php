<?php
// Controlador: página no encontrada
require __DIR__ . '/config.php';

// Avisa al navegador (y a Google) que la página no existe
http_response_code(404);

vista('publico/404', [
    'titulo' => 'Página no encontrada',
]);
