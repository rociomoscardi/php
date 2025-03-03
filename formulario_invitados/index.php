<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


isset($_POST["txtVip"]) ? $_POST["txtVip"] : "";
isset($_POST["txtDni"]) ? $_POST["txtDni"] : "";
isset($_POST["btnProcesar"]) ? $_POST["btnProcesar"] : "";

if (file_exists("invitados.txt")) {
    $archivo = fopen("invitados.txt", "r");
    $aInvitados = fgetcsv($archivo, 0, ",");
    //print_r($aInvitados);
    //exit;
} else {
    $aInvitados = array();
}

if ($_POST) {
    $dni = $_POST["txtDni"];
    $vip = $_POST["txtVip"];
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 pt-5 pb-3">
                <h1>Lista de invitados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pb-3">
                Complete el siguiente formulario:
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-7">
                    <?php
                    if (isset($_POST["btnProcesar"]) && in_array($dni, $aInvitados)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo "¡Bienvenid@ a la fiesta!"; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    if (isset($_POST["btnProcesar"]) && in_array($dni, $aInvitados) != true) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "No se encuentra en la lista de invitados."; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php
                    if(isset($_POST["btnVip"]) && $vip == "verde") : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo "Su código de acceso es " . rand(1000, 9999); ?>
                        </div>
                    <?php endif; ?> 
                    <?php
                    if(isset($_POST["btnVip"]) && $vip != "verde") : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "Usted no tiene pase VIP."; ?>
                        </div>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7 py-3">
                <form action="" method="post">
                    <label for="txtDni" class="pb-2">Ingrese el DNI:</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control">
                    <button type="submit" name="btnProcesar" class="btn btn-primary mt-3">Verificar invitado</button>
            </div>
        </div>
        <div class="row">
            <div class="col-7 py-3">
                <form action="" method="post">
                    <label for="txtVip" class="pb-2">Ingrese el código secreto para el pase VIP:</label>
                    <input type="text" name="txtVip" id="txtVip" class="form-control">
                    <button type="submit" name="btnVip" class="btn btn-primary mt-3">Verificar código</button>
            </div>
        </div>
        </form>
    </main>
</body>

</html>