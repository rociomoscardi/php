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
    <h1 class="h3 mb-4 text-gray-800">Venta</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="tipoproductos.php" class="btn btn-primary mr-2">Listado</a>
            <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 form-group">
            <?php if (isset($msg) && $msg != ""): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>
            <label for="lstFechaHora">Fecha y hora:</label>
            <div>
                <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                    <option selected="" disabled="">DD</option>
                </select>
                <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                    <option selected="" disabled="">MM</option>
                </select>
                <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                    <option selected="" disabled="">YYYY</option>
                </select>
                <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="00:00">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label for="lstCliente">Cliente:</label>
            <select class="form-control selectpicker" name="lstCliente" id="lstCliente">
                <option value="" disabled selected>Seleccionar</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="lstProducto">Producto:</label>
            <select class="form-control selectpicker" name="lstProducto" id="lstProducto">
                <option value="" disabled selected>Seleccionar</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtPrecioUni">Precio unitario:</label>
            <input type="text" required="" class="form-control" name="txtPrecioUni" id="txtPrecioUni" value="" placeholder="$0,00">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="text" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="" placeholder="0">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtTotal">Total:</label>
            <input type="text" required="" class="form-control" name="txtTotal" id="txtTotal" value="" placeholder="0">
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once("footer.php"); ?>