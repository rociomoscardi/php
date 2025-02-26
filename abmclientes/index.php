<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//preguntar si existe el archivo
if (file_exists("archivo.txt")){
    //lo leemos y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");
    //convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();   
}

if (isset($_SESSION["abmClientes"])){
    //si existe la variable de session listado clientes entonces le asigno su contenido a $aClientes.
    $aClientes = $_SESSION["abmClientes"];
} else {
    $aClientes = array(); //para inicializarlo como un array vacío y que no de error la primera vez.
}

/*if (isset($_POST["imagen1"])){
    //si existe la variable de session listado clientes entonces le asigno su contenido a $aClientes.
    $aClientes = $_POST["imagen1"];
} else {
    $_POST["imagen1"] = ""; //para inicializarlo como un array vacío y que no de error la primera vez.
}*/

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    //$imagen1 = $_POST["imagen1"];

    $aClientes[] = array("dni" => $dni,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        //"imagen1" => $imagen1,
    ); 

    $_SESSION["abmClientes"] = $aClientes;

    //convertir el array de clientes a jsonClientes
    $jsonClientes = json_encode($aClientes);

    //almacenar jsonClientes en el "archivo.txt"
    file_put_contents("archivo.txt", $jsonClientes);
}

if (isset($_GET["pos"])){
    //recupero el dato que viene desde la query string via get:
    $pos = $_GET["pos"];
    //elimina la posición del array indicado:
    unset($aClientes[$pos]);

    //actualiza el contenido de variable en session.
    $_SESSION["abmClientes"] = $aClientes;
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
                        <input type="text" name="txtDni" id="txtDni" required class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtNombre">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" required class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Télefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtCorreo">Correo: *</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" required class="form-control">
                    </div>
                    <div>
                        <label for="imagen1">Archivo adjunto:&nbsp;</label><input type="file" name="imagen1" id="imagen1" accept=".jpg, .jpeg, .png">
                        <p>Archivos admitidos: .jpg, .jpeg, .png</p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
                        <?php foreach ($aClientes as $pos => $cliente):?>
                        
                        <tr>
                            <td></td>
                            <td><?php echo $cliente["dni"]?></td>
                            <td><?php echo $cliente["nombre"]?></td>
                            <td><?php echo $cliente["correo"]?></td>
                            <td>
                                <a href="index.php?pos=<?php echo $pos;?>"><i class="bi bi-pencil-square"></i></a>&nbsp;
                                <a href="index.php?pos=<?php echo $pos;?>"><i class="bi bi-trash"></i></a>
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