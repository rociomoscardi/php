<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
}

class Socio extends Persona{
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct()
    {
        $this->aTarjetas = array();
        $this->bActivo = true;
        $this->fechaAlta = date("d/m/Y");
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function agregarTarjeta($tarjeta){
        $this->aTarjetas[] = $tarjeta;
    }

    public function darDeBaja($fecha){
        $this->fechaBaja = $fecha;
        $this->bActivo = false; //Baja lógica.
    }

    public function imprimir(){
        echo "Fecha de inscripción al club: " . $this->fechaAlta . "<br>";
        echo "Dió de baja la inscripción: " . $this->fechaBaja . "<br><br>";
    }
}

class Tarjeta{
    private $nombreTitular;
    private $numero;
    private $fechaEmision;
    private $fechaVto;
    private $tipo;
    private $cvv;
    const VISA = "VISA";
    const MASTERCARD = "Mastercard";
    const AMEX = "American Express";
    const NARANJA = "Naranja"; 
    const CABAL = "CABAL";

    public function __construct($tipo, $numero, $fechaEmision, $fechaVto, $cvv)
    {
        $this->tipo = $tipo;
        $this->numero = $numero;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVto = $fechaVto;
        $this->cvv = $cvv;

    }
    
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
}

$socio1 = new Socio();
$socio1->dni = "35123789";
$socio1->nombre = "Ana Valle";
$socio1->correo = "ana@correo.com";
$socio1->celular = "1156781234";

$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4346086806038224", "03/2022", "10/2027", "509");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "373521062107638", "07/2021", "01/20260", "408");
$tarjeta3 = new Tarjeta(Tarjeta::MASTERCARD, "5137532621050860", "08/2024", "10/2027", "556");

$socio1->agregarTarjeta($tarjeta1);
$socio1->agregarTarjeta($tarjeta2);
$socio1->agregarTarjeta($tarjeta3);


$socio2 = new Socio();
$socio2->dni = "48456876";
$socio2->nombre = "Bernabé Paz";
$socio2->correo = "bernabe@correo.com";
$socio2->celular = "1145326787";
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4223818523404380", "09/2022", "02/2024", "139"));
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5580480368010071", "01/2023", "06/2026", "236"));
$socio2->darDeBaja(date("03/04/2025"));

//print_r($socio1);
//print_r($socio2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Socios del Club</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?php $socio1->imprimir(); ?>
            </div>
            <div class="col-6">
                <?php $socio2->imprimir(); ?>
            </div>
        </div>
    </main>
    
</body>
</html>