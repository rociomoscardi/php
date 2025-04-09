<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once("config.php");
include_once "entidades/producto.php";


$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once("header.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Listado de productos</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="producto_formulario.php" class="btn btn-primary mr-2">Nuevo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

                <?php foreach ($aProductos as $producto) : ?>
                    <tr>
                        <td><img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail" alt=""></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td><?php echo $producto->cantidad; ?></td>
                        <td>$ <?php echo number_format($producto->precio, 2, ",", "."); ?></td>
                        <td><a href="producto_formulario.php?id=<?php echo $producto->idproducto; ?>"><i class="bi bi-pencil-square"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</div>
<?php include_once("footer.php"); ?>