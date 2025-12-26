<?php

ob_start();

include('header.php');

?>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            <form action="acceder" method="POST">
              <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
              </div>
              <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>