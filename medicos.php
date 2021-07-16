<?php
    include "config.php"

    $pdo = pdo_connect_mysql();

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

    $filtro = isset($_GET['b']) ? $_GET['b'] : '';
    $filtro = trim($filtro, '%');
    $filtro = "%". $filtro . "%";
    $records_per_page = 5;
    $consulta = "SELECT * FROM medicamento where nombre like :filtro ORDER BY 1 LIMIT :current_page, :record_per_page"; 
    $stmt = $pdo->prepare($consulta);
    $stmt->bindValue(':filtro', $filtro, PDO::PARAM_STR);
    $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);    
    $stmt->execute();
    $meds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $consulta = "SELECT COUNT(*) FROM medicamento where nombre like '" .$filtro . "'";
    $num_meds = $pdo->query($consulta)->fetchColumn();
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