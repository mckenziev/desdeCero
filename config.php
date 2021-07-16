<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'clinica';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('No se pudo conectar a la Base!');
    }
}
function encabezado_pagina($titulo) {
    echo <<<EOT
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
    <ul>
        <li><a class="active" href="#">Doctores</a></li>
        <li><a href="#">Pacientes</a></li>
        <li><a href="#">Consultas</a></li>
        <li><a href="#">Medicamentos</a></li>
        <li><a href="#">Salir</a></li>
    </ul>
    EOT;
}
function pie_pagina() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
?>