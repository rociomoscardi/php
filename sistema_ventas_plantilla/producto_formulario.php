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
    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
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
            <label for="txtNombre">Nombre:</label>
            <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="lstProducto">Tipo de producto:</label>
            <select class="form-control" name="lstProducto" id="lstProducto">
                <option selected="" disabled="">Seleccionar</option>
                <option value="Jardinería">Jardin</option>
                <option value="Librería">Librería</option>
                <option value="Muebles">Muebles</option>
                <option value="Electrodomésticos">Electrodomésticos</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtPrecio">Precio:</label>
            <input type="text" required="" class="form-control" name="txtPrecio" id="txtPrecio" value="" placeholder="$0,00">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="txtDescripción">Descripción:</label>
            <textarea name="txtDescripcion" id="txtDescripcion"></textarea>
        </div>
    </div>
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <label for="fileImagen">Imagen:</label>
            </div>
            <div class="col-12">
                <input type="file" class="form-control-file" name="imagen" id="imagen" accept=".jpg, .jpeg, .png">
                <img src="files/" alt="" class="img-thumbnail">
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    ClassicEditor
        .create (document. querySelector('#txtDescripcion'))
        .catch (error=> {
            console.error(error);
        });
</script>

<?php include_once("footer.php"); ?>