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
<h1 class="h3 mb-4 text-gray-800">Tipo de productos</h1>
<?php if (isset($msg)): ?>
  <div class="row">
      <div class="col-12">
          <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
              <?php echo $msg["texto"]; ?>
          </div>
      </div>
  </div>
  <?php endif;?>
  <div class="row">
      <div class="col-12 mb-3">
          <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
          <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
          <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
          <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
      </div>
  </div>
  <div class="row">
      <div class="col-6 form-group">
          <label for="txtNombre">Nombre:</label>
          <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="">
      </div>
  </div>

</div>
<!-- End of Main Content -->
<script>
</script>
<?php include_once "footer.php";?>