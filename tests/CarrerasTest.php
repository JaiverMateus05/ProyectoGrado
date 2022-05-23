<?php 

require_once 'Controladores/carrerasC.php';
require_once 'Modelos/carrerasM.php';

use PHPUnit\Framework\TestCase;

class CarrerasTest extends TestCase
{

    /* private $CAM;

    public function setUp():void{
        $this->CAM = new CarrerasM();
    } */
    
    public function testCrearCarrera(){


        $carrerasM = new CarrerasM();

        $tablaBD = "a";
        $carrera= "sas";
        
        
        $result = $carrerasM ->CrearCarreraM($tablaBD,$carrera);

            $this->assertNull($result);
    }


    
}