<?php
ob_start();

include('conn.php');
include("comprobar_acceso.php");

// Validar que llegue el ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: clientes");
    exit;
}

$id_cliente = $_GET['id'];

// Preparar DELETE
$sql = "DELETE FROM clientes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cliente);

if ($stmt->execute()) {
    header("Location: clientes");
    exit;
} else {
    echo "Error al eliminar: " . $conn->error;
}

$stmt->close();
$conn->close();
