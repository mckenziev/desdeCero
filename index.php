<?php
    include "config.php"
?>
<?=verificarInicio()?>
<?=encabezado_pagina('Inicio')?>
    <ul>
        <li><a href="medicos.php">Medicos</a></li>
        <li><a href="pacientes.php">Pacientes</a></li>
        <li><a href="consultas.php">Consultas</a></li>
        <li><a href="medicamentos.php">Medicamentos</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
    <div>
        <h1>Hola Mundo!!!</h1>
    </div>

<?=pie_pagina()?>