<?php
include("conn.php");

// Obtener datos del formulario
$usuario = htmlentities(addslashes($_POST['usuario']));
$pass = htmlentities(addslashes($_POST['pass']));

// Consulta para verificar credenciales
$sql = "SELECT * FROM usuarios WHERE USUARIO='$usuario' AND PASS='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Usuario autenticado correctamente
  session_start();
  $_SESSION['usuario'] = $usuario;
  header("Location: index"); // Redirigir a tu página de dashboard
} else {
  // Error de autenticación
  header("Location: fix_user");
}

$conn->close();
?>
