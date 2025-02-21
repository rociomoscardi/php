<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array ();
$aEmpleados[] = array (
    "dni" => 33300123,
    "nombre" => "David García",
    "bruto" => 85000.30
);
$aEmpleados[] = array (
    "dni" => 40874456,
    "nombre" => "Ana del Valle",
    "bruto" => 90000
);
$aEmpleados[] = array (
    "dni" => 67567565,
    "nombre" => "Andrés Perez",
    "bruto" => 100000
);
$aEmpleados[] = array (
    "dni" => 75744545,
    "nombre" => "Victoria Luz",
    "bruto" => 70000
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="col-12 text-center py-5">Listado de empleados</h1>
        </div>
    </main>
</body>