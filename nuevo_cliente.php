<?php

include('header.php');

include("comprobar_acceso.php");

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Nuevo Cliente</h3>
                </div>
                <div class="card-body">
                    <form action="insertar_cliente" method="post">
                        <div class="form-group">
                            <label for="nombre">Dni</label>
                            <input type="number" class="form-control" name="dni" id="nombre" placeholder="Ingresa dni del cliente">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa nombre del cliente">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa apellido del cliente">
                        </div>
                        <div class="form-group">
                            <label for="usuario">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingresa dirección del cliente">
                        </div>
                        <div class="form-group">
                            <label for="usuario">Whatsapp</label><br>
                            <span class="text-danger">No utilizar caracteres especiales como guiones o puntos.</span>
                            <input type="number" class="form-control" name="wp" id="wp" placeholder="Ejemplo: 541111223344">
                        </div>
                        <div class="form-group">
                            <label for="contraseña">E-mail</label>
                            <input type="mail" class="form-control" name="mail" id="E-mail" placeholder="Ingresa correo eléctronico de cliente">
                        </div>
                        <button type="submit" class="btn btn-info">Registrar</button>
                        <a class="btn btn-info" href="clientes">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>