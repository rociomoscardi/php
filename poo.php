<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definiciones de clases
class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){}
}

class Alumno extends Persona{
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct()
    {
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Legajo: " . $this->legajo . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "PROMEDIO: " . number_format($this->calcularPromedio(), 2, ",", ".") . "<br><br>";
    }
    public function calcularPromedio(){
        $promedio = 0;

        $promedio = ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;

        return $promedio;
    }
}

class Docente extends Persona{
    public $especialidad;

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "ESPECIALIDAD: " . $this->especialidad . "<br>";
    }
    public function imprimirEspecialidadesHabilitadas(){}

}

//Programa
$alumno1 = new Alumno();
$alumno1->dni = "44547606";
$alumno1->nombre = "Rocío Moscardi";
$alumno1->edad = 22;
$alumno1->nacionalidad = "Argentina";
$alumno1->notaPhp = 8;
$alumno1->notaPortfolio = 9;
$alumno1->notaProyecto = 10;
$alumno1->imprimir();
$alumno1->calcularPromedio();

$alumno2 = new Alumno();
$alumno2->dni = "43532093";
$alumno2->nombre = "Nahuel Melioli";
$alumno2->edad = 23;
$alumno2->nacionalidad = "Argentina";
$alumno2->notaPhp = 6;
$alumno2->notaPortfolio = 7;
$alumno2->notaProyecto = 8;
$alumno2->imprimir();
$alumno2->calcularPromedio();

?>
