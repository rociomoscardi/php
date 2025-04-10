<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pg = "Productos";

include_once("config.php");
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$producto = new Producto();

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        $nombreImagen = "";
        $imagenAnterior = "";
        $producto->cargarFormulario($_REQUEST);

        //si id es mayor que 0 es porque estoy ACTUALIZANDO
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                $nombreAleatorio = date("Ymdhmsi");
                $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //se define la url del archivo temporal
                $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
                $nombreImagen = "$nombreAleatorio.$extension";
                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    //si viene una nueva imagen elimino la anterior.
                    $productoAnt = new Producto();
                    $productoAnt->idproducto = $_GET["id"];
                    $productoAnt->obtenerPorId();
                    if (file_exists("files/$productoAnt->imagen") && is_file("files/" . $productoAnt->imagen)) {
                        unlink("files/$productoAnt->imagen");
                    }
                    //subo la imagen nueva.
                    move_uploaded_file($archivo_tmp, "files/$nombreImagen");
                }
                $producto->imagen = $nombreImagen;
            } else {
                //para que se mantenga la anterior si no viene una imagen nueva.
                $productoAnt = new Producto();
                $productoAnt->idproducto = $_GET["id"];
                $productoAnt->obtenerPorId();
                $producto->imagen = $productoAnt->imagen;
                $productoAnt->imagen = $imagenAnterior;
            }

            $producto->actualizar();
            $msg["texto"] = "Actualizado correctamente.";
            $msg["codigo"] = "alert-success";
        } else {
            //Es nuevo
            $producto->imagen = $nombreImagen;
            $producto->insertar();
            $msg["texto"] = "Insertado correctamente.";
            $msg["codigo"] = "alert-success";
        }
    } else if (isset($_POST["btnBorrar"])) {
        $producto->cargarFormulario($_REQUEST);
        $producto->obtenerPorId();
        if (file_exists("files/$producto->imagen")) {
            unlink("files/$producto->imagen");
        }
        $producto->eliminar();
        header("Location: producto_listado.php");
    }
}

if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->cargarFormulario($_REQUEST);
    $producto->obtenerPorId();
}

$tipoProducto = new TipoProducto();
$aTipoProductos = $tipoProducto->obtenerTodos();

include_once("header.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
    <?php if (isset($msg)): ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="producto_listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="tipoproducto_formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="lstTipoProducto">Tipo de producto:</label>
            <select class="form-control selectpicker" name="lstTipoProducto" id="lstTipoProducto" data-live-search="true">
                <option selected="" disabled="">Seleccionar</option>
                <?php foreach ($aTipoProductos as $tipoProducto) : ?>
                    <?php if ($producto->fk_idtipoproducto == $tipoProducto->idtipoproducto) : ?>
                        <option selected value="<?php echo $tipoProducto->idtipoproducto ?>"><?php echo $tipoProducto->nombre ?></option>
                    <?php else: ?>
                        <option value="<?php echo $tipoProducto->idtipoproducto ?>"><?php echo $tipoProducto->nombre ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad ? $producto->cantidad : ""; ?>">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label for="txtPrecio">Precio:</label>
            <input type="text" required="" class="form-control" placeholder="$0,00" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio ? $producto->precio : ""; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="txtDescripcion">Descripción:</label>
            <textarea name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
        </div>
    </div>
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <label for="fileImagen">Imagen:</label>
            </div>
            <div class="col-12">
                <input type="file" class="form-control-file" name="archivo" id="imagen" accept=".jpg, .jpeg, .png">
                <?php if ($producto->imagen != "") : ?>
                    <img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail" alt="">
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    ClassicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php include_once("footer.php"); ?>