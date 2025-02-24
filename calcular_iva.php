<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//para inicializar: que se muestre algo ni bien se abre la página.
$iva = 21;
$sinIva = 0;
$conIva = 0;
$ivaCantidad = 0;
if ($_POST) {
    $iva = $_POST["lstIva"];
    $sinIva = ($_POST["txtSinIva"]) >= 0 ? $_POST["txtSinIva"] : 0; //recoradar usar el if ternario!!!
    $conIva = ($_POST["txtConIva"]) >= 0 ? $_POST["txtConIva"] : 0;

    if ($sinIva > 0) {
        $conIva = $sinIva * ($iva / 100 + 1);
    }
    if ($conIva > 0) {
        $sinIva = $conIva / ($iva / 100 + 1);
    }

    $ivaCantidad = $conIva - $sinIva;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-3">
                <form action="" method="post">
                    <div class="pb-3">
                        <label for="lstIva">IVA:</label> <br>
                        <select name="lstIva" id="lstIva" class="form-control">
                            <option value="21" selected>21%</option>
                            <option value="10.5">10.5%</option>
                            <option value="19">19%</option>
                            <option value="27">27%</option>
                        </select>
                    </div>
                    <div class="pb-3">
                        <label for="txtSinIva">Precio sin IVA:</label> <br>
                        <input type="text" name="txtSinIva" id="txtSinIva" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtConIva">Precio con IVA:</label> <br>
                        <input type="text" name="txtConIva" id="txtConIva" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>

            <div class="col-3 pt-4">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva ?>%</td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td>$<?php echo number_format($sinIva, "2", ",", ".") ?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td>$<?php echo number_format($conIva, "2", ",", ".") ?></td>
                    </tr>
                    <tr>
                        <th>IVA Cantidad:</th>
                        <td> $<?php echo number_format($ivaCantidad, "2", ",", ".") ?></td>
                    </tr>
                </table>
            </div>

        </div>

    </main>

</body>

</html>