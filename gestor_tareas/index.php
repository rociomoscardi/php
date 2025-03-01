<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//preguntar si existe el archivo
if (file_exists("tareas.txt")) {
    //lo leemos y almacenamos el contenido en jsonClientes
    $jsonTareas = file_get_contents("tareas.txt");
    //convertir jsonClientes en un array llamado aClientes
    $aTareas = json_decode($jsonTareas, true);
} else {
    $aTareas = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : ""; //lo del 0 es para un control de la url de la página y el if ternario es para inicializarlo en vacío la primera vez.
if ($_POST) {
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = $_POST["txtTitulo"];
    $descripcion = $_POST["txtDescripcion"];
    //$id = $_POST["pos"];
    $fecha = date("d/m/Y");

    if ($pos >= 0) {
        //edito:
        $aTareas[$pos] = array(
            "fecha" => $aTareas[$pos]["fecha"], //recupera la fecha anterior
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
        );
    } else {
        //almaceno los datos en el array aTareas
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
        );
    }

    //convertir el array de clientes a jsonClientes
    $jsonTareas = json_encode($aTareas);
    //almacenar jsonClientes en el "archivo.txt"
    file_put_contents("tareas.txt", $jsonTareas);
}

if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    $pos = $_GET["pos"];
    unset($aTareas[$pos]);
    //convertir el array en json
    $jsonTareas = json_encode($aTareas);
    //almacenar el json en el archivo
    file_put_contents("tareas.txt", $jsonTareas);
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-4">
                <form action="" method="post">
                    <label for="lstPrioridad">Prioridad:</label><br>
                    <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                        <option value="" disabled selected>Seleccionar</option>
                        <option <?php echo $pos >= 0 && $aTareas[$pos]["prioridad"] == "Alta" ? "selected" : "" ?> value="Alta">Alta</option>
                        <option <?php echo $pos >= 0 && $aTareas[$pos]["prioridad"] == "Media" ? "selected" : "" ?> value="Media">Media</option>
                        <option <?php echo $pos >= 0 && $aTareas[$pos]["prioridad"] == "Baja" ? "selected" : "" ?> value="Baja">Baja</option>
                    </select>
            </div>
            <div class="col-4">
                <label for="lstUsuario">Usuario:</label><br>
                <select name="lstUsuario" id="lstUsuario" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["usuario"] == "Ana" ? "selected" : "" ?> value="Ana">Ana</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["usuario"] == "Bernabe" ? "selected" : "" ?> value="Bernabe">Bernabé</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["usuario"] == "Daniela" ? "selected" : "" ?> value="Daniela">Daniela</option>
                </select>
            </div>
            <div class="col-4">
                <label for="lstEstado">Estado:</label><br>
                <select name="lstEstado" id="lstEstado" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["estado"] == "Sin Asignar" ? "selected" : "" ?> value="Sin asignar">Sin asignar</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["estado"] == "Asignado" ? "selected" : "" ?> value="Asignado">Asignado</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["estado"] == "En proceso" ? "selected" : "" ?> value="En proceso">En proceso</option>
                    <option <?php echo $pos >= 0 && $aTareas[$pos]["estado"] == "Terminado" ? "selected" : "" ?> value="Terminado">Terminado</option>
                </select>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12">

                <label for="txtTitulo">Título:</label>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo $pos >= 0 ? $aTareas[$pos]["titulo"] : ""; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-12 pb-4">
                <label for="txtDescripcion">Descripción:</label>
                <input type="txtDescripcion" name="txtDescripcion" id="txtDescripcion" class="form-control" value="<?php echo $pos >= 0 ? $aTareas[$pos]["descripcion"] : ""; ?>">
                <div class="row">
                    <div class="col-6 offset-5 pt-4">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                        <a href="index.php" class="btn btn-secondary">CANCELAR</a>
                    </div>
                </div>

            </div>
        </div>
        </form>

        <?php if (count($aTareas) > 0): ?> <!--preguntarlo así es preguntar si es mayor que 0, 0 es falso.-->
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aTareas as $pos => $tarea): ?>
                            <tr>
                                <td><?php echo $pos; ?></td>
                                <td><?php echo $tarea["fecha"]; ?></td>
                                <td><?php echo $tarea["titulo"]; ?></td>
                                <td><?php echo $tarea["prioridad"]; ?></td>
                                <td><?php echo $tarea["usuario"]; ?></td>
                                <td><?php echo $tarea["estado"]; ?></td>
                                <td>
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=editar" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php else : ?>
        <div class="row">
            <div class="col-12 alert alert-info" role="alert">
                Aún no se han cargado tareas.
            </div>
        </div>
    <?php endif; ?>


    </main>
</body>

</html>