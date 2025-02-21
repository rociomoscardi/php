<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50,
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);

$aPacientes[] = array(
    "dni" => "43.532.093",
    "nombre" => "Juan Irraola",
    "edad" => 24,
    "peso" => 80,
);

$aPacientes[] = array(
    "dni" => "44.547.606",
    "nombre" => "Beatriz Ocampo",
    "edad" => 22,
    "peso" => 50,
);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="col-12 text-start py-5">Listado de pacientes</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($aPacientes as $paciente) {
                        ?>

                            <tr>
                                <td><?php echo $paciente["dni"]; ?></td>
                                <td><?php echo $paciente["nombre"]; ?></td>
                                <td><?php echo $paciente["edad"]; ?></td>
                                <td><?php echo $paciente["peso"]; ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>