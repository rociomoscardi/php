<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION["listadoClientes"])){
    //si existe la variable de session listado clientes entonces le asigno su contenido a $aClientes.
    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array(); //para inicializarlo como un array vacío y que no de error la primera vez.
}

if ($_POST){
    //si hace click en Enviar:
    if (isset ($_POST["btnEnviar"])){
    //asignamos en variables los datos que vienen del formulario.
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];

    //creamos un array que contendrá el listado de clientes.
    $aClientes[] = array ("nombre" => $nombre,
    "dni" => $dni,
    "telefono" => $telefono,
    "edad" => $edad
    );

    //actualiza el contenido de variable en session.
    $_SESSION["listadoClientes"] = $aClientes;

    }
    
    if (isset ($_POST["btnEliminar"])){
        session_destroy();
        $aClientes = array();
    }
}

if (isset($_GET["pos"])){
    //recupero el dato que viene desde la query string via get:
    $pos = $_GET["pos"];
    //elimina la posición del array indicado:
    unset($aClientes[$pos]);

    //actualiza el contenido de variable en session.
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-1">
                <form action="" method="post">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingrese nombre y apellido" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Télefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button type="submit" name="btnEnviar" class="btn btn-primary">Enviar</button>
                        </div>
                        <div class="col-2">
                            <button type="submit" name="btnEliminar" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-7 px-5">
                <table class="table table-hover border shadow">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Télefono:</th>
                            <th>Edad:</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($aClientes as $pos => $cliente) : //la clave $pos indica la posición, sub0, sub1, etc.
                        ?>
                        <tr>
                            <td><?php echo $cliente["nombre"]?></td>
                            <td><?php echo $cliente["dni"]?></td>
                            <td><?php echo $cliente["telefono"]?></td>
                            <td><?php echo $cliente["edad"]?></td>
                            <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </main>
</body>

</html>