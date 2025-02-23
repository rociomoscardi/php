<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_REQUEST){
    $usuario =  $_REQUEST["txtUsuario"];
    $clave =  $_REQUEST["pswClave"];

    if ($usuario != "" && $clave != ""){
        header("Location: acceso_confirmado.php");
        ; 
    } else {
        $mensaje = "Válido para usuarios registrados.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-start py-5">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <?php if (isset($mensaje)):  ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php endif; ?>
                <form action="" method="post">
                    <div>
                        <label for="txtUsuario">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div>
                        <label for="pswClave">Clave:</label>
                        <input type="password" name="pswClave" id="txtClave" class="form-control">
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary my-3">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>