<?php
// Controlador: moderación de comentarios (panel)
require __DIR__ . '/../config.php';

vista('admin/comentarios', [
    'titulo'  => 'Comentarios',
    'seccion' => 'comentarios',
], 'admin');
