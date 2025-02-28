<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//preguntar si existe el archivo
if (file_exists("archivo.txt")) {
    //lo leemos y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");
    //convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : ""; //lo del 0 es para un control de la url de la página y el if ternario es para inicializarlo en vacío la primera vez.
if ($_POST) {
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

    //PARA EDITAR:
    if ($pos >= 0) {
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //se define la url del archivo temporal
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
            //eliminar la imagen anterior
            if ($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/" . $aClientes[$pos]["imagen"])) {
                unlink("imagenes/" . $aClientes[$pos]["imagen"]);
            }
        } else {
            //mantener el $nombreImagen que teniamos antes
            $nombreImagen = $aClientes[$pos]["imagen"];
        }

        //actualizar
        $aClientes[$pos] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen,
        );
    } else {
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $nombreAleatorio = date("Ymdhmsi");
            $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //se define la url del archivo temporal
            $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                $nombreImagen = "$nombreAleatorio.$extension";
                move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
            }
        }
        //insertar
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen,
        );
    }

    //convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //almacenar jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
}

//PARA ELIMINAR:
if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    //recupero el dato que viene desde la query string via get:
    $pos = $_GET["pos"];
    //elimina la posición del array indicado:
    unset($aClientes[$pos]);

    //convertir el array en json
    $jsonClientes = json_encode($aClientes);

    //almacenar el json en el archivo
    file_put_contents("archivo.txt", $jsonClientes);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-1">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="pb-3">
                        <label for="txtDni">DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" required class="form-control" value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["dni"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" required class="form-control" value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["nombre"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Télefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["telefono"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtCorreo">Correo: *</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" required class="form-control" value="<?php echo isset($aClientes[$pos]) ? $aClientes[$pos]["correo"] : ""; ?>">
                    </div>
                    <div>
                        <label for="archivo">Archivo adjunto:&nbsp;</label><input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <p>Archivos admitidos: .jpg, .jpeg, .png</p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-danger my-2">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-7 px-5">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aClientes as $pos => $cliente): ?>

                            <tr>
                                <td>
                                    <?php if ($cliente["imagen"] != ""): ?>
                                        <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail" alt="">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $cliente["dni"] ?></td>
                                <td><?php echo $cliente["nombre"] ?></td>
                                <td><?php echo $cliente["correo"] ?></td>
                                <td>
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                    <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>

</html>