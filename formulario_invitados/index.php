<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


isset($_POST["txtVip"]) ? $_POST["txtVip"] : $_POST["txtVip"] = "";
isset($_POST["txtDni"]) ? $_POST["txtDni"] : $_POST["txtDni"] = "";

if (file_exists("invitados.txt")) {
    //leemos el archivo y almacenamos el contenido en jsonInvitados
    $jsonInvitados = file_get_contents("invitados.txt");
    //convertimos el json en un array llamado aInvitados
    $aInvitados = json_decode($jsonInvitados, true);
} else {
    $aInvitados = array();
}

if($_POST){
    $dni = $_POST["txtDni"];
    $vip = $_POST["txtVip"];
    $bienvenido = "Bienvenid@ a la fiesta!";
    $rechazado = "Usted no se encuentra en la lista de invitados.";

    if(isset($_POST["btnProcesar"])){
        //si el dni ingresado se encuentra en la lista se mostrará un $mensaje de bienvenida.
            echo $bienvenido;
        //si no un mensaje de No se encuentra en la lista de invitados.
    } else {
        echo $rechazado;
    }

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
            <div class="col-12">
                Complete el siguiente formulario:
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