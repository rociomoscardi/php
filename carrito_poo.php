<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __construct()
    {
        $this->descuento = 0.0;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br><br>";
    }
}

class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __construct()
    {
        $this->precio = 0.0;
        $this->iva = 0.0;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function imprimir(){
        echo "COD: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripción: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br><br>";
    }
}

class Carrito{
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;

    public function __construct()
    {
        $this->aProductos = array();
        $this->subtotal = 0.0;
        $this->total = 0.0;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function cargarProducto($producto){
        $this->aProductos[] = $producto;
    }

    public function imprimirTicket(){
        echo '<table class= "table table-hover border" style="width:400px">';
            echo '<thead>';
            echo '<th colspan="2" class= "text-center"> ECO MARKET </th>';
            echo '</thead>';  
            echo '<tbody>';

                echo '<tr>';
                    echo '<th> Fecha </th>';
                    echo '<td>' . date("d/m/Y H:i:s") . '</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> DNI </th>';
                    echo '<td>' . $this->cliente->dni . '</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> Nombre </th>';
                    echo '<td>' . $this->cliente->nombre . '</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th colspan="2"> Productos: </th>';
                echo '</tr>';

                foreach ($this->aProductos as $producto){
                echo '<tr>';
                    echo '<td>' . $producto->nombre . '</td>';
                    echo '<td>$' . number_format($producto->precio, 2, ",", ".") . '</td>';
                echo '</tr>';
                $this->subtotal += $producto->precio;
                $this->total += $producto->precio * (($producto->iva / 100) + 1);
                }

                echo '<tr>';
                    echo '<th> Subtotal s/IVA: </th>';
                    echo '<td>$' . number_format($this->subtotal, 2, ",",".") . '</td>';
                echo '</tr>';

                echo '<tr>';
                    echo '<th> TOTAL: </th>';
                    echo '<td>$' . number_format($this->total, 2, ",", ".") . '</td>';
                echo '</tr>';

        echo '</table>';
    }
}

$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "ESta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 60800;
$producto2->iva = 10.5;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
//echo "Cliente: " . $carrito->cliente->nombre;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECO MARKET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-5 offset-4 py-5">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>

    </main>
    
</body>
</html>