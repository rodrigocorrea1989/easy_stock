<?php

include('header.php');

include('conn.php');

include('alertas.php');

include("comprobar_acceso.php");

$id = htmlentities(addslashes($_GET['id']));

$sql = "SELECT ID , DNI , NOMBRE , APELLIDO , DIRECCION , WHATSAPP , EMAIL FROM clientes WHERE ID='$id' ORDER BY ID DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

    $NOMBRE = $row["NOMBRE"];
    $APELLIDO = $row["APELLIDO"];
}


$cliente = ucfirst($NOMBRE) . ' ' . ucfirst($APELLIDO);

$id_cliente = intval($_GET['id']);

// Consulta
$sql2 = "SELECT 
            p.id,
            p.numero,
            s.nombre AS seguro,
            s.precio,
            p.fecha_alta,
            p.fecha_baja
        FROM polizas p
        INNER JOIN seguros s ON p.id_seguro = s.id
        WHERE p.id_cliente = ?
        ORDER BY p.fecha_alta DESC";

$stmt = $conn->prepare($sql2);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$result = $stmt->get_result();
?>


<div class="container mt-5">
    <center>
        <h2 class="mt-3 text-info">Polizas Asociadas a <?php echo $cliente ?> </h2>
    </center>
    <a class="btn btn-primary mt-2 mb-2" href="nueva_poliza?id=<?php echo $id ?>">Asociar Nueva Poliza</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Número</th>
                <th scope="col">Seguro</th>
                <th scope="col">Costo</th>
                <th scope="col">Fecha de Alta</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $i = 1; ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $row['numero']; ?></td>
                        <td><?php echo htmlspecialchars($row['seguro']); ?></td>
                        <td>$ <?php echo number_format($row['precio'], 2, ',', '.'); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['fecha_alta'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        No hay pólizas asociadas a este cliente
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>