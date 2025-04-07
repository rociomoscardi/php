<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("config.php");
include_once("header.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Usuario</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="tipoproductos.php" class="btn btn-primary mr-2">Listado</a>
            <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label for="txtUsuario">Usuario:</label>
            <input type="text" required="" class="form-control" name="txtUsuario" id="txtUsuario" value="">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtApellido">Apellido:</label>
            <input type="text" required="" class="form-control" name="txtApellido" id="txtApellido" value="">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtCorreo">Correo:</label>
            <input type="email" class="form-control" name="txtCorreo" id="txtCorreo">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="pswClave">Clave:</label>
            <input type="password" class="form-control" name="pswClave" id="pswClave">
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once("footer.php"); ?>