<?php

include('header.php');

include("comprobar_acceso.php");

?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Nuevo Cliente</h3>
                </div>
                <div class="card-body">
                    <form action="insertar_seguro" method="POST" class="mt-4 ">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio $</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="0.00">
                        </div>

                        <div class="form-group">
                            <label for="dias">Vencimiento</label>
                            <input placeholder="ingresar los días de venicimiento" type="number" class="form-control" id="dias" name="dias" required>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Guardar seguro
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-success" href="seguros">Volver</a>
</div>