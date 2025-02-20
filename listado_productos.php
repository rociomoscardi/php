<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);

$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);

$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);

//print_r($aProductos)
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <h1 class="col-12 text-center py-5">Listado de Productos</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $aProductos[0]["nombre"]; ?></td>
                            <td><?php echo $aProductos[0]["marca"]; ?></td>
                            <td><?php echo $aProductos[0]["modelo"]; ?></td>
                            <td><?php if ($aProductos[0]["stock"] <= 10 && $aProductos[0]["stock"] > 0) {
                                echo "Poco stock";
                            } 
                            if ($aProductos[0]["stock"] > 10) {
                                echo "Hay stock";
                            } 
                            if ($aProductos[0]["stock"] == 0) {
                                echo "Sin stock";
                            }
                            ?></td>
                            <td><?php echo $aProductos[0]["precio"]; ?></td>
                            <td><button class="btn btn-primary">Comprar</button></td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[1]["nombre"]; ?></td>
                            <td><?php echo $aProductos[1]["marca"]; ?></td>
                            <td><?php echo $aProductos[1]["modelo"]; ?></td>
                            <td><?php if ($aProductos[1]["stock"] <= 10 && $aProductos[1]["stock"] > 0) {
                                echo "Poco stock";
                            } 
                            if ($aProductos[1]["stock"] > 10) {
                                echo "Hay stock";
                            } 
                            if ($aProductos[1]["stock"] == 0) {
                                echo "Sin stock";
                            }
                            ?></td>
                            <td><?php echo $aProductos[1]["precio"]; ?></td>
                            <td><button class="btn btn-primary">Comprar</button></td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[2]["nombre"]; ?></td>
                            <td><?php echo $aProductos[2]["marca"]; ?></td>
                            <td><?php echo $aProductos[2]["modelo"]; ?></td>
                            <td><?php if ($aProductos[2]["stock"] <= 10 && $aProductos[2]["stock"] > 0) {
                                echo "Poco stock";
                            } 
                            if ($aProductos[2]["stock"] > 10) {
                                echo "Hay stock";
                            } 
                            if ($aProductos[2]["stock"] == 0) {
                                echo "Sin stock";
                            }
                            ?></td>
                            <td><?php echo $aProductos[2]["precio"]; ?></td>
                            <td><button class="btn btn-primary">Comprar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>





    </main>
</body>

</html>