<?php
$servername = "localhost";
$username = "rodrigo";
$password = "rodrigo";
$database = "easy_stock";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    // echo "<div class='container ml-3'>Base de datos conectada</div><br>";
}

$conn->set_charset("utf8mb4");
