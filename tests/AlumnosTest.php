<?php

require_once 'Controladores/alumnosC.php';
require_once 'Modelos/alumnosM.php';

use PHPUnit\Framework\TestCase;

class AlumnosTest extends TestCase
{

    /* private $ALM;

    public function setUp(): void
    {
        $this->ALM = new AlumnosM();
    } */

    public function testInscripcion()
    {

        $alumnosM = new AlumnosM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $alumnosM ->InscribirmeM($tablaBD,$datosC);

            $this->assertNull($result);
        
    }


    public function testDarBaja()
    {
        $alumnosM = new AlumnosM();

        $tablaBD = "a";
        $datosC= [];
        
        
        $result = $alumnosM ->DarBajaM($tablaBD,$datosC);

            $this->assertNull($result);
    }

    public function testVerInscritos()
    {
        $alumnosM = new AlumnosM();

        $tablaBD = "a";
        $columna= "3";
        $valor=6;
        
        $result = $alumnosM ->VerInscritosM($tablaBD, $columna, $valor);

            /* $this->assertNull($result); */
            $this->assertIsArray($result);
    }
}
