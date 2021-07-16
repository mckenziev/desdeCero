<?php
    include "config.php"
?>
<?=verificarInicio()?>
<?=encabezado_pagina('Pacientes')?>
    <ul>
        <li><a href="medicos.php">Medicos</a></li>
        <li><a class="active" href="pacientes.php">Pacientes</a></li>
        <li><a href="consultas.php">Consultas</a></li>
        <li><a href="medicamentos.php">Medicamentos</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
    

<?=pie_pagina()?>