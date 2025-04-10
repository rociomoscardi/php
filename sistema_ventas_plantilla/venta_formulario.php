<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pg = "Venta";

include_once("config.php");
//llamamos a las entidades con las cuales vamos a trabajar.
include_once("entidades/cliente.php");
include_once("entidades/producto.php");
include_once("entidades/venta.php");

$venta = new Venta();

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        $venta->cargarFormulario($_REQUEST);

        //actualizar
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $venta->actualizar();
            $msg["texto"] = "Actualizado correctamente.";
            $msg["codigo"] = "alert-success";
        } else {
            $venta->insertar();
            $msg["texto"] = "Insertado correctamente.";
            $msg["codigo"] = "alert-success";
        }
    } else if (isset($_POST["btnBorrar"])) {
        $venta->cargarFormulario($_REQUEST);
        $venta->eliminar();
        header("Location: venta_listado.php");
    }
}

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos(); //como son muchos me devuelve un array por eso lo almaceno como tal.

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once("header.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Venta</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="venta_listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="venta_formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 form-group">
            <?php if (isset($msg)): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                            <?php echo $msg["texto"]; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <label for="lstFechaHora">Fecha y hora:</label>
            <div>
                <select required class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                    <option selected="" disabled="">DD</option>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <?php if (date("d") == $i): ?>
                            <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
                <select required class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                    <option selected="" disabled="">MM</option>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <?php if (date("m") == $i) : ?>
                            <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
                <select required class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                    <option selected="" disabled="">YYYY</option>
                    <?php for ($i = 2020; $i <= date("Y"); $i++): ?>
                        <?php if (date("Y") == $i) : ?>
                            <option selected value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
                <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="<?php echo date("H:i"); ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label for="lstCliente">Cliente:</label>
            <select required class="form-control selectpicker" name="lstCliente" id="lstCliente" data-live-search="true">
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aClientes as $cliente) : ?>
                    <?php if ($cliente->idcliente == $venta->fk_idcliente) : ?>
                        <option selected value="<?php echo $cliente->idcliente ?>"><?php echo $cliente->nombre ?></option>
                    <?php else: ?>
                        <option value="<?php echo $cliente->idcliente ?>"><?php echo $cliente->nombre ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="lstProducto">Producto:</label>
            <select required class="form-control selectpicker" name="lstProducto" id="lstProducto" data-live-search="true">
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aProductos as $producto) : ?>
                    <?php if ($producto->idproducto == $venta->fk_idproducto) : ?>
                        <option selected value="<?php echo $producto->idproducto ?>"><?php echo $producto->nombre ?></option>
                    <?php else: ?>
                        <option value="<?php echo $producto->idproducto ?>"><?php echo $producto->nombre ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtPrecioUni">Precio unitario:</label>
            <input type="text" required="" class="form-control" name="txtPrecioUni" id="txtPrecioUni" value="" required placeholder="$0,00">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="" required>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtTotal">Total:</label>
            <input type="text" required="" class="form-control" name="txtTotal" id="txtTotal" value="" required placeholder="$0,00">
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once("footer.php"); ?>