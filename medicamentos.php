<?php
    include "config.php"
?>
<?=verificarInicio()?>
<?=encabezado_pagina('Medicamentos')?>
<ul>
        <li><a href="medicos.php">Medicos</a></li>
        <li><a href="pacientes.php">Pacientes</a></li>
        <li><a href="consultas.php">Consultas</a></li>
        <li><a class="active" href="medicamentos.php">Medicamentos</a></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
    

<?=pie_pagina()?>