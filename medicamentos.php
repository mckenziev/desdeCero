<?php
    include "config.php";

    $pdo = pdo_connect_mysql();

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    echo $page;

    $filtro = isset($_GET['b']) ? $_GET['b'] : '';
    $filtro = "%". $filtro . "%";
    echo $filtro;
    $filtrocolumn = isset($_GET['c']) ? $_GET['c'] : 'nombre';
    $records_per_page = 5;
    $consulta = "SELECT * FROM medicamento where " . $filtrocolumn . " like :filtro ORDER BY 1 LIMIT :current_page, :record_per_page"; 
    $stmt = $pdo->prepare($consulta);
    $stmt->bindValue(':filtro', $filtro, PDO::PARAM_STR);
    $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);   
    $stmt->execute();
    $meds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $consulta = "SELECT COUNT(*) FROM medicamento where " . $filtrocolumn . " like '" .$filtro . "'";
    $num_meds = $pdo->query($consulta)->fetchColumn();
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
    <br>
    <br>
    <div>
        <div>
            <h2>Medicamentos</h2>
            <a href="crearMed.php">Agregar Medicamento</a>
            <form action="medicamentos.php" method="get">
                <input type="text" name="b" placeholder="Buscar" value="<?=trim($filtro, '%')?>" id="b" autocomplete="off">

                <select name="c" id="c">
                    <option value="id_medicamento">#</option>
                    <option value="nombre">Nombre</option>
                    <option value="compuesto">Compuesto</option>
                    <option value="productor">Fabricante</option>
                </select>

                <input type="submit" value="Buscar">
            </form>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nombre</td>
                        <td>Compuesto</td>
                        <td>Productor</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meds as $med): ?>
                    <tr>
                        <td><?=$med['id_medicamento']?></td>
                        <td><?=$med['nombre']?></td>
                        <td><?=$med['compuesto']?></td>
                        <td><?=$med['productor']?></td>
                        <td class="actions">
                            <a href="updateMed.php?id=<?=$med['id_medicamento']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="borrarMed.php?id=<?=$med['id_medicamento']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="medicamentos.php?page=<?=$page-1?>&b=<?=trim($filtro, '%')?>&c=<?=$filtrocolumn?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                <?php endif; ?>
                <?php if ($page*$records_per_page < $num_meds): ?>
                    <a href="medicamentos.php?page=<?=$page+1?>&b=<?=trim($filtro, '%')?>&c=<?=$filtrocolumn?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?=pie_pagina()?>