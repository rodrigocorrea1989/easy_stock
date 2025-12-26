<?php
ob_start();

include("header.php");

include("conn.php");

include("comprobar_acceso.php"); 
// Obtener el ID del usuario a eliminar
$id = $_GET['id'];

// Preparar la consulta SQL para eliminar el registro
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    echo header("location:usuarios");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();