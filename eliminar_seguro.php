<?php

include("comprobar_acceso.php");

include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = intval($_GET['id']);

    $sql = "DELETE FROM seguros WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: seguros");
        exit();
    } else {
        echo "Error al eliminar el seguro";
    }

    $stmt->close();
    $conn->close();
}
