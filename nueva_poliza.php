<?php

include('header.php');

include('conn.php');

include("comprobar_acceso.php");

$id = htmlentities(addslashes($_GET['id']));

$sql = "SELECT ID , DNI , NOMBRE , APELLIDO , DIRECCION , WHATSAPP , EMAIL FROM clientes WHERE ID='$id' ORDER BY ID DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

    $NOMBRE = $row["NOMBRE"];
    $APELLIDO = $row["APELLIDO"];
}

$sql_seguros = "SELECT id, nombre FROM seguros ORDER BY nombre ASC";
$seguros = $conn->query($sql_seguros);

$cliente = ucfirst($NOMBRE) . ' ' . ucfirst($APELLIDO);


$result2 = $conn->query("SELECT MAX(numero) AS ultimo FROM polizas");
$data2 = $result2->fetch_assoc();

$numero_poliza = ($data2['ultimo'] !== null) ? $data2['ultimo'] + 1 : 1;
?>

<div class="container mt-2 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4> Asociar Nueva Póliza a <?php echo $cliente ?></h4>
                </div>

                <div class="card-body">
                    <form action="insertar_poliza" method="POST">

                        <div class="form-group">
                            <label for="id_clientes">ID Cliente</label>
                            <input type="number" class="form-control" id="id_clientes" name="id_clientes" value="<?php echo $id ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="id_seguro">Seguro</label>
                            <select class="form-control" id="id_seguro" name="id_seguro" required>
                                <?php while ($seguro = $seguros->fetch_assoc()) { ?>
                                    <option value="<?php echo $seguro['id']; ?>">
                                        <?php echo htmlspecialchars($seguro['nombre']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="numero">Número de póliza</label>
                            <input type="number" step="0.01" class="form-control" id="numero" name="numero"
                                value="<?php echo $numero_poliza; ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="fecha_alta">Fecha de alta</label>
                            <input type="datetime-local" class="form-control" id="fecha_alta" name="fecha_alta" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                        </div>

                        <input type="hidden" name="id_cliente" value="<?php echo $id; ?>">

                        <button type="submit" class="btn btn-success">
                            Agregar póliza
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>