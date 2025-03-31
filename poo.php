<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definiciones de clases
class Persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setDni($dni){$this->dni = $dni;}
    public function getDni(){return $this->dni;}

    public function setNombre($nombre){$this->nombre = $nombre;}
    public function getNombre(){return $this->nombre;}

    public function setEdad($edad){$this->edad = $edad;}
    public function getEdad(){return $this->edad;}

    public function setNacionalidad($nacionalidad){$this->nacionalidad = $nacionalidad;}
    public function getNacionalidad(){return $this->nacionalidad;}

    public function imprimir(){}
}

class Alumno extends Persona{
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __construct()
    {
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
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
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPCIALIDAD_BBDD = "Base de datos";

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
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br>";
    }
    public function imprimirEspecialidadesHabilitadas(){
        echo "<br> Un docente puede tener las siguientes especialidades: <br>";
        echo "Especialidad 1: " . self::ESPECIALIDAD_WP . "<br>";
        echo "Especialidad 2: " . self::ESPECIALIDAD_ECO . "<br>";
        echo "Especialidad 3: " . self::ESPCIALIDAD_BBDD . "<br>";
    }

}

//Programa
$alumno1 = new Alumno();
$alumno1->setDni("44547606");
$alumno1->setNombre("Rocío Moscardi");
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

$docente1 = new Docente();
$docente1->dni = 26756984;
$docente1->nombre = "Silvana Micelli";
$docente1->edad = 30;
$docente1->nacionalidad = "Argentina";
$docente1->especialidad = Docente::ESPECIALIDAD_ECO;
$docente1->imprimir();
$docente1->imprimirEspecialidadesHabilitadas();

?>
