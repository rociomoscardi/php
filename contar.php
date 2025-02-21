<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function contar ($aArray){
    $contador = 0;
    foreach ($aArray as $item) {
        $contador++;
    }
    return $contador;
}

$aNotas = array (9, 8, 9.50, 4, 7, 8);

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

$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50,
);

$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);

$aPacientes[] = array(
    "dni" => "43.532.093",
    "nombre" => "Juan Irraola",
    "edad" => 24,
    "peso" => 80,
);

$aPacientes[] = array(
    "dni" => "44.547.606",
    "nombre" => "Beatriz Ocampo",
    "edad" => 22,
    "peso" => 50,
);

echo "<br>Cantidad de notas: " . contar($aNotas) . "<br>";
echo "Cantidad de productos: " . contar($aProductos) . "<br>";
echo "Cantidad de pacientes: " . contar($aPacientes);


?>