<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                            <th>Télefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>

</html>