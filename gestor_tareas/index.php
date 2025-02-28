<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
            </div>
            <div class="col-4">
                <label for="lstUsuario">Usuario:</label><br>
                <select name="lstUsuario" id="lstUsuario" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="ana">Ana</option>
                    <option value="bernabe">Bernabé</option>
                    <option value="daniela">Daniela</option>
                </select>
            </div>
            <div class="col-4">
                <label for="lstEstado">Estado:</label><br>
                <select name="lstEstado" id="lstEstado" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="sinAsignar">Sin asignar</option>
                    <option value="asignado">Asignado</option>
                    <option value="enProceso">En proceso</option>
                    <option value="terminado">Terminado</option>
                </select>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12">

                <label for="txtTitulo">Título:</label>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12 pb-4">
                <label for="txtDescripcion">Descripción:</label>
                <input type="txtDescripción" name="txtDescripción" id="txtDescripción" class="form-control">
                <div class="row">
                    <div class="col-6 offset-5 pt-4">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                        <button type="submit" class="btn btn-secondary">CANCELAR</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>

</html>