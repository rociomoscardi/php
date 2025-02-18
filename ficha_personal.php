<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting (E_ALL);

date_default_timezone_set("America/Argentina/Buenos_Aires");

$nombre = "Rocío Moscardi";
$edad = 21;
$aPeliculas = array("Karate Kid", "E. T.", "Sueños de Libertad");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Fecha:</th>
                        <td>
                            <?php
                            echo date("d/m/Y");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nombre y apellido:</th>
                        <td><?php echo $nombre; ?> </td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><?php echo $edad; ?> </td>
                    </tr>
                    <tr>
                        <th>Peliculas favoritas:</th>
                        <td><?php echo $aPeliculas[0] ?> <br>
                            <?php echo $aPeliculas[1] ?> <br>
                            <?php echo $aPeliculas[2] ?> <br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </main>
</body>

</html>