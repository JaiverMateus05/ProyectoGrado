<?php 

require_once 'Controladores/seccionesC.php';
require_once 'Modelos/seccionesM.php';

use PHPUnit\Framework\TestCase;

class SeccionesTest extends TestCase
{

    /* private $SCM;

    public function setUp():void{
        $this->SCM = new SeccionesM();
    } */
    
    public function testCrearSeccion(){
        $seccionesM = new SeccionesM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $seccionesM ->CrearSeccionM($tablaBD,$datosC);

            $this->assertNull($result);    }


    public function testVerSecciones(){
        $seccionesM = new SeccionesM();

        $tablaBD = "a";
        $columna= "3";
        $valor=6;
        
        $result = $seccionesM ->VerSeccionesM($tablaBD, $columna, $valor);

            $this->assertNotNull($columna);    }


    public function testAgregarArchivo(){

  
        $seccionesM = new SeccionesM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $seccionesM ->AgregarArchivoM($tablaBD,$datosC);

            $this->assertNull($result);
    }


}