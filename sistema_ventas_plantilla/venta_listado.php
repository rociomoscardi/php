<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pg = "Listado de ventas";

include_once("config.php");
include_once("header.php");
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Listado de ventas</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="tipoproducto_formulario.php" class="btn btn-primary mr-2">Nuevo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="venta_formulario.php?id=<?php echo $venta->idventa; ?>"><i class="bi bi-pencil-square"></i></a></td>
                </tr>
            </table>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once("footer.php"); ?>