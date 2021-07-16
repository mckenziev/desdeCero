<?php
    include "config.php"
?>
<?=verificarInicio()?>
<?=encabezado_pagina('Medicos')?>
    <ul>
        <li><a class="active" href="medicos.php">Medicos</a></li>
        <li><a href="pacientes.php">Pacientes</a></li>
        <li><a href="consultas.php">Consultas</a></li>
        <li><a href="medicamentos.php">Medicamentos</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
    

<?=pie_pagina()?>