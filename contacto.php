<?php
// Controlador: contacto (sitio público)
require __DIR__ . '/config.php';

// Por defecto, un aviso informativo sobre los tiempos de respuesta
$alerta = [
    'tipo'    => 'info',
    'mensaje' => 'Respondemos de lunes a viernes, dentro de las 48 horas hábiles.',
];

// Si se envió el formulario (POST a esta misma página), lo reemplaza el mensaje de éxito.
// SIMULADO: en el Parcial 1 no se envía ni se guarda nada. En el Parcial 2 acá
// se validan los datos de $_POST y se guarda o envía la consulta.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alerta = [
        'tipo'    => 'exito',
        'mensaje' => '¡Gracias por escribirnos! Te vamos a responder a la brevedad.',
    ];
}

vista('publico/contacto', [
    'titulo'  => 'Contáctenos',
    'seccion' => 'contacto',
    'areas'   => obtener_areas(),
    'alerta'  => $alerta,
]);
