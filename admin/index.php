<?php
// Controlador: inicio del panel (panel)
require __DIR__ . '/../config.php';

vista('admin/index', [
    'titulo'  => 'Inicio del panel',
    'seccion' => 'inicio',
], 'admin');
