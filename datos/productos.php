<?php
/*
 * Datos de ejemplo — Productos.
 *
 * marca_id y categoria_id apuntan a las tablas marcas y categorias
 * (categoria_id siempre es una subcategoría).
 * destacado: aparece en la home. activo: false = oculto en el sitio público.
 *
 * Este archivo imita una tabla de la base de datos: devuelve (return) un array
 * de filas. Solo lo lee el modelo app/modelos/productos.php.
 */

return [
    [
        'id' => 1, 'nombre' => 'Aspirina 500 mg', 'modelo' => 'Caja x 20 comprimidos',
        'descripcion' => 'Analgésico y antifebril para dolores leves a moderados como dolor de cabeza, muscular o de muelas.',
        'marca_id' => 1, 'categoria_id' => 7, 'precio' => 6890,
        'imagen' => 'producto-01.svg', 'destacado' => true, 'activo' => true,
    ],
    [
        'id' => 2, 'nombre' => 'Aspirina C Efervescente', 'modelo' => 'Caja x 10 comprimidos',
        'descripcion' => 'Ácido acetilsalicílico con vitamina C para aliviar los síntomas del resfrío.',
        'marca_id' => 1, 'categoria_id' => 8, 'precio' => 9450,
        'imagen' => 'producto-02.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 3, 'nombre' => 'Sal de frutas digestiva', 'modelo' => 'Sobres x 10',
        'descripcion' => 'Antiácido efervescente de acción rápida para la acidez y la pesadez estomacal.',
        'marca_id' => 1, 'categoria_id' => 9, 'precio' => 5200,
        'imagen' => 'producto-03.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 4, 'nombre' => 'Effaclar Gel Limpiador', 'modelo' => '200 ml',
        'descripcion' => 'Gel limpiador purificante para piel grasa y con tendencia acneica. Sin jabón.',
        'marca_id' => 2, 'categoria_id' => 10, 'precio' => 32500,
        'imagen' => 'producto-04.svg', 'destacado' => true, 'activo' => true,
    ],
    [
        'id' => 5, 'nombre' => 'Anthelios Protector Solar FPS 50+', 'modelo' => '50 ml',
        'descripcion' => 'Protección muy alta contra rayos UVA y UVB. Textura fluida, sin perfume, apto piel sensible.',
        'marca_id' => 2, 'categoria_id' => 11, 'precio' => 41900,
        'imagen' => 'producto-05.svg', 'destacado' => true, 'activo' => true,
    ],
    [
        'id' => 6, 'nombre' => 'Minéral 89 Sérum', 'modelo' => '50 ml',
        'descripcion' => 'Sérum fortificante con ácido hialurónico y agua volcánica mineralizante.',
        'marca_id' => 3, 'categoria_id' => 10, 'precio' => 48700,
        'imagen' => 'producto-06.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 7, 'nombre' => 'Capital Soleil Spray FPS 30', 'modelo' => '200 ml',
        'descripcion' => 'Protector solar corporal en spray, resistente al agua y de rápida absorción.',
        'marca_id' => 3, 'categoria_id' => 11, 'precio' => 36400,
        'imagen' => 'producto-07.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 8, 'nombre' => 'Essencial Exclusivo Femenino', 'modelo' => 'Eau de Parfum 100 ml',
        'descripcion' => 'Fragancia floral amaderada con notas de rosa, pimienta rosa y madera de cedro.',
        'marca_id' => 4, 'categoria_id' => 12, 'precio' => 89900,
        'imagen' => 'producto-08.svg', 'destacado' => true, 'activo' => true,
    ],
    [
        'id' => 9, 'nombre' => 'Kaiak Clásico Masculino', 'modelo' => 'Eau de Toilette 100 ml',
        'descripcion' => 'Fragancia fresca y aromática con notas acuáticas y de hierbas.',
        'marca_id' => 4, 'categoria_id' => 13, 'precio' => 64500,
        'imagen' => 'producto-09.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 10, 'nombre' => 'Ekos Castaña Body Splash', 'modelo' => '200 ml',
        'descripcion' => 'Colonia corporal suave con aceite de castaña de la Amazonía.',
        'marca_id' => 4, 'categoria_id' => 12, 'precio' => 28300,
        'imagen' => 'producto-10.svg', 'destacado' => false, 'activo' => false,
    ],
    [
        'id' => 11, 'nombre' => 'Shampoo Reconstrucción Completa', 'modelo' => '400 ml',
        'descripcion' => 'Shampoo con Keratin Actives para cabello dañado y quebradizo.',
        'marca_id' => 5, 'categoria_id' => 14, 'precio' => 7800,
        'imagen' => 'producto-11.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 12, 'nombre' => 'Jabón en barra Original', 'modelo' => 'Pack x 3 de 90 g',
        'descripcion' => 'Jabón de tocador con ¼ de crema humectante que cuida la piel mientras limpia.',
        'marca_id' => 5, 'categoria_id' => 15, 'precio' => 5600,
        'imagen' => 'producto-12.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 13, 'nombre' => 'Pasta dental Total 12', 'modelo' => '90 g',
        'descripcion' => 'Protección completa para dientes, lengua, mejillas y encías durante 12 horas.',
        'marca_id' => 6, 'categoria_id' => 16, 'precio' => 4350,
        'imagen' => 'producto-13.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 14, 'nombre' => 'Cepillo dental Slim Soft', 'modelo' => 'Pack x 2',
        'descripcion' => 'Cerdas extra suaves y finas para una limpieza delicada de encías sensibles.',
        'marca_id' => 6, 'categoria_id' => 16, 'precio' => 6100,
        'imagen' => 'producto-14.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 15, 'nombre' => 'Pañales Premium Care', 'modelo' => 'Talle M x 50 unidades',
        'descripcion' => 'Pañales con capas extra suaves y hasta 12 horas de protección contra la humedad.',
        'marca_id' => 7, 'categoria_id' => 17, 'precio' => 38900,
        'imagen' => 'producto-15.svg', 'destacado' => true, 'activo' => true,
    ],
    [
        'id' => 16, 'nombre' => 'Toallitas húmedas Sensitive', 'modelo' => 'Paquete x 48',
        'descripcion' => 'Toallitas sin perfume ni alcohol, dermatológicamente testeadas.',
        'marca_id' => 7, 'categoria_id' => 18, 'precio' => 4900,
        'imagen' => 'producto-16.svg', 'destacado' => false, 'activo' => true,
    ],
    [
        'id' => 17, 'nombre' => 'Multivitamínico Mujer', 'modelo' => 'Frasco x 60 comprimidos',
        'descripcion' => 'Suplemento con vitaminas y minerales esenciales, con hierro, calcio y vitamina D.',
        'marca_id' => 8, 'categoria_id' => 19, 'precio' => 27600,
        'imagen' => 'producto-17.svg', 'destacado' => true, 'activo' => true,
    ],
    [
        'id' => 18, 'nombre' => 'Proteína Whey sabor vainilla', 'modelo' => 'Pote 900 g',
        'descripcion' => 'Proteína de suero de leche para complementar la alimentación de personas activas.',
        'marca_id' => 8, 'categoria_id' => 20, 'precio' => 52300,
        'imagen' => 'producto-18.svg', 'destacado' => false, 'activo' => false,
    ],
];
