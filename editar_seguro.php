<?php
include('header.php');
include("comprobar_acceso.php");
include("conn.php"); // tu conexión a la BD

$id = $_GET['id'];

$sql = "SELECT * FROM seguros WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$seguro = $resultado->fetch_assoc();

if (!$seguro) {
    echo "Seguro no encontrado";
    exit;
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Seguro</h3>
                </div>
                <div class="card-body">

                    <form action="actualizar_seguro" method="POST" class="mt-4">

                        <input type="hidden" name="id" value="<?= $seguro['id']; ?>">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input
                                type="text"
                                class="form-control text-danger"
                                id="nombre"
                                name="nombre"
                                value="<?= htmlspecialchars($seguro['nombre']); ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea
                                class="form-control text-danger"
                                id="descripcion"
                                name="descripcion"
                                rows="4"
                                required><?= htmlspecialchars($seguro['descripcion']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio $</label>
                            <input
                                type="number"
                                step="0.01"
                                class="form-control text-danger"
                                id="precio"
                                name="precio"
                                value="<?= $seguro['precio']; ?>"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="dias">Vencimiento (días)</label>
                            <input
                                type="number"
                                class="form-control text-danger"
                                id="dias"
                                name="dias"
                                value="<?= $seguro['dias']; ?>"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Actualizar seguro
                        </button>

                        <a href="seguros" class="btn btn-secondary ml-2">
                            Cancelar
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>