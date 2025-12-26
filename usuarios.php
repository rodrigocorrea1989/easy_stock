<?php

include('header.php');

include('conn.php');

include('alertas.php');

include("comprobar_acceso.php");

// Consulta SQL para obtener datos
$sql = "SELECT ID , NOMBRE , APELLIDO , USUARIO, PASS, TIPO FROM usuarios";
$result = $conn->query($sql);

?>

<div class="container mt-3">
    <h3 class="mt-3 text-primary">Usuarios </h3>
    <a class="mt-2 btn btn-primary" href="crear_usuario">Crear Usuario </a>
    <table class="table mt-2">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Usuario</th>
                <th scope="col">Password</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result)) {
                if ($result->num_rows > 0) {
                    // Salida de datos por cada fila
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["ID"];
                        $tipo = $row["TIPO"];
                        if ($tipo == 0) {
                            $leyenda = "Usuario";
                        } else if ($tipo == 1) {
                            $leyenda = "Admin";
                        }
                        echo "<tr>
                                    <th scope='row'>" . ucfirst($row["NOMBRE"]) . "</th>
                                    <td>" . ucfirst($row["APELLIDO"]) . "</td>
                                    <td>" . $row["USUARIO"] . "</td>
                                    <td>********</td>
                                    <td>" . $leyenda . "</td>
                                    <td><a class='btn btn-success' href='editar_usuario?id=$id'>EDITAR</a></td>
                                    <td><a class='btn btn-danger' href='eliminar_usuario?id=$id' onclick='confirmar_eliminar_usuario()'>ELIMINAR</a></td>
                                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 resultados</td></tr>";
                }
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    </table>
    <a class="btn btn-primary" href="index">Volver</a>

</div>