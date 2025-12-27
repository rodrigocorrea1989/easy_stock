<?php

ob_start();

include('header.php');

include('conn.php');

include("comprobar_acceso.php");


$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$dias = $_POST['dias'];

$sql = "INSERT INTO seguros (nombre, descripcion, precio, dias)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $dias);

if ($stmt->execute()) {
    header("location:seguros");
} else {
    echo "Error al guardar";
}

$stmt->close();
$conexion->close();
